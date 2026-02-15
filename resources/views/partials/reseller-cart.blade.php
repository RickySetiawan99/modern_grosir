<!-- Cart Modal -->
<div class="modal fade" id="cartModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title text-white"><i class="ti ti-shopping-cart me-2"></i>My Cart</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="cart-items-container">
                    <div class="text-center text-muted py-5">
                        <i class="ti ti-shopping-cart-off fs-8 d-block mb-3"></i>
                        Your cart is empty
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Total:</h5>
                        <h4 class="text-primary mb-0" id="cart-total">Rp 0</h4>
                    </div>
                    <button type="button" class="btn btn-light w-100 mb-2" onclick="clearCart()">Clear Cart</button>
                    <button type="button" class="btn btn-primary w-100" id="btn-submit-order" disabled>Submit Order</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.csrfToken = '{{ csrf_token() }}';
    window.cartRoutes = {
        store: '{{ route("reseller.orders.store") }}',
        index: '{{ route("reseller.orders.index") }}'
    };
</script>
<script src="{{ asset('js/reseller/cart.js') }}"></script>
