<div class="modal fade" id="transferModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title">Transfer Batch</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="transferForm" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="batch_id" id="transfer_batch_id">
                    
                    <div class="mb-3">
                        <label class="form-label">Current Warehouse</label>
                        <input type="text" class="form-control" id="transfer_from_warehouse" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Destination Warehouse</label>
                        <select class="form-select" name="to_warehouse_id" required>
                            <option value="">Select Destination</option>
                            @foreach($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Quantity to Transfer</label>
                        <input type="number" class="form-control" name="quantity" id="transfer_quantity" min="1">
                        <small class="text-muted">Leave empty to transfer all available stock</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Transfer Stock</button>
                </div>
            </form>
        </div>
    </div>
</div>
