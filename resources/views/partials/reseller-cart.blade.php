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
    let cart = [];
    const CART_STORAGE_KEY = 'reseller_cart';

    $(document).ready(function() {
        // Load cart from storage
        loadCartFromStorage();

        // Submit Order
        $('#btn-submit-order').click(function() {
            submitOrder();
        });

        // Add to Cart Click Handler (Delegate for dynamically added elements)
        $(document).on('click', '.btn-add-to-cart', function() {
            const productId = $(this).data('id');
            const productName = $(this).data('name');
            const productPrice = parseFloat($(this).data('price'));
            const productImage = $(this).data('image');
            
            // Try to find warehouse context (if button has data-warehouse-id or from select)
            let warehouseId = $(this).data('warehouse-id');
            let warehouseName = $(this).data('warehouse-name');

            addToCart(productId, productName, productPrice, productImage, warehouseId, warehouseName);
        });
    });

    function saveCartToStorage() {
        localStorage.setItem(CART_STORAGE_KEY, JSON.stringify(cart));
    }

    function loadCartFromStorage() {
        const stored = localStorage.getItem(CART_STORAGE_KEY);
        if (stored) {
            try {
                cart = JSON.parse(stored);
                updateCartUI();
            } catch (e) {
                console.error("Failed to parse cart storage", e);
                cart = [];
            }
        }
    }

    /* --- Modified Functions with Persistence --- */

    // Made global to be accessible from other pages/modules
    window.addToCart = function(productId, productName, productPrice, productImage, warehouseId, warehouseName) {
        // If warehouse info not passed, try to get from filter if exist (legacy support for catalog page)
        if (!warehouseId) {
             const filterVal = $('#warehouse-filter').val();
             if (filterVal && filterVal !== 'all') {
                 warehouseId = filterVal;
                 warehouseName = $('#warehouse-filter option:selected').text();
             } else {
                 Swal.fire({
                    icon: 'warning',
                    title: 'Select Warehouse',
                    text: 'Please select a specific warehouse before adding items to cart'
                });
                return;
             }
        }

        const existingItem = cart.find(item => item.id === productId && item.warehouse_id == warehouseId);
        
        if (existingItem) {
            existingItem.qty++;
        } else {
            cart.push({
                id: productId,
                name: productName,
                price: productPrice,
                image: productImage,
                qty: 1,
                warehouse_id: warehouseId,
                warehouse_name: warehouseName
            });
        }
        
        saveCartToStorage(); // Save!
        updateCartUI();
        
        Swal.fire({
            icon: 'success',
            title: 'Added!',
            text: `${productName} added to cart from ${warehouseName}`,
            timer: 1500,
            showConfirmButton: false
        });
    }

    function updateCartUI() {
        const itemCount = cart.reduce((sum, item) => sum + item.qty, 0);
        const total = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
        
        // Update badge in header
        if (itemCount > 0) {
            $('#cart-badge-header').text(itemCount).show();
            $('#btn-submit-order').prop('disabled', false);
        } else {
            $('#cart-badge-header').hide();
            $('#btn-submit-order').prop('disabled', true);
        }
        
        // Update total
        $('#cart-total').text('Rp ' + new Intl.NumberFormat('id-ID').format(total));
        
        // Render cart items
        renderCartItems();
    }

    function renderCartItems() {
        if (cart.length === 0) {
            $('#cart-items-container').html(`
                <div class="text-center text-muted py-5">
                    <i class="ti ti-shopping-cart-off fs-8 d-block mb-3"></i>
                    Your cart is empty
                </div>
            `);
            return;
        }
        
        // Group items by warehouse
        const groupedCart = cart.reduce((groups, item) => {
            if (!groups[item.warehouse_name]) {
                groups[item.warehouse_name] = [];
            }
            groups[item.warehouse_name].push(item);
            return groups;
        }, {});

        let html = '';
        
        for (const [warehouse, items] of Object.entries(groupedCart)) {
            html += `<div class="mb-3">
                        <h6 class="bg-light p-2 rounded fw-bold text-primary mb-2">
                            <i class="ti ti-building-warehouse me-1"></i> ${warehouse}
                        </h6>
                        <div class="list-group">`;
            
            items.forEach(item => {
                const subtotal = item.price * item.qty;
                // Create unique ID for qty update: combining item.id and item.warehouse_id
                html += `
                    <div class="list-group-item">
                        <div class="d-flex align-items-center">
                            <img src="${item.image}" class="rounded" width="60" height="60" style="object-fit: cover;">
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">${item.name}</h6>
                                <small class="text-muted">Rp ${new Intl.NumberFormat('id-ID').format(item.price)} each</small>
                            </div>
                            <div class="text-end">
                                <div class="btn-group btn-group-sm mb-2" role="group">
                                    <button class="btn btn-outline-secondary" onclick="updateQty(${item.id}, '${item.warehouse_id}', -1)">-</button>
                                    <button class="btn btn-outline-secondary" disabled>${item.qty}</button>
                                    <button class="btn btn-outline-secondary" onclick="updateQty(${item.id}, '${item.warehouse_id}', 1)">+</button>
                                </div>
                                <div>
                                    <strong class="text-primary">Rp ${new Intl.NumberFormat('id-ID').format(subtotal)}</strong>
                                    <button class="btn btn-sm btn-link text-danger" onclick="removeFromCart(${item.id}, '${item.warehouse_id}')">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
            html += `</div></div>`;
        }
        
        $('#cart-items-container').html(html);
    }

    // Expose functions required by inline onclick handlers
    window.updateQty = function(productId, warehouseId, change) {
        // Warehouse ID might be string or number, ensure lenient comparison
        const item = cart.find(i => i.id === productId && i.warehouse_id == warehouseId);
        if (item) {
            item.qty += change;
            if (item.qty <= 0) {
                removeFromCart(productId, warehouseId);
            } else {
                saveCartToStorage(); // Save!
                updateCartUI();
            }
        }
    }

    window.removeFromCart = function(productId, warehouseId) {
        cart = cart.filter(item => !(item.id === productId && item.warehouse_id == warehouseId));
        saveCartToStorage(); // Save!
        updateCartUI();
    }

    window.clearCart = function() {
        Swal.fire({
            title: 'Clear Cart?',
            text: 'Remove all items from cart?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, clear it'
        }).then((result) => {
            if (result.isConfirmed) {
                cart = [];
                updateCartUI();
            }
        });
    }

    function submitOrder() {
        if (cart.length === 0) return;
        
        // Count unique warehouses
        const warehouses = [...new Set(cart.map(item => item.warehouse_id))];
        const warehouseNames = [...new Set(cart.map(item => item.warehouse_name))].join(', ');
        
        Swal.fire({
            title: 'Submit Orders?',
            html: `
                <p>You have <strong>${cart.length} items</strong> from <strong>${warehouses.length} warehouse(s)</strong> (${warehouseNames})</p>
                <div class="alert alert-info py-2" style="font-size: 0.85rem">
                    Note: Changes will be split into separate orders for each warehouse.
                </div>
                <textarea id="order-notes" class="form-control mt-3" placeholder="Add notes for cashier (optional)" rows="3"></textarea>
            `,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Submit Orders',
            preConfirm: () => {
                return $('#order-notes').val();
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const notes = result.value;
                
                // Group items by warehouse for payload
                const ordersPayload = [];
                const groupedCart = cart.reduce((groups, item) => {
                    if (!groups[item.warehouse_id]) {
                        groups[item.warehouse_id] = [];
                    }
                    groups[item.warehouse_id].push(item);
                    return groups;
                }, {});

                for (const [whId, items] of Object.entries(groupedCart)) {
                    ordersPayload.push({
                        warehouse_id: whId,
                        items: items,
                        notes: notes 
                    });
                }
                
                $.ajax({
                    url: '{{ route("reseller.orders.store") }}',
                    method: 'POST',
                    data: { orders: ordersPayload },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        const orderCount = response.order_ids ? response.order_ids.length : 0;
                        Swal.fire({
                            icon: 'success',
                            title: 'Submitted!',
                            text: `Successfully created ${orderCount} order(s).`,
                            confirmButtonText: 'View My Orders'
                        }).then(() => {
                            window.location.href = '{{ route("reseller.orders.index") }}';
                        });
                        
                        cart = [];
                        saveCartToStorage(); // Clear storage!
                        updateCartUI();
                        $('#cartModal').modal('hide');
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed',
                            text: xhr.responseJSON?.error || 'Failed to submit orders'
                        });
                    }
                });
            }
        });
    }
</script>
