@extends('layouts.master')

@section('title', 'ModernGrosir - Analytics & Reports')

@section('pageContent')
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Analytics & Reports</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted" href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Reports</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3 text-end">
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('reports.excel', ['start_date' => $startDate, 'end_date' => $endDate]) }}" class="btn btn-success d-flex align-items-center gap-2">
                        <i class="ti ti-file-spreadsheet fs-5"></i> Export Excel
                    </a>
                    <a href="{{ route('reports.pdf', ['start_date' => $startDate, 'end_date' => $endDate]) }}" class="btn btn-danger d-flex align-items-center gap-2">
                        <i class="ti ti-file-description fs-5"></i> Export PDF
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Filter Report</h5>
        <form action="{{ route('reports.index') }}" method="GET" class="row align-items-end">
            <div class="col-md-4 mb-3">
                <label class="form-label">Start Date</label>
                <input type="date" name="start_date" class="form-control" value="{{ $startDate }}">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">End Date</label>
                <input type="date" name="end_date" class="form-control" value="{{ $endDate }}">
            </div>
            <div class="col-md-4 mb-3">
                <button type="submit" class="btn btn-primary w-100">Filter Data</button>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card bg-primary-subtle shadow-none">
            <div class="card-body text-center p-4">
                <h6 class="fw-semibold text-primary mb-2">Total Revenue</h6>
                <h3 class="fw-bold text-primary mb-0">Rp {{ number_format($summary->total_revenue, 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-warning-subtle shadow-none">
            <div class="card-body text-center p-4">
                <h6 class="fw-semibold text-warning mb-2">Total COGS (Cost)</h6>
                <h3 class="fw-bold text-warning mb-0">Rp {{ number_format($summary->total_cogs, 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success-subtle shadow-none">
            <div class="card-body text-center p-4">
                <h6 class="fw-semibold text-success mb-2">Gross Profit</h6>
                <h3 class="fw-bold text-success mb-0">Rp {{ number_format($summary->total_profit, 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-3">Transaction Details</h5>
        <div class="table-responsive">
            <table class="table text-nowrap align-middle mb-0">
                <thead>
                    <tr class="text-muted fw-semibold">
                        <th>Date</th>
                        <th>Code</th>
                        <th>Customer</th>
                        <th class="text-end">Revenue</th>
                        <th class="text-end">Cost (COGS)</th>
                        <th class="text-end">Profit</th>
                    </tr>
                </thead>
                <tbody class="border-top">
                    @foreach($transactions as $tx)
                        @php
                            $txCost = 0;
                            foreach($tx->details as $detail) {
                                $txCost += ($detail->product->purchase_price ?? 0) * $detail->quantity;
                            }
                            $txProfit = $tx->total_amount - $txCost;
                        @endphp
                        <tr>
                            <td>{{ $tx->created_at->format('d/m/Y H:i') }}</td>
                            <td><span class="fw-semibold">{{ $tx->transaction_code }}</span></td>
                            <td>{{ $tx->customer->name ?? 'Guest' }}</td>
                            <td class="text-end">Rp {{ number_format($tx->total_amount, 0, ',', '.') }}</td>
                            <td class="text-end text-muted">Rp {{ number_format($txCost, 0, ',', '.') }}</td>
                            <td class="text-end fw-bold {{ $txProfit >= 0 ? 'text-success' : 'text-danger' }}">
                                Rp {{ number_format($txProfit, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $transactions->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection
