<div class="modal fade" id="historyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header border-bottom bg-white p-4 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-primary text-white shadow-sm d-flex align-items-center justify-content-center flex-shrink-0" style="width: 44px; height: 44px;">
                        <i class="ti ti-history fs-6 text-white"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-dark mb-0 fs-4">Riwayat & Audit Trail Batch</h5>
                        <p class="text-muted fs-2 mb-0">Rincian histori penerimaan, transaksi, dan pembuangan stok</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div id="historyLoading" class="text-center py-5">
                    <div class="spinner-border text-primary me-2" role="status"></div>
                    <span class="text-muted fs-3 fw-medium">Memuat data riwayat batch...</span>
                </div>
                <div id="historyContent" style="display: none;">
                    <!-- Content populated by JS -->
                </div>
            </div>
            <div class="modal-footer bg-light border-top p-4">
                <button type="button" class="btn btn-outline-secondary px-3 rounded-2 fw-medium" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
