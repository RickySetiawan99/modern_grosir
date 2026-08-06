<div class="modal fade" id="transferModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header border-bottom bg-white p-4 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-info text-white shadow-sm d-flex align-items-center justify-content-center flex-shrink-0" style="width: 44px; height: 44px;">
                        <i class="ti ti-arrows-left-right fs-6 text-white"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-dark mb-0 fs-4">Transfer Stok Batch</h5>
                        <p class="text-muted fs-2 mb-0">Pemindahan lokasi penyimpanan stok antar gudang</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="transferForm" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <input type="hidden" name="batch_id" id="transfer_batch_id">
                    
                    <div class="mb-3">
                        <label class="form-label fw-medium text-dark fs-2">Gudang Asal Saat Ini</label>
                        <input type="text" class="form-control bg-light border" id="transfer_from_warehouse" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium text-dark fs-2">Gudang Tujuan <span class="text-danger">*</span></label>
                        <select class="form-select bg-white border select2" name="to_warehouse_id" required>
                            <option value="">Pilih Gudang Tujuan</option>
                            @foreach($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-medium text-dark fs-2">Jumlah Yang Ditransfer</label>
                        <input type="number" class="form-control bg-white border" name="quantity" id="transfer_quantity" min="1" placeholder="Kosongkan untuk transfer seluruh stok">
                        <small class="text-muted fs-2 mt-1 d-block">Biarkan kosong jika ingin memindahkan seluruh sisa stok batch ini.</small>
                    </div>
                </div>
                <div class="modal-footer bg-light border-top p-4">
                    <button type="button" class="btn btn-outline-secondary px-3 rounded-2 fw-medium" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-3 rounded-2 fw-medium">Transfer Stok</button>
                </div>
            </form>
        </div>
    </div>
</div>
