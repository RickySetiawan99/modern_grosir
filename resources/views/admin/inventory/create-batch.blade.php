@extends('layouts.master')

@section('title', 'Create New Batch')

@section('css')
    <link rel="stylesheet" href="{{ asset('build/libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('build/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <style>
        .select2-container {
            width: 100% !important;
        }
        .select2-container--default .select2-selection--single {
            border: 1px solid var(--bs-border-color) !important;
            background-color: transparent !important;
            height: calc(2.25rem + 2px) !important;
            border-radius: 7px !important;
            position: relative !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: var(--bs-body-color) !important;
            padding-left: 15px !important;
            line-height: calc(2.25rem + 1px) !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: calc(2.25rem) !important;
            position: absolute !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
            right: 10px !important;
            width: 20px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: var(--bs-secondary) transparent transparent transparent !important;
        }
        .select2-dropdown {
            background-color: var(--bs-body-bg) !important;
            border: 1px solid var(--bs-border-color) !important;
            color: var(--bs-body-color) !important;
            box-shadow: 0 4px 24px 0 rgba(0, 0, 0, 0.1) !important;
        }
        .select2-results__option--highlighted[aria-selected] {
            background-color: var(--bs-primary) !important;
        }
        .select2-search__field {
            background-color: var(--bs-body-bg) !important;
            color: var(--bs-body-color) !important;
            border: 1px solid var(--bs-border-color) !important;
        }
    </style>
@endsection

@section('pageContent')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Create New Batch</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="{{ route('inventory.batches.index') }}">Batches</a></li>
                            <li class="breadcrumb-item" aria-current="page">New Batch</li>
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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Batch Information</h5>
                    
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('inventory.batches.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Warehouse <span class="text-danger">*</span></label>
                                <select class="form-control select2" name="warehouse_id" required>
                                    <option value="">Select Warehouse</option>
                                    @foreach($warehouses as $warehouse)
                                        <option value="{{ $warehouse->id }}" {{ old('warehouse_id') == $warehouse->id ? 'selected' : '' }}>
                                            {{ $warehouse->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('warehouse_id') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Product <span class="text-danger">*</span></label>
                                <select class="form-control select2" name="product_id" required>
                                    <option value="">Select Product</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                            {{ $product->name }} ({{ $product->sku }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('product_id') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Batch Number</label>
                                <input type="text" class="form-control" name="batch_number" value="{{ old('batch_number') }}" placeholder="Auto-generated if empty">
                                <small class="text-muted">Leave empty to auto-generate</small>
                                @error('batch_number') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Quantity <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="quantity" value="{{ old('quantity') }}" min="1" required>
                                @error('quantity') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Received Date <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" name="received_date" value="{{ old('received_date', date('Y-m-d')) }}" required autocomplete="off">
                                    <span class="input-group-text">
                                        <i class="ti ti-calendar fs-5"></i>
                                    </span>
                                </div>
                                @error('received_date') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Expiration Date</label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" name="expiration_date" value="{{ old('expiration_date') }}" autocomplete="off">
                                    <span class="input-group-text">
                                        <i class="ti ti-calendar fs-5"></i>
                                    </span>
                                </div>
                                <small class="text-muted">Optional (defaults to product shelf life)</small>
                                @error('expiration_date') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Purchase Price (Per Unit)</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" class="form-control" name="purchase_price" value="{{ old('purchase_price') }}" step="0.01" min="0">
                                </div>
                                @error('purchase_price') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Supplier</label>
                                <select class="form-control select2" name="supplier_id">
                                    <option value="">Select Supplier</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                            {{ $supplier->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('supplier_id') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12 mb-4">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" rows="3">{{ old('notes') }}</textarea>
                                @error('notes') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 text-end">
                            <a href="{{ route('inventory.batches.index') }}" class="btn btn-light-danger text-danger font-medium waves-effect">Cancel</a>
                            <button type="submit" class="btn btn-primary font-medium waves-effect">Create Batch</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('build/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                width: '100%'
            });

            // Initialize Datepicker
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
@endsection
