<div class="modal fade" id="disposalModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header border-bottom bg-white p-4 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-danger text-white shadow-sm d-flex align-items-center justify-content-center flex-shrink-0" style="width: 44px; height: 44px;">
                        <i class="ti ti-trash fs-6 text-white"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-dark mb-0 fs-4">Disposisi / Retur Stok Batch</h5>
                        <p class="text-muted fs-2 mb-0">Pengeluaran stok batch karena rusak, kadaluarsa, dsb.</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="disposalForm" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="alert alert-warning border-0 bg-warning-subtle text-warning-emphasis rounded-3 p-3 mb-3 d-flex align-items-center gap-2">
                        <i class="ti ti-alert-triangle fs-5 flex-shrink-0"></i>
                        <div class="fs-2">Tindakan ini akan mengurangi stok batch secara permanen dan tidak dapat dibatalkan.</div>
                    </div>
                    <input type="hidden" name="batch_id" id="disposal_batch_id">
                    
                    <div class="mb-3">
                        <label class="form-label fw-medium text-dark fs-2">Jumlah Stok Saat Ini</label>
                        <input type="text" class="form-control bg-light border" id="disposal_current_qty" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium text-dark fs-2">Jumlah Yang Didisposisi <span class="text-danger">*</span></label>
                        <input type="number" class="form-control bg-white border" name="quantity" id="disposal_quantity" min="1" placeholder="Masukkan jumlah unit" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium text-dark fs-2">Alasan Disposisi <span class="text-danger">*</span></label>
                        <select class="form-select bg-white border select2" name="reason" required>
                            <option value="expired">Barang Kadaluarsa (Expired)</option>
                            <option value="damaged">Barang Rusak (Damaged)</option>
                            <option value="quality_issue">Masalah Kualitas (Quality Issue)</option>
                            <option value="other">Alasan Lainnya (Other)</option>
                        </select>
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-medium text-dark fs-2">Catatan Tambahan</label>
                        <textarea class="form-control bg-white border" name="notes" rows="2" placeholder="Penjelasan detail disposisi..."></textarea>
                    </div>
                </div>
                <div class="modal-footer bg-light border-top p-4">
                    <button type="button" class="btn btn-outline-secondary px-3 rounded-2 fw-medium" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger px-3 rounded-2 fw-medium">Konfirmasi Disposisi</button>
                </div>
            </form>
        </div>
    </div>
</div>
