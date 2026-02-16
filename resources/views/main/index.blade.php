@extends('layouts.master')

@section('title', 'ModernGrosir Dashboard')

@section('css')
  <link rel="stylesheet" href="{{ URL::asset('build/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
@endsection

@section('pageContent')
    <!-- Low Stock Notification -->
    @if($lowStockCount > 0 && auth()->user()->hasRole('admin'))
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-danger-subtle shadow-none position-relative overflow-hidden mb-0">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-2 text-danger">
                                <i class="ti ti-alert-triangle me-2"></i>Stok Menipis!
                            </h4>
                            <p class="mb-0 text-dark">Ada <strong>{{ $lowStockCount }} produk</strong> yang sudah mencapai atau di bawah batas stok aman. Segera lakukan pengadaan barang.</p>
                        </div>
                        <div class="col-3 text-end">
                            <button class="btn btn-danger" type="button" data-bs-toggle="collapse" data-bs-target="#lowStockList" aria-expanded="false">
                                Lihat Produk
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="collapse mt-2" id="lowStockList">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table align-middle text-nowrap mb-0">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Produk</h6></th>
                                        <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Stok Saat Ini</h6></th>
                                        <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Batas Aman</h6></th>
                                        <th class="border-bottom-0 text-end"><h6 class="fw-semibold mb-0">Action</h6></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lowStockProducts as $lp)
                                    <tr>
                                        <td class="border-bottom-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $lp->image ? asset($lp->image) : asset('build/images/products/product-1.jpg') }}" class="rounded" width="40" height="40" style="object-fit: cover;">
                                                <div class="ms-3">
                                                    <h6 class="fw-semibold mb-0">{{ $lp->name }}</h6>
                                                    <span class="text-muted">{{ $lp->sku }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class="badge bg-danger-subtle text-danger fw-semibold">{{ $lp->total_stock }} {{ $lp->unit->short_name ?? '' }}</span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class="fw-normal text-muted">{{ $lp->safety_stock }} {{ $lp->unit->short_name ?? '' }}</span>
                                        </td>
                                        <td class="border-bottom-0 text-end">
                                            <a href="{{ route('master.products.edit', $lp->id) }}" class="btn btn-sm btn-outline-primary">Edit Stok</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Expiration Alert Notification -->
    @if(($expiringCount > 0 || $expiredCount > 0) && auth()->user()->hasRole('admin'))
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-warning-subtle shadow-none position-relative overflow-hidden mb-0">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-2 text-warning">
                                <i class="ti ti-clock-exclamation me-2"></i>Perhatian: Barang Kedaluwarsa!
                            </h4>
                            <p class="mb-0 text-dark">
                                @if($expiredCount > 0)
                                    <span class="text-danger fw-bold">{{ $expiredCount }} batch sudah expired</span>
                                    @if($expiringCount > 0) dan @endif
                                @endif
                                @if($expiringCount > 0)
                                    <span>{{ $expiringCount }} batch akan expired dalam 30 hari</span>
                                @endif
                                . Segera lakukan tindakan.
                            </p>
                        </div>
                        <div class="col-3 text-end">
                            <button class="btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#expirationList" aria-expanded="false">
                                Lihat Batch
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="collapse mt-2" id="expirationList">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table align-middle text-nowrap mb-0">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Produk</h6></th>
                                        <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Batch</h6></th>
                                        <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Sisa Stok</h6></th>
                                        <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Tgl Expired</h6></th>
                                        <th class="border-bottom-0 text-end"><h6 class="fw-semibold mb-0">Action</h6></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($expiringBatches as $batch)
                                    <tr>
                                        <td class="border-bottom-0">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $batch->product->image ? asset($batch->product->image) : asset('build/images/products/product-1.jpg') }}" class="rounded" width="40" height="40" style="object-fit: cover;">
                                                <div class="ms-3">
                                                    <h6 class="fw-semibold mb-0">{{ $batch->product->name }}</h6>
                                                    <span class="text-muted">{{ $batch->product->sku }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class="fw-semibold">{{ $batch->batch_number }}</span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class="fw-bold">{{ number_format($batch->quantity) }}</span> <small>{{ $batch->product->unit->short_name ?? '' }}</small>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class="{{ $batch->days_until_expiry < 0 ? 'text-danger fw-bold' : ($batch->days_until_expiry < 30 ? 'text-warning fw-bold' : 'text-success') }}">
                                                {{ $batch->expiration_date->format('d M Y') }}
                                                <small class="d-block">({{ $batch->days_until_expiry < 0 ? abs($batch->days_until_expiry).' hari lalu' : $batch->days_until_expiry.' hari lagi' }})</small>
                                            </span>
                                        </td>
                                        <td class="border-bottom-0 text-end">
                                            <a href="{{ route('inventory.batches.index', ['search' => $batch->batch_number]) }}" class="btn btn-sm btn-outline-warning">Kelola</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="px-4 py-3 border-top text-center">
                                <a href="{{ route('inventory.batches.index', ['expiring_within' => 30]) }}" class="text-primary text-decoration-none fw-semibold">
                                    Lihat Semua Batch Expired <i class="ti ti-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!--  Owl carousel -->
    <div class="owl-carousel counter-carousel owl-theme">
        @role('admin')
        <div class="item">
            <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ URL::asset('build/images/svgs/icon-user-male.svg') }}" width="50" height="50" class="mb-3" alt="modernize-img" />
                        <p class="fw-semibold fs-3 text-primary mb-1">Resellers</p>
                        <h5 class="fw-semibold text-primary mb-0">{{ number_format($totalResellers) }}</h5>
                    </div>
                </div>
            </div>
        </div>
        @endrole
        @role('reseller')
        <div class="item">
            <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
                <div class="card-body">
                    <a href="{{ route('reseller.wallet.index') }}" class="text-decoration-none text-center d-block">
                        <img src="{{ URL::asset('build/images/svgs/icon-wallet.svg') }}" width="50" height="50" class="mb-3" alt="modernize-img" />
                        <p class="fw-semibold fs-3 text-primary mb-1">Wallet Balance</p>
                        <h5 class="fw-semibold text-primary mb-0">Rp {{ number_format($walletBalance, 0, ',', '.') }}</h5>
                    </a>
                </div>
            </div>
        </div>
        @endrole
        <div class="item">
            <div class="card border-0 zoom-in bg-warning-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ URL::asset('build/images/svgs/icon-briefcase.svg') }}" width="50" height="50" class="mb-3" alt="modernize-img" />
                        <p class="fw-semibold fs-3 text-warning mb-1">Products</p>
                        <h5 class="fw-semibold text-warning mb-0">{{ number_format($totalProducts) }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card border-0 zoom-in bg-info-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ URL::asset('build/images/svgs/icon-connect.svg') }}" width="50" height="50" class="mb-3" alt="modernize-img" />
                        <p class="fw-semibold fs-3 text-info mb-1">Transactions</p>
                        <h5 class="fw-semibold text-info mb-0">{{ number_format($totalTransactions) }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card border-0 zoom-in bg-danger-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ URL::asset('build/images/svgs/icon-favorites.svg') }}" width="50" height="50" class="mb-3" alt="modernize-img" />
                        <p class="fw-semibold fs-3 text-danger mb-1">{{ auth()->user()->hasRole('reseller') ? 'Total Spending' : 'Total Sales' }}</p>
                        <h5 class="fw-semibold text-danger mb-0">
                            @if(auth()->user()->hasRole('reseller'))
                                Rp {{ number_format($totalSales, 0, ',', '.') }}
                            @else
                                Rp {{ number_format($totalSales / 1000000, 1) }}M
                            @endif
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        @role('admin')
        <div class="item">
            <div class="card border-0 zoom-in bg-success-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ URL::asset('build/images/svgs/icon-speech-bubble.svg') }}" width="50" height="50" class="mb-3" alt="modernize-img" />
                        <p class="fw-semibold fs-3 text-success mb-1">Gross Profit</p>
                        <h5 class="fw-semibold text-success mb-0">Rp {{ number_format($totalProfit / 1000000, 1) }}M</h5>
                    </div>
                </div>
            </div>
        </div>
        @endrole
    </div>

    <div class="row">
        <!-- Sales Overview Chart -->
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h4 class="card-title fw-semibold">Performance Overview</h4>
                            <p class="card-subtitle mb-0">
                                @if(auth()->user()->hasRole('admin'))
                                    Revenue vs Profit in {{ date('Y') }}
                                @else
                                    Monthly Spendings in {{ date('Y') }}
                                @endif
                            </p>
                        </div>
                        @role('admin')
                        <div class="d-flex align-items-center gap-2">
                            <button class="btn btn-outline-primary btn-sm d-flex align-items-center gap-1" onclick="window.print()">
                                <i class="ti ti-file-text fs-4"></i> Export PDF
                            </button>
                            <a href="{{ route('reports.excel') }}" class="btn btn-primary btn-sm d-flex align-items-center gap-1" id="export-excel">
                                <i class="ti ti-table fs-4"></i> Export Excel
                            </a>
                        </div>
                        @endrole
                    </div>
                    <div id="sales-chart"></div>
                </div>
            </div>
        </div>

        <!-- Top Products -->
        <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100 mt-n1">
                <div class="card-body">
                    <h4 class="card-title fw-semibold">{{ auth()->user()->hasRole('reseller') ? 'My Top Products' : 'Top Selling Products' }}</h4>
                    <p class="card-subtitle mb-4">{{ auth()->user()->hasRole('reseller') ? 'Most purchased items' : 'By quantity sold' }}</p>
                    <div class="position-relative">
                        @forelse($topProducts as $tp)
                            <div class="d-flex align-items-center justify-content-between mb-7">
                                <div class="d-flex align-items-center">
                                    <div class="me-6">
                                        <img src="{{ $tp->product->image ? asset($tp->product->image) : asset('build/images/products/product-1.jpg') }}" alt="{{ $tp->product->name }}" class="rounded" width="45" height="45" style="object-fit: cover;">
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fs-4 fw-semibold">{{ Str::limit($tp->product->name, 20) }}</h6>
                                        <p class="fs-3 mb-0">{{ $tp->product->category->name ?? 'Uncategorized' }}</p>
                                    </div>
                                </div>
                                <div class="bg-primary-subtle badge">
                                    <p class="fs-3 text-primary fw-semibold mb-0">{{ $tp->total_qty }} Sold</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-muted">No sales data yet</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Transactions Table -->
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                        <div class="mb-3 mb-sm-0">
                            <h4 class="card-title fw-semibold">{{ auth()->user()->hasRole('reseller') ? 'Recent Orders' : 'Recent Transactions' }}</h4>
                            <p class="card-subtitle">{{ auth()->user()->hasRole('reseller') ? 'Last 5 orders' : 'Last 5 activities' }}</p>
                        </div>
                        <a href="{{ auth()->user()->hasRole('reseller') ? route('reseller.orders.index') : route('transactions.index') }}" class="btn btn-outline-primary btn-sm">View All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle text-nowrap mb-0">
                            <thead>
                                <tr class="text-muted fw-semibold">
                                    <th scope="col" class="ps-0">Code</th>
                                    @unless(auth()->user()->hasRole('reseller'))
                                        <th scope="col">Reseller</th>
                                    @endunless
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody class="border-top">
                                @forelse($recentTransactions as $tx)
                                    <tr>
                                        <td class="ps-0">
                                            <h6 class="fw-semibold mb-1">{{ $tx->transaction_code }}</h6>
                                        </td>
                                        @unless(auth()->user()->hasRole('reseller'))
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ ($tx->customer?->avatar) ? asset($tx->customer->avatar) : asset('build/images/profile/user-1.jpg') }}" class="rounded-circle me-2" width="30" height="30" style="object-fit: cover;">
                                                <p class="mb-0 fs-3">{{ $tx->customer->name ?? 'Guest' }}</p>
                                            </div>
                                        </td>
                                        @endunless
                                        <td>
                                            <p class="fs-3 text-dark mb-0 fw-semibold">Rp {{ number_format($tx->total_amount, 0, ',', '.') }}</p>
                                        </td>
                                        <td>
                                            @php
                                                $badgeClass = match($tx->status) {
                                                    'completed' => 'bg-success-subtle text-success',
                                                    'pending' => 'bg-warning-subtle text-warning',
                                                    'cancelled' => 'bg-danger-subtle text-danger',
                                                    default => 'bg-primary-subtle text-primary'
                                                };
                                            @endphp
                                            <span class="badge fw-semibold py-1 w-85 {{ $badgeClass }}">{{ ucfirst($tx->status) }}</span>
                                        </td>
                                        <td>
                                            <p class="fs-3 text-muted mb-0">{{ $tx->created_at->format('d M Y, H:i') }}</p>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">No transactions found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
  <script src="{{ URL::asset('build/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
  <script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  
  <script>
    window.dashboardData = {
        revenue: @json($chartData),
        @role('admin')
        profit: @json($profitChartData)
        @endrole
    };
  </script>
  <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection
