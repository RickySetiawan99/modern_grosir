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
        
        // Statistics
        $totalSales = (clone $transactionQuery)->sum('total_amount');
        $totalProducts = \App\Models\Product::count();
        $totalResellers = \App\Models\User::role('reseller')->count();
        $totalTransactions = (clone $transactionQuery)->count();

        // Monthly Sales for the current year
        $monthlySales = (clone $transactionQuery)
            ->selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('total', 'month')
            ->toArray();

        // Fill in missing months with zero
        $chartData = [];
        for ($i = 1; $i <= 12; $i++) {
            $chartData[] = $monthlySales[$i] ?? 0;
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
            'topProducts'
        ));
    }
}
