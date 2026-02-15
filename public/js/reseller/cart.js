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
        
        // Try to find warehouse context
        let warehouseId = $(this).data('warehouse-id');
        let warehouseName = $(this).data('warehouse-name');

        window.addToCart(productId, productName, productPrice, productImage, warehouseId, warehouseName);
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

window.addToCart = function(productId, productName, productPrice, productImage, warehouseId, warehouseName) {
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
    
    saveCartToStorage();
    updateCartUI();
    
    ModernGrosir.showToast(`${productName} added to cart from ${warehouseName}`);
}

function updateCartUI() {
    const itemCount = cart.reduce((sum, item) => sum + item.qty, 0);
    const total = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
    
    if (itemCount > 0) {
        $('#cart-badge-header').text(itemCount).show();
        $('#btn-submit-order').prop('disabled', false);
    } else {
        $('#cart-badge-header').hide();
        $('#btn-submit-order').prop('disabled', true);
    }
    
    $('#cart-total').text(ModernGrosir.formatMoney(total));
    renderCartItems();
}

function renderCartItems() {
    if (cart.length === 0) {
        $('#cart-items-container').html(`<div class="text-center text-muted py-5"><i class="ti ti-shopping-cart-off fs-8 d-block mb-3"></i>Your cart is empty</div>`);
        return;
    }
    
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
            html += `
                <div class="list-group-item">
                    <div class="d-flex align-items-center">
                        <img src="${item.image}" class="rounded" width="60" height="60" style="object-fit: cover;">
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-1">${item.name}</h6>
                            <small class="text-muted">${ModernGrosir.formatMoney(item.price)} each</small>
                        </div>
                        <div class="text-end">
                            <div class="btn-group btn-group-sm mb-2" role="group">
                                <button class="btn btn-outline-secondary" onclick="updateQty(${item.id}, '${item.warehouse_id}', -1)">-</button>
                                <button class="btn btn-outline-secondary" disabled>${item.qty}</button>
                                <button class="btn btn-outline-secondary" onclick="updateQty(${item.id}, '${item.warehouse_id}', 1)">+</button>
                            </div>
                            <div>
                                <strong class="text-primary">${ModernGrosir.formatMoney(subtotal)}</strong>
                                <button class="btn btn-sm btn-link text-danger" onclick="removeFromCart(${item.id}, '${item.warehouse_id}')">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>`;
        });
        html += `</div></div>`;
    }
    $('#cart-items-container').html(html);
}

window.updateQty = function(productId, warehouseId, change) {
    const item = cart.find(i => i.id === productId && i.warehouse_id == warehouseId);
    if (item) {
        item.qty += change;
        if (item.qty <= 0) {
            window.removeFromCart(productId, warehouseId);
        } else {
            saveCartToStorage();
            updateCartUI();
        }
    }
}

window.removeFromCart = function(productId, warehouseId) {
    cart = cart.filter(item => !(item.id === productId && item.warehouse_id == warehouseId));
    saveCartToStorage();
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
            saveCartToStorage();
            updateCartUI();
        }
    });
}

function submitOrder() {
    if (cart.length === 0) return;
    
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
                url: window.cartRoutes.store,
                method: 'POST',
                data: { orders: ordersPayload },
                headers: {
                    'X-CSRF-TOKEN': window.csrfToken
                },
                success: function(response) {
                    const orderCount = response.order_ids ? response.order_ids.length : 0;
                    Swal.fire({
                        icon: 'success',
                        title: 'Submitted!',
                        text: `Successfully created ${orderCount} order(s).`,
                        confirmButtonText: 'View My Orders'
                    }).then(() => {
                        window.location.href = window.cartRoutes.index;
                    });
                    
                    cart = [];
                    saveCartToStorage();
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
