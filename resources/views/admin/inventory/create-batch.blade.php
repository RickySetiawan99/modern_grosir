@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Create New Batch')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('pageContent')
    <!-- Header Banner Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
        <div class="card-body p-4">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <a href="{{ route('inventory.batches.index') }}" class="text-decoration-none text-muted fs-2">
                            <i class="ti ti-arrow-left me-1"></i> Kembali ke Batches
                        </a>
                        <span class="text-muted fs-2">&bull; Input Penerimaan Barang Baru</span>
                    </div>
                    <h3 class="fw-bold mb-1 text-dark">Tambah Batch Inventaris Baru</h3>
                    <p class="text-muted mb-0 fs-3">Daftarkan nomor batch, tanggal kadaluarsa, serta lokasi gudang untuk rotasi stok FEFO.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4 text-dark d-flex align-items-center gap-2">
                        <i class="ti ti-file-text fs-5 text-primary"></i> Form Informasi Batch
                    </h5>
                    
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4" role="alert">
                            <div class="d-flex align-items-center gap-2">
                                <i class="ti ti-alert-circle fs-5"></i>
                                <div>{{ session('error') }}</div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('inventory.batches.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">Gudang Penyimpanan <span class="text-danger">*</span></label>
                                <select class="form-control select2" name="warehouse_id" required>
                                    <option value="">Pilih Gudang</option>
                                    @foreach($warehouses as $warehouse)
                                        <option value="{{ $warehouse->id }}" {{ old('warehouse_id') == $warehouse->id ? 'selected' : '' }}>
                                            {{ $warehouse->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('warehouse_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">Produk <span class="text-danger">*</span></label>
                                <select class="form-control select2" name="product_id" required>
                                    <option value="">Pilih Produk</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                            {{ $product->name }} ({{ $product->sku }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('product_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">Nomor Batch</label>
                                <input type="text" class="form-control" name="batch_number" value="{{ old('batch_number') }}" placeholder="Otomatis dibuat jika dikosongkan">
                                <small class="text-muted">Kosongkan untuk generasi kode otomatis</small>
                                @error('batch_number') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">Jumlah Stok (Qty) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="quantity" value="{{ old('quantity') }}" min="1" required placeholder="Contoh: 100">
                                @error('quantity') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">Tanggal Penerimaan <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" name="received_date" value="{{ old('received_date', date('Y-m-d')) }}" required autocomplete="off">
                                    <span class="input-group-text">
                                        <i class="ti ti-calendar"></i>
                                    </span>
                                </div>
                                @error('received_date') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">Tanggal Kadaluarsa (Expired)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" name="expiration_date" value="{{ old('expiration_date') }}" autocomplete="off" placeholder="YYYY-MM-DD">
                                    <span class="input-group-text">
                                        <i class="ti ti-calendar"></i>
                                    </span>
                                </div>
                                <small class="text-muted">Opsional (mengikuti shelf-life default produk jika kosong)</small>
                                @error('expiration_date') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">Harga Beli Per Unit</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" class="form-control" name="purchase_price" value="{{ old('purchase_price') }}" step="0.01" min="0" placeholder="0">
                                </div>
                                @error('purchase_price') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium text-dark">Pemasok (Supplier)</label>
                                <select class="form-control select2" name="supplier_id">
                                    <option value="">Pilih Pemasok</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                            {{ $supplier->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('supplier_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-medium text-dark">Catatan Tambahan</label>
                                <textarea class="form-control" name="notes" rows="3" placeholder="Tambahkan catatan khusus batch ini jika ada...">{{ old('notes') }}</textarea>
                                @error('notes') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                            <a href="{{ route('inventory.batches.index') }}" class="btn btn-outline-secondary rounded-3 px-4">Batal</a>
                            <button type="submit" class="btn btn-primary rounded-3 px-4 shadow-sm">Simpan Batch Baru</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Initialize Datepicker
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
@endsection
