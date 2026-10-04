@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Analytics & Reports')

@section('pageContent')
    <!-- Header Banner Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
        <div class="card-body p-4">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <span class="badge bg-primary text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">Financial & Sales Analytics</span>
                        <span class="text-muted fs-2">&bull; Laporan Laba Rugi Gross Profit</span>
                    </div>
                    <h3 class="fw-bold mb-1 text-dark">Analitik & Laporan Keuangan</h3>
                    <p class="text-muted mb-0 fs-3">Evaluasi omzet pendapatan, HPP (COGS), serta perolehan laba kotor toko secara akurat.</p>
                </div>
                <div class="d-flex align-items-center gap-2 flex-wrap flex-shrink-0">
                    <a href="{{ route('reports.excel', ['start_date' => $startDate, 'end_date' => $endDate, 'warehouse_id' => $warehouseId, 'reseller_id' => $resellerId]) }}" class="btn btn-success px-3 py-2 rounded-3 d-flex align-items-center gap-2 shadow-sm fs-2 fw-semibold">
                        <i class="ti ti-file-spreadsheet fs-5"></i> Export Excel
                    </a>
                    <a href="{{ route('reports.pdf', ['start_date' => $startDate, 'end_date' => $endDate, 'warehouse_id' => $warehouseId, 'reseller_id' => $resellerId]) }}" class="btn btn-danger px-3 py-2 rounded-3 d-flex align-items-center gap-2 shadow-sm fs-2 fw-semibold">
                        <i class="ti ti-file-description fs-5"></i> Export PDF
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
        <div class="card-body p-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="fw-bold mb-0 text-dark d-flex align-items-center gap-2">
                    <i class="ti ti-filter fs-5 text-primary"></i> Filter Laporan
                </h5>
                @if(request()->hasAny(['start_date', 'end_date', 'warehouse_id', 'reseller_id']))
                    <a href="{{ route('reports.index') }}" class="btn btn-sm btn-outline-secondary rounded-3 px-3 d-flex align-items-center gap-1">
                        <i class="ti ti-rotate"></i> Reset Filter
                    </a>
                @endif
            </div>
            <form action="{{ route('reports.index') }}" method="GET" class="row align-items-end g-3">
                <div class="col-md-3">
                    <label class="form-label fw-medium text-dark">Tanggal Mulai</label>
                    <div class="date-input-wrapper">
                        <input type="text" name="start_date" class="form-control bg-white datepicker-input" value="{{ $startDate }}" placeholder="YYYY-MM-DD" autocomplete="off">
                        <span class="date-icon">
                            <i class="ti ti-calendar"></i>
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-medium text-dark">Tanggal Selesai</label>
                    <div class="date-input-wrapper">
                        <input type="text" name="end_date" class="form-control bg-white datepicker-input" value="{{ $endDate }}" placeholder="YYYY-MM-DD" autocomplete="off">
                        <span class="date-icon">
                            <i class="ti ti-calendar"></i>
                        </span>
                    </div>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-medium text-dark">Gudang</label>
                    <select name="warehouse_id" class="form-select bg-white global-select2"
                        placeholder="Semua Gudang"
                        link="globalfetch"
                        t="{{ encrypt('warehouses') }}"
                        s="{{ encrypt('id,name') }}">
                        <option value="">Semua Gudang</option>
                        @if($warehouseId)
                            <option value="{{ $warehouseId }}" selected>{{ optional($warehouses->firstWhere('id', $warehouseId))->name }}</option>
                        @endif
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-medium text-dark">Reseller</label>
                    <select name="reseller_id" class="form-select bg-white global-select2"
                        placeholder="Semua Reseller"
                        link="globalfetch"
                        t="{{ encrypt('resellers') }}"
                        s="{{ encrypt('id,store_name') }}">
                        <option value="">Semua Reseller</option>
                        @if($resellerId)
                            <option value="{{ $resellerId }}" selected>{{ optional($resellers->firstWhere('id', $resellerId))->name }}</option>
                        @endif
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100 rounded-3 py-2 shadow-sm">
                        <i class="ti ti-search me-1"></i> Filter Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- KPI Summary Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="fs-2 text-muted fw-medium text-uppercase tracking-wider">Total Omzet / Revenue</span>
                        <div class="p-2.5 rounded-3 bg-primary-subtle text-primary d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="ti ti-chart-bar fs-6"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-1 text-dark">Rp {{ number_format($summary->total_revenue, 0, ',', '.') }}</h3>
                    <div class="d-flex align-items-center gap-1 fs-2 text-primary">
                        <i class="ti ti-trending-up fs-3"></i>
                        <span>Pendapatan Kotor Transaksi</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="fs-2 text-muted fw-medium text-uppercase tracking-wider">Total HPP / COGS (Cost)</span>
                        <div class="p-2.5 rounded-3 bg-warning-subtle text-warning d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="ti ti-shopping-cart-discount fs-6"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-1 text-dark">Rp {{ number_format($summary->total_cogs, 0, ',', '.') }}</h3>
                    <div class="d-flex align-items-center gap-1 fs-2 text-warning">
                        <i class="ti ti-coins fs-3"></i>
                        <span>Modal Pembelian Barang</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="fs-2 text-muted fw-medium text-uppercase tracking-wider">Laba Kotor (Gross Profit)</span>
                        <div class="p-2.5 rounded-3 bg-success-subtle text-success d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="ti ti-report-analytics fs-6"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-1 text-dark">Rp {{ number_format($summary->total_profit, 0, ',', '.') }}</h3>
                    <div class="d-flex align-items-center gap-1 fs-2 text-success">
                        <i class="ti ti-circle-check fs-3"></i>
                        <span>Margin Keuntungan Bersih HPP</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-4">
            <h5 class="fw-bold mb-3 text-dark d-flex align-items-center gap-2">
                <i class="ti ti-list-details fs-5 text-primary"></i> Rincian Transaksi & Profit Penjualan
            </h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle text-nowrap mb-0">
                    <thead>
                        <tr class="text-uppercase fs-2 text-muted tracking-wider border-bottom">
                            <th class="ps-3 py-3">Tanggal & Jam</th>
                            <th class="py-3">Kode Transaksi</th>
                            <th class="py-3">Pelanggan</th>
                            <th class="py-3 text-end">Pendapatan (Revenue)</th>
                            <th class="py-3 text-end">Modal HPP (COGS)</th>
                            <th class="pe-3 py-3 text-end">Laba (Gross Profit)</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        @foreach($transactions as $tx)
                            @php
                                $txCost = 0;
                                foreach($tx->details as $detail) {
                                    $txCost += ($detail->product->purchase_price ?? 0) * $detail->quantity;
                                }
                                $txProfit = $tx->total_amount - $txCost;
                            @endphp
                            <tr>
                                <td class="ps-3 fs-3 text-secondary">{{ $tx->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <span class="badge bg-light text-dark font-monospace border border-secondary-subtle px-2.5 py-1.5 rounded-2 fs-2 fw-semibold">
                                        {{ $tx->transaction_code }}
                                    </span>
                                </td>
                                <td>
                                    <span class="fs-3 text-dark fw-medium">{{ $tx->customer->name ?? 'Guest / Ritel' }}</span>
                                </td>
                                <td class="text-end fw-semibold fs-3 text-dark">Rp {{ number_format($tx->total_amount, 0, ',', '.') }}</td>
                                <td class="text-end text-muted fs-3">Rp {{ number_format($txCost, 0, ',', '.') }}</td>
                                <td class="pe-3 text-end fw-bold fs-3 {{ $txProfit >= 0 ? 'text-success' : 'text-danger' }}">
                                    Rp {{ number_format($txProfit, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                <div class="text-muted fs-2">
                    Menampilkan <strong>{{ $transactions->firstItem() ?? 0 }}</strong> - <strong>{{ $transactions->lastItem() ?? 0 }}</strong> dari <strong>{{ $transactions->total() }}</strong> transaksi
                </div>
                <div>
                    {{ $transactions->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection