@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Stock Levels')

@section('pageContent')
    <!-- Header Banner Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
        <div class="card-body p-4">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <span class="badge bg-primary text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">Real-time Stock Monitor</span>
                        <span class="text-muted fs-2">&bull; Level Stok Produk Per Gudang</span>
                    </div>
                    <h3 class="fw-bold mb-1 text-dark">Tingkat Stok Inventaris</h3>
                    <p class="text-muted mb-0 fs-3">Pantau dan kendalikan kuantitas stok produk secara akurat di seluruh cabang gudang.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-4">
            <!-- Filter Toolbar -->
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
                <div class="d-flex align-items-center gap-2">
                    <div class="p-2.5 rounded-3 bg-primary-subtle text-primary d-flex align-items-center justify-content-center">
                        <i class="ti ti-building-warehouse fs-5"></i>
                    </div>
                    <div>
                        <label for="warehouse-filter" class="form-label fs-2 fw-medium text-muted mb-0">Pilih Gudang Penyimpanan</label>
                        <select id="warehouse-filter" class="form-select bg-white border fs-2 fw-semibold text-dark select2" style="min-width: 220px;">
                            <option value="">Semua Gudang</option>
                            @foreach($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }} ({{ ucfirst($warehouse->type) }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table id="main-table" class="table table-hover align-middle text-nowrap mb-0">
                    <thead>
                        <tr class="text-uppercase fs-2 text-muted tracking-wider border-bottom">
                            <th scope="col" class="ps-3 py-3" style="width: 50px;">No</th>
                            <th scope="col" class="py-3">Produk & SKU</th>
                            <th scope="col" class="py-3">Kategori</th>
                            <th scope="col" class="py-3">Gudang</th>
                            <th scope="col" class="py-3">Jumlah Stok Saat Ini</th>
                            <th scope="col" class="pe-3 py-3 text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit Stock Modal -->
    <div class="modal fade" id="modal-edit-stock" tabindex="-1" aria-labelledby="modalEditStockLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header border-bottom p-4">
                    <h5 class="modal-title fw-bold text-dark d-flex align-items-center gap-2" id="modalEditStockLabel">
                        <i class="ti ti-edit fs-5 text-primary"></i> Update Level Stok
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-edit-stock">
                    <div class="modal-body p-4">
                        <input type="hidden" id="stock-id">
                        <div class="mb-3 p-3 bg-light rounded-3">
                            <small class="text-muted d-block mb-1 fs-2">Produk</small>
                            <div id="display-product" class="fw-bold fs-4 text-dark"></div>
                        </div>
                        <div class="mb-3 p-3 bg-light rounded-3">
                            <small class="text-muted d-block mb-1 fs-2">Gudang</small>
                            <div id="display-warehouse" class="text-primary fw-semibold fs-3"></div>
                        </div>
                        <div class="mb-3">
                            <label for="input-quantity" class="form-label fw-medium text-dark">Jumlah Stok Fisik <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="input-quantity" name="quantity" min="0" required placeholder="Masukkan kuantitas fisik">
                            <div class="form-text fs-2">Ketik kuantitas fisik terbaru yang tersedia di lokasi gudang ini.</div>
                        </div>
                    </div>
                    <div class="modal-footer border-top p-3.5 bg-light">
                        <button type="button" class="btn btn-outline-secondary rounded-3 px-4" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary rounded-3 px-4 shadow-sm btn-save-stock">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        window.csrfToken = '{{ csrf_token() }}';
        window.inventoryRoutes = {
            data: '{{ route("inventory.data") }}'
        };
    </script>
    <script src="{{ asset('js/admin/inventory.js') }}"></script>
@endsection
