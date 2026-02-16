@extends('layouts.master')

@section('title', 'Batch Management')

@section('css')
    <link rel="stylesheet" href="{{ asset('build/libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('build/libs/daterangepicker/daterangepicker.css') }}">
@endsection

@section('pageContent')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Batch Management</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="{{ route('inventory.index') }}">Inventory</a></li>
                            <li class="breadcrumb-item" aria-current="page">Batches</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('build/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6">
            <div class="card border-top border-info border-3 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <span class="rounded d-flex align-items-center justify-content-center bg-info-subtle text-info p-2 me-2">
                            <i class="ti ti-box fs-6"></i>
                        </span>
                        <h6 class="fw-semibold mb-0">Active Batches</h6>
                    </div>
                    <h4 class="fw-bold mb-0 text-info">{{ number_format($summary['total_active']) }}</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-top border-warning border-3 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <span class="rounded d-flex align-items-center justify-content-center bg-warning-subtle text-warning p-2 me-2">
                            <i class="ti ti-alert-triangle fs-6"></i>
                        </span>
                        <h6 class="fw-semibold mb-0">Expiring Soon (< 30d)</h6>
                    </div>
                    <h4 class="fw-bold mb-0 text-warning">{{ number_format($summary['expiring_soon']) }}</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-top border-danger border-3 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <span class="rounded d-flex align-items-center justify-content-center bg-danger-subtle text-danger p-2 me-2">
                            <i class="ti ti-trash fs-6"></i>
                        </span>
                        <h6 class="fw-semibold mb-0">Expired Items</h6>
                    </div>
                    <h4 class="fw-bold mb-0 text-danger">{{ number_format($summary['expired']) }}</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-top border-primary border-3 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <span class="rounded d-flex align-items-center justify-content-center bg-primary-subtle text-primary p-2 me-2">
                            <i class="ti ti-currency-dollar fs-6"></i>
                        </span>
                        <h6 class="fw-semibold mb-0">Value at Risk</h6>
                    </div>
                    <h4 class="fw-bold mb-0 text-primary">Rp {{ number_format($summary['value_at_risk'], 0, ',', '.') }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-md-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title fw-semibold mb-3 mb-md-0">Batches List</h5>
                <div class="d-flex gap-2">
                    <a href="{{ route('inventory.batches.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
                        <i class="ti ti-plus fs-4"></i> New Batch
                    </a>
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-filter fs-4 me-1"></i> Filter
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('inventory.batches.index', ['status' => 'active']) }}">Active Batches</a></li>
                            <li><a class="dropdown-item" href="{{ route('inventory.batches.index', ['status' => 'expired']) }}">Expired Batches</a></li>
                            <li><a class="dropdown-item" href="{{ route('inventory.batches.index', ['expiring_within' => 30]) }}">Expiring Soon</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('inventory.batches.index') }}">All Batches</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-alert="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="d-md-flex justify-content-end mb-4">
                <form action="{{ route('inventory.batches.index') }}" method="GET" class="d-flex gap-2">
                    <select name="warehouse_id" class="form-select" onchange="this.form.submit()">
                        <option value="">All Warehouses</option>
                        @foreach($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}" {{ request('warehouse_id') == $warehouse->id ? 'selected' : '' }}>
                                {{ $warehouse->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search batch or product..." value="{{ request('search') }}">
                        <button class="btn btn-outline-primary" type="submit"><i class="ti ti-search"></i></button>
                    </div>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle text-nowrap">
                    <thead class="bg-light">
                        <tr>
                            <th>Batch No.</th>
                            <th>Product</th>
                            <th>Warehouse</th>
                            <th>Qty</th>
                            <th>Received</th>
                            <th>Expiration</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($batches as $batch)
                            <tr>
                                <td>
                                    <span class="fw-semibold text-dark">{{ $batch->batch_number }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($batch->product->image)
                                            <img src="{{ asset('storage/' . $batch->product->image) }}" class="rounded-circle me-2" width="32" height="32" alt="">
                                        @else
                                            <div class="rounded-circle bg-light-primary text-primary d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                                <i class="ti ti-package fs-4"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <h6 class="fw-semibold mb-0">{{ $batch->product->name }}</h6>
                                            <small class="text-muted">{{ $batch->product->sku }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $batch->warehouse->name }}</td>
                                <td>
                                    <span class="fw-bold">{{ number_format($batch->quantity) }}</span> 
                                    <small class="text-muted">{{ $batch->product->unit->short_name ?? '' }}</small>
                                </td>
                                <td>{{ $batch->received_date->format('d M Y') }}</td>
                                <td>
                                    @if($batch->expiration_date)
                                        <div class="d-flex flex-column">
                                            <span>{{ $batch->expiration_date->format('d M Y') }}</span>
                                            @if($batch->days_until_expiry !== null)
                                                <small class="{{ $batch->days_until_expiry < 0 ? 'text-danger fw-bold' : ($batch->days_until_expiry < 30 ? 'text-warning fw-bold' : 'text-success') }}">
                                                    {{ $batch->days_until_expiry < 0 ? abs($batch->days_until_expiry).' days ago' : $batch->days_until_expiry.' days left' }}
                                                </small>
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($batch->status === 'active')
                                        <span class="badge bg-success-subtle text-success">Active</span>
                                    @elseif($batch->status === 'expired')
                                        <span class="badge bg-danger-subtle text-danger">Expired</span>
                                    @elseif($batch->status === 'disposed')
                                        <span class="badge bg-secondary-subtle text-secondary">Disposed</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-icon btn-light" type="button" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <button class="dropdown-item d-flex align-items-center gap-2" 
                                                    onclick="editBatch({{ $batch->id }})">
                                                    <i class="ti ti-edit fs-4"></i> Edit
                                                </button>
                                            </li>
                                            <li>
                                                <button class="dropdown-item d-flex align-items-center gap-2" 
                                                    onclick="transferBatch({{ $batch->id }})">
                                                    <i class="ti ti-arrows-left-right fs-4"></i> Transfer
                                                </button>
                                            </li>
                                            <li>
                                                <button class="dropdown-item d-flex align-items-center gap-2 text-danger" 
                                                    onclick="disposeBatch({{ $batch->id }})">
                                                    <i class="ti ti-trash fs-4"></i> Dispose
                                                </button>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <button class="dropdown-item d-flex align-items-center gap-2" 
                                                    onclick="viewHistory({{ $batch->id }})">
                                                    <i class="ti ti-history fs-4"></i> History
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5">
                                    <img src="{{ asset('build/images/products/empty-shopping-bag.gif') }}" alt="No Data" class="img-fluid mb-3" width="120">
                                    <p class="fs-4 text-muted">No batches found matching your criteria.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-3">
                {{ $batches->links() }}
            </div>
        </div>
    </div>

    {{-- @include('admin.inventory.partials.batch-form-modal') --}}
    @include('admin.inventory.partials.disposal-modal')
    @include('admin.inventory.partials.transfer-modal')
    @include('admin.inventory.partials.history-modal')
@endsection

@section('scripts')
    <script src="{{ asset('build/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('build/libs/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('build/libs/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/admin/batch-management.js') }}"></script>
@endsection
