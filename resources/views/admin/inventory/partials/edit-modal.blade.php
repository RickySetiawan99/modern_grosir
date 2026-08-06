<div class="modal fade" id="editBatchModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header border-bottom bg-white p-4 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-primary text-white shadow-sm d-flex align-items-center justify-content-center flex-shrink-0" style="width: 44px; height: 44px;">
                        <i class="ti ti-edit fs-6 text-white"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-dark mb-0 fs-4">Edit Data Batch</h5>
                        <p class="text-muted fs-2 mb-0" id="edit_batch_number_display">Memperbarui informasi detail batch</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editBatchForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body p-4">
                    <input type="hidden" id="edit_batch_id">
                    
                    <div class="mb-3">
                        <label class="form-label fw-medium text-dark fs-2">Produk</label>
                        <input type="text" class="form-control bg-light border" id="edit_product_name" readonly>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-medium text-dark fs-2">Gudang</label>
                            <input type="text" class="form-control bg-light border" id="edit_warehouse_name" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-medium text-dark fs-2">Sisa Stok Saat Ini</label>
                            <input type="text" class="form-control bg-light border" id="edit_quantity" readonly>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium text-dark fs-2">Tanggal Kadaluarsa (Expired)</label>
                        <input type="date" class="form-control bg-white border" name="expiration_date" id="edit_expiration_date">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium text-dark fs-2">Pemasok / Supplier</label>
                        <select class="form-select bg-white border select2" name="supplier_id" id="edit_supplier_id">
                            <option value="">Pilih Supplier (Opsional)</option>
                            @foreach($suppliers ?? [] as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium text-dark fs-2">Harga Beli Per Unit (Rp)</label>
                        <input type="number" step="0.01" class="form-control bg-white border" name="purchase_price" id="edit_purchase_price" placeholder="Masukkan harga beli">
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-medium text-dark fs-2">Catatan Tambahan</label>
                        <textarea class="form-control bg-white border" name="notes" id="edit_notes" rows="2" placeholder="Catatan internal batch..."></textarea>
                    </div>
                </div>
                <div class="modal-footer bg-light border-top p-4">
                    <button type="button" class="btn btn-outline-secondary px-3 rounded-2 fw-medium" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-3 rounded-2 fw-medium">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
