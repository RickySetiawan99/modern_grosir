<div class="modal fade" id="createBatchModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myLargeModalLabel">Create New Batch</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createBatchForm" action="{{ route('inventory.batches.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Warehouse</label>
                            <select class="form-select select2" name="warehouse_id" required>
                                <option value="">Select Warehouse</option>
                                @foreach($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Product</label>
                            <select class="form-select select2-products" name="product_id" required>
                                <option value="">Select Product</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Batch Number</label>
                            <input type="text" class="form-control" name="batch_number" placeholder="Auto-generated if empty">
                            <small class="text-muted">Leave empty to auto-generate</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="quantity" min="1" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Received Date</label>
                            <input type="date" class="form-control" name="received_date" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Expiration Date</label>
                            <input type="date" class="form-control" name="expiration_date">
                            <small class="text-muted">Optional (defaults to product shelf life)</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Purchase Price (Per Unit)</label>
                            <input type="number" class="form-control" name="purchase_price" step="0.01" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Supplier</label>
                            <select class="form-select select2-suppliers" name="supplier_id">
                                <option value="">Select Supplier</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" name="notes" rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary px-3 rounded-2 fw-medium" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary font-medium waves-effect">Create Batch</button>
                </div>
            </form>
        </div>
    </div>
</div>
