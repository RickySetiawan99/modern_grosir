<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Base queries
        $transactionQuery = \App\Models\Transaction::query();
        $detailQuery = \App\Models\TransactionDetail::query();
        
        // Role-based filtering
        if ($user->hasRole('reseller')) {
            $transactionQuery->where('customer_id', $user->id);
            $detailQuery->whereHas('transaction', function($q) use ($user) {
                $q->where('customer_id', $user->id);
            });
        }

        // Low Stock Logic
        $lowStockProducts = [];
        $lowStockCount = 0;
        
        if ($user->hasRole('admin')) {
            $lowStockProducts = \App\Models\Product::with(['stockLevels', 'category', 'unit'])
                ->where('safety_stock', '>', 0)
                ->get()
                ->filter(function($product) {
                    $totalStock = $product->stockLevels->sum('quantity');
                    return $totalStock < $product->safety_stock;
                })->map(function($product) {
                    $product->total_stock = $product->stockLevels->sum('quantity');
                    return $product;
                });
            
            $lowStockCount = $lowStockProducts->count();
        }
        
        // Statistics
        $totalSales = (clone $transactionQuery)->sum('total_amount');
        $totalProducts = \App\Models\Product::count();
        $totalResellers = \App\Models\User::role('reseller')->count();
        $totalTransactions = (clone $transactionQuery)->count();

        // Profit Calculation (Admin Only)
        $totalProfit = 0;
        if ($user->hasRole('admin')) {
            $totalProfit = (clone $detailQuery)
                ->join('products', 'transaction_details.product_id', '=', 'products.id')
                ->selectRaw('SUM(transaction_details.subtotal - (products.purchase_price * transaction_details.quantity)) as profit')
                ->value('profit') ?? 0;
        }

        // Monthly Sales and Profit (Admin Only)
        $monthlySales = (clone $transactionQuery)
            ->selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('total', 'month')
            ->toArray();

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

        // Fill in missing months with zero
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
            'profitChartData'
        ));
    }
}
