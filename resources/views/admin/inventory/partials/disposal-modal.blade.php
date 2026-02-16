<div class="modal fade" id="disposalModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title">Dispose Batch Stock</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="disposalForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-warning">
                        This action cannot be undone. Stock will be permanently removed.
                    </div>
                    <input type="hidden" name="batch_id" id="disposal_batch_id">
                    
                    <div class="mb-3">
                        <label class="form-label">Current Quantity</label>
                        <input type="text" class="form-control" id="disposal_current_qty" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Quantity to Dispose</label>
                        <input type="number" class="form-control" name="quantity" id="disposal_quantity" min="1" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Reason</label>
                        <select class="form-select" name="reason" required>
                            <option value="expired">Expired</option>
                            <option value="damaged">Damaged</option>
                            <option value="quality_issue">Quality Issue</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea class="form-control" name="notes" rows="2" placeholder="Explain why..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Confirm Disposal</button>
                </div>
            </form>
        </div>
    </div>
</div>
