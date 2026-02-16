<?php

namespace App\Http\Controllers;

use App\Helpers\GeneralHelper;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $user = auth()->user();
            $transactionQuery = \App\Models\Transaction::where('status', 'completed');
            $detailQuery = \App\Models\TransactionDetail::whereHas('transaction', function ($q) {
                $q->where('status', 'completed');
            });
            $walletBalance = 0;
            if ($user->hasRole('reseller')) {
                $transactionQuery->where('customer_id', $user->id);
                $detailQuery->whereHas('transaction', function ($q) use ($user) {
                    $q->where('customer_id', $user->id);
                });
                
                $reseller = \App\Models\Reseller::where('user_id', $user->id)->first();
                $walletBalance = $reseller ? $reseller->balance : 0;
            }
            $lowStockProducts = [];
            $lowStockCount = 0;
            if ($user->hasRole('admin')) {
                $lowStockProducts = \App\Models\Product::with(['stockLevels', 'category', 'unit'])
                    ->where('safety_stock', '>', 0)
                    ->get()
                    ->filter(function ($product) {
                        $totalStock = $product->stockLevels->sum('quantity');

                        return $totalStock < $product->safety_stock;
                    })->map(function ($product) {
                        $product->total_stock = $product->stockLevels->sum('quantity');

                        return $product;
                    });

                $lowStockCount = $lowStockProducts->count();
            }
            $totalSales = (clone $transactionQuery)->sum('total_amount');
            $totalTransactions = (clone $transactionQuery)->count();

            if ($user->hasRole('reseller')) {
                // For resellers, Transactions on dashboard should match their Orders (DraftOrders)
                $orderQuery = \App\Models\DraftOrder::where('reseller_id', $user->id)
                    ->where('status', 'completed');
                
                $totalTransactions = (clone $orderQuery)->count();
                $totalSales = (clone $orderQuery)->sum('total_amount');
            }

            $totalProducts = \App\Models\Product::count();
            $totalResellers = \App\Models\User::role('reseller')->count();
            $totalProfit = 0;
            if ($user->hasRole('admin')) {
                $totalProfit = (clone $detailQuery)
                    ->join('products', 'transaction_details.product_id', '=', 'products.id')
                    ->selectRaw('SUM(transaction_details.subtotal - (products.purchase_price * transaction_details.quantity)) as profit')
                    ->value('profit') ?? 0;
            }
            $monthlySales = (clone $transactionQuery)
                ->selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
                ->whereYear('created_at', date('Y'))
                ->groupBy('month')
                ->orderBy('month')
                ->get()
                ->pluck('total', 'month')
                ->toArray();

            if ($user->hasRole('reseller')) {
                $monthlySales = \App\Models\DraftOrder::where('reseller_id', $user->id)
                    ->where('status', 'completed')
                    ->selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('month')
                    ->orderBy('month')
                    ->get()
                    ->pluck('total', 'month')
                    ->toArray();
            }
            $monthlyProfit = [];
            if ($user->hasRole('admin')) {
                $monthlyProfit = (clone $detailQuery)
                    ->join('products', 'transaction_details.product_id', '=', 'products.id')
                    ->selectRaw('MONTH(transaction_details.created_at) as month, SUM(transaction_details.subtotal - (products.purchase_price * transaction_details.quantity)) as profit')
                    ->whereYear('transaction_details.created_at', date('Y'))
                    ->groupBy('month')
                    ->orderBy('month')
                    ->get()
                    ->pluck('profit', 'month')
                    ->toArray();
            }
            $chartData = [];
            $profitChartData = [];
            for ($i = 1; $i <= 12; $i++) {
                $chartData[] = $monthlySales[$i] ?? 0;
                $profitChartData[] = $monthlyProfit[$i] ?? 0;
            }
            $recentTransactions = (clone $transactionQuery)
                ->with(['customer', 'user'])
                ->latest()
                ->take(5)
                ->get();

            $topProducts = (clone $detailQuery)
                ->with('product')
                ->selectRaw('product_id, SUM(quantity) as total_qty')
                ->groupBy('product_id')
                ->orderByDesc('total_qty')
                ->take(5)
                ->get();

            if ($user->hasRole('reseller')) {
                $recentTransactions = \App\Models\DraftOrder::where('reseller_id', $user->id)
                    ->with(['warehouse']) // DraftOrder doesn't have 'customer' (it IS the reseller)
                    ->latest()
                    ->take(5)
                    ->get()
                    ->map(function($order) {
                        // Map DraftOrder properties to match Transaction for the view
                        $order->transaction_code = $order->order_code;
                        return $order;
                    });

                $topProducts = \App\Models\DraftOrderItem::whereHas('draftOrder', function($q) use ($user) {
                        $q->where('reseller_id', $user->id)->where('status', 'completed');
                    })
                    ->with('product')
                    ->selectRaw('product_id, SUM(quantity) as total_qty')
                    ->groupBy('product_id')
                    ->orderByDesc('total_qty')
                    ->take(5)
                    ->get();
            }
            $expiringBatches = [];
            $expiringCount = 0;
            $expiredCount = 0;

            if ($user->hasRole('admin')) {
                $expiringBatches = \App\Models\InventoryBatch::with('product')
                    ->where('status', 'active')
                    ->whereNotNull('expiration_date')
                    ->where('expiration_date', '>', now())
                    ->where('expiration_date', '<=', now()->addDays(30))
                    ->orderBy('expiration_date', 'asc')
                    ->take(5)
                    ->get();
                
                $expiringCount = \App\Models\InventoryBatch::where('status', 'active')
                    ->whereNotNull('expiration_date')
                    ->where('expiration_date', '>', now())
                    ->where('expiration_date', '<=', now()->addDays(30))
                    ->count();

                $expiredCount = \App\Models\InventoryBatch::where('status', 'active') // Should ideally be handled by job, but good to show
                    ->whereNotNull('expiration_date')
                    ->where('expiration_date', '<=', now())
                    ->count();
            }

            return view('main.index', compact(
                'totalSales',
                'totalProducts',
                'totalResellers',
                'totalTransactions',
                'chartData',
                'recentTransactions',
                'topProducts',
                'lowStockCount',
                'lowStockProducts',
                'totalProfit',
                'profitChartData',
                'walletBalance',
                'expiringBatches',
                'expiringCount',
                'expiredCount'
            ));
        } catch (\Exception $e) {
            return GeneralHelper::errorResponse('Failed to load dashboard: '.$e->getMessage());
        }
    }
}
