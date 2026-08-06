@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Batch Management')

@section('css')
    <link rel="stylesheet" href="{{ asset('build/libs/daterangepicker/daterangepicker.css') }}">
@endsection

@section('pageContent')
    <!-- Header Banner Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
        <div class="card-body p-4">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <span class="badge bg-primary text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">FEFO Inventory System</span>
                        <span class="text-muted fs-2">&bull; Control & Retur Batch</span>
                    </div>
                    <h3 class="fw-bold mb-1 text-dark">Manajemen Batch & Kadaluarsa</h3>
                    <p class="text-muted mb-0 fs-3">Kelola rotasi stok First-Expired-First-Out, lacak tanggal kadaluarsa, dan cegah kerugian barang expired.</p>
                </div>
                <div class="d-flex align-items-center gap-2 flex-wrap flex-shrink-0">
                    <a href="{{ route('inventory.batches.create') }}" class="btn btn-primary px-3 py-2 rounded-3 d-flex align-items-center gap-2 shadow-sm">
                        <i class="ti ti-plus fs-5"></i>
                        <span>Tambah Batch Baru</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Summary KPI Cards -->
    <div class="row g-3 mb-4">
        <!-- Active Batches Card -->
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 position-relative overflow-hidden">
                <div class="card-body p-3.5">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="fs-2 text-muted fw-medium text-uppercase tracking-wider">Batch Aktif</span>
                        <div class="p-2.5 rounded-3 bg-success-subtle text-success d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="ti ti-box-seam fs-6"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-1 text-dark">{{ number_format($summary['total_active']) }}</h3>
                    <div class="d-flex align-items-center gap-1 fs-2 text-success">
                        <i class="ti ti-circle-check fs-3"></i>
                        <span>Siap Edar / Aman</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Expiring Soon Card -->
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 position-relative overflow-hidden">
                <div class="card-body p-3.5">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="fs-2 text-muted fw-medium text-uppercase tracking-wider">Hampir Expired (< 30d)</span>
                        <div class="p-2.5 rounded-3 bg-warning-subtle text-warning d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="ti ti-alert-triangle fs-6"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-1 text-dark">{{ number_format($summary['expiring_soon']) }}</h3>
                    <div class="d-flex align-items-center gap-1 fs-2 text-warning">
                        <i class="ti ti-clock-hour-4 fs-3"></i>
                        <span>Prioritas FEFO / Diskon</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Expired Items Card -->
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 position-relative overflow-hidden">
                <div class="card-body p-3.5">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="fs-2 text-muted fw-medium text-uppercase tracking-wider">Batch Kadaluarsa</span>
                        <div class="p-2.5 rounded-3 bg-danger-subtle text-danger d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="ti ti-trash fs-6"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-1 text-dark">{{ number_format($summary['expired']) }}</h3>
                    <div class="d-flex align-items-center gap-1 fs-2 text-danger">
                        <i class="ti ti-alert-octagon fs-3"></i>
                        <span>Tarik dari Etalase / Retur</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Value at Risk Card -->
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 position-relative overflow-hidden">
                <div class="card-body p-3.5">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="fs-2 text-muted fw-medium text-uppercase tracking-wider">Potensi Kerugian</span>
                        <div class="p-2.5 rounded-3 bg-primary-subtle text-primary d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="ti ti-report-money fs-6"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-1 text-dark">Rp {{ number_format($summary['value_at_risk'], 0, ',', '.') }}</h3>
                    <div class="d-flex align-items-center gap-1 fs-2 text-muted">
                        <i class="ti ti-shield-dollar fs-3"></i>
                        <span>Estimasi Nilai Barang Expired</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main List Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-4">
            <!-- Filter Toolbar -->
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
                <!-- Status Quick Pills -->
                <div class="nav nav-pills gap-1 p-1 bg-light rounded-3 d-inline-flex flex-wrap">
                    <a href="{{ route('inventory.batches.index') }}" class="nav-link px-3 py-1.5 fs-2 rounded-2 {{ !request('status') && !request('expiring_within') ? 'active bg-white text-dark shadow-sm fw-semibold' : 'text-muted' }}">
                        Semua Batch
                    </a>
                    <a href="{{ route('inventory.batches.index', ['status' => 'active']) }}" class="nav-link px-3 py-1.5 fs-2 rounded-2 {{ request('status') === 'active' ? 'active bg-white text-dark shadow-sm fw-semibold' : 'text-muted' }}">
                        Aktif
                    </a>
                    <a href="{{ route('inventory.batches.index', ['expiring_within' => 30]) }}" class="nav-link px-3 py-1.5 fs-2 rounded-2 {{ request('expiring_within') == 30 ? 'active bg-white text-dark shadow-sm fw-semibold' : 'text-muted' }}">
                        Hampir Expired (< 30 Hari)
                    </a>
                    <a href="{{ route('inventory.batches.index', ['status' => 'expired']) }}" class="nav-link px-3 py-1.5 fs-2 rounded-2 {{ request('status') === 'expired' ? 'active bg-white text-dark shadow-sm fw-semibold' : 'text-muted' }}">
                        Kadaluarsa
                    </a>
                </div>

                <!-- Search & Warehouse Filter -->
                <form action="{{ route('inventory.batches.index') }}" method="GET" class="d-flex align-items-center gap-2 flex-wrap">
                    @if(request('status')) <input type="hidden" name="status" value="{{ request('status') }}"> @endif
                    @if(request('expiring_within')) <input type="hidden" name="expiring_within" value="{{ request('expiring_within') }}"> @endif

                    <select name="warehouse_id" class="form-select bg-white border select2" style="min-width: 160px;" onchange="this.form.submit()">
                        <option value="">Semua Gudang</option>
                        @foreach($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}" {{ request('warehouse_id') == $warehouse->id ? 'selected' : '' }}>
                                {{ $warehouse->name }}
                            </option>
                        @endforeach
                    </select>

                    <div class="input-group" style="min-width: 220px;">
                        <span class="input-group-text bg-white border-end-0 text-muted"><i class="ti ti-search"></i></span>
                        <input type="text" name="search" class="form-control bg-white border-start-0" placeholder="Cari No. Batch / Produk..." value="{{ request('search') }}">
                    </div>
                </form>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
                    <div class="d-flex align-items-center gap-2">
                        <i class="ti ti-circle-check fs-5"></i>
                        <div>{{ session('success') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Batches Table -->
            <div class="table-responsive" style="min-height: 300px;">
                <table class="table table-hover align-middle text-nowrap mb-0">
                    <thead>
                        <tr class="text-uppercase fs-2 text-muted tracking-wider border-bottom">
                            <th class="ps-3 py-3">No. Batch</th>
                            <th class="py-3">Produk & SKU</th>
                            <th class="py-3">Gudang</th>
                            <th class="py-3">Jumlah Stok</th>
                            <th class="py-3">Tgl Penerimaan</th>
                            <th class="py-3">Status FEFO / Expiration</th>
                            <th class="py-3">Status Batch</th>
                            <th class="pe-3 py-3 text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        @forelse($batches as $batch)
                            <tr>
                                <td class="ps-3">
                                    <span class="badge bg-light text-dark font-monospace border border-secondary-subtle px-2.5 py-1.5 rounded-2 fs-2 fw-semibold">
                                        #{{ $batch->batch_number }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2.5">
                                        @if($batch->product->image)
                                            <img src="{{ asset('storage/' . $batch->product->image) }}" class="rounded-3 me-1 object-fit-cover" width="36" height="36" alt="">
                                        @else
                                            <div class="rounded-3 bg-light text-secondary d-flex align-items-center justify-content-center me-1" style="width: 36px; height: 36px;">
                                                <i class="ti ti-package fs-5"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <h6 class="fw-semibold mb-0 fs-3 text-dark">{{ $batch->product->name }}</h6>
                                            <small class="text-muted font-monospace fs-2">{{ $batch->product->sku }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="fs-3 text-dark fw-medium">{{ $batch->warehouse->name }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-baseline gap-1">
                                        <span class="fw-bold fs-4 text-dark">{{ number_format($batch->quantity) }}</span>
                                        <small class="text-muted fs-2">{{ $batch->product->unit->short_name ?? '' }}</small>
                                    </div>
                                </td>
                                <td>
                                    <span class="fs-3 text-secondary">{{ $batch->received_date->format('d M Y') }}</span>
                                </td>
                                <td>
                                    @if($batch->expiration_date)
                                        <div class="d-flex flex-column gap-1">
                                            <span class="fs-3 fw-medium text-dark">{{ $batch->expiration_date->format('d M Y') }}</span>
                                            @if($batch->days_until_expiry !== null)
                                                @if($batch->days_until_expiry < 0)
                                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle d-inline-flex align-items-center gap-1 w-fit-content fs-1 rounded-pill">
                                                        <i class="ti ti-alert-circle"></i> Kadaluarsa {{ abs($batch->days_until_expiry) }} hari lalu
                                                    </span>
                                                @elseif($batch->days_until_expiry <= 30)
                                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle d-inline-flex align-items-center gap-1 w-fit-content fs-1 rounded-pill">
                                                        <i class="ti ti-clock-hour-4"></i> {{ $batch->days_until_expiry }} hari tersisa
                                                    </span>
                                                @else
                                                    <span class="badge bg-success-subtle text-success border border-success-subtle d-inline-flex align-items-center gap-1 w-fit-content fs-1 rounded-pill">
                                                        <i class="ti ti-circle-check"></i> {{ $batch->days_until_expiry }} hari tersisa
                                                    </span>
                                                @endif
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-muted fs-2">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($batch->status === 'active')
                                        <span class="badge bg-success text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">Active</span>
                                    @elseif($batch->status === 'expired')
                                        <span class="badge bg-danger text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">Expired</span>
                                    @elseif($batch->status === 'disposed')
                                        <span class="badge bg-secondary text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">Disposed</span>
                                    @endif
                                </td>
                                <td class="pe-3 text-end">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-icon btn-light rounded-circle shadow-none" type="button" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                            <i class="ti ti-dots-vertical fs-4"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3">
                                            <li>
                                                <button class="dropdown-item d-flex align-items-center gap-2 py-2" onclick="editBatch({{ $batch->id }})">
                                                    <i class="ti ti-edit fs-4 text-primary"></i> Edit Batch
                                                </button>
                                            </li>
                                            <li>
                                                <button class="dropdown-item d-flex align-items-center gap-2 py-2" onclick="transferBatch({{ $batch->id }})">
                                                    <i class="ti ti-arrows-left-right fs-4 text-info"></i> Transfer Stok
                                                </button>
                                            </li>
                                            <li>
                                                <button class="dropdown-item d-flex align-items-center gap-2 py-2 text-danger" onclick="disposeBatch({{ $batch->id }})">
                                                    <i class="ti ti-trash fs-4"></i> Disposisi / Retur
                                                </button>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <button class="dropdown-item d-flex align-items-center gap-2 py-2" onclick="viewHistory({{ $batch->id }})">
                                                    <i class="ti ti-history fs-4 text-secondary"></i> Riwayat Transaksi
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5">
                                    <div class="d-flex flex-column align-items-center justify-content-center py-4">
                                        <div class="p-3 rounded-circle bg-light text-muted mb-3">
                                            <i class="ti ti-box-off fs-9"></i>
                                        </div>
                                        <h6 class="fw-semibold text-dark mb-1 fs-4">Tidak Ada Data Batch</h6>
                                        <p class="text-muted fs-3 max-w-sm mb-3">Belum ada stok batch yang sesuai dengan kriteria filter atau pencarian Anda.</p>
                                        <a href="{{ route('inventory.batches.create') }}" class="btn btn-primary btn-sm px-3 rounded-3">
                                            <i class="ti ti-plus me-1"></i> Tambah Batch Baru
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                <div class="text-muted fs-2">
                    Menampilkan <strong>{{ $batches->firstItem() ?? 0 }}</strong> - <strong>{{ $batches->lastItem() ?? 0 }}</strong> dari <strong>{{ $batches->total() }}</strong> batch
                </div>
                <div>
                    {{ $batches->links() }}
                </div>
            </div>
        </div>
    </div>

    @include('admin.inventory.partials.edit-modal')
    @include('admin.inventory.partials.disposal-modal')
    @include('admin.inventory.partials.transfer-modal')
    @include('admin.inventory.partials.history-modal')
@endsection

@section('scripts')
    <script src="{{ asset('build/libs/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('build/libs/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/admin/batch-management.js') }}"></script>
@endsection
