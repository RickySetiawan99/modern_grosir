/**
 * POS JS - ModernGrosir
 */

let cart = [];
let selectedWarehouse = $('#warehouse-select').val();
let currentPage = 1;
let isLoading = false;
let lastPage = 1;
let displayedProducts = [];
let currentResellerId = null;
let loadedDraftIds = []; 

$(document).ready(function() {
    function openCartDrawer() {
        $('body').addClass('pos-cart-open');
    }

    function closeCartDrawer() {
        $('body').removeClass('pos-cart-open');
    }

    $('#pos-cart-toggle').on('click', function() {
        openCartDrawer();
    });

    $('#pos-cart-close, #pos-cart-overlay').on('click', function() {
        closeCartDrawer();
    });

    $(window).on('resize', function() {
        if (window.innerWidth >= 992) {
            closeCartDrawer();
        }
    });

    $('#invoiceModal').on('hidden.bs.modal', function () {
        location.reload();
    });

    fetchProducts();

    $('#btn-load-drafts').click(function() {
        if (!currentResellerId) return;
        fetchDraftOrders();
    });

    $('#btn-process-drafts').click(function() {
        loadSelectedDrafts();
    });

    $('#check-all-drafts').change(function() {
        $('.draft-checkbox').prop('checked', $(this).is(':checked'));
    });

    $('#warehouse-select').on('change', function() {
        selectedWarehouse = $(this).val();
        currentPage = 1;
        fetchProducts();
    });

    let debounceTimer;
    $('#search-input, #category-filter').on('input change', function() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            currentPage = 1;
            fetchProducts();
        }, 300);
    });

    $('#product-grid-container').on('scroll', function() {
        if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight - 100) {
            if(!isLoading && currentPage < lastPage) {
                currentPage++;
                fetchProducts(true);
            }
        }
    });
    
    $('#customer-select').on('change', function() {
        currentResellerId = $(this).val();
        if (currentResellerId) {
            $('#btn-load-drafts').show();
        } else {
            $('#btn-load-drafts').hide();
        }
        renderCart();
    });

    $(document).on('click', '.product-card', function() {
        const id = $(this).data('id');
        const product = displayedProducts.find(p => p.id === id);
        if (!product) return;

        const currentStock = product.current_stock || 0;
        const cartItem = cart.find(c => c.id === id);
        const currentQty = cartItem ? cartItem.qty : 0;

        if (currentQty + 1 > currentStock) {
            Swal.fire({
                title: 'Out of Stock',
                text: `Only ${currentStock} item(s) available in this warehouse.`,
                icon: 'warning',
                target: ModernGrosir.getSwalTarget('#pos-wrapper')
            });
            return;
        }

        if (product.has_near_expiry) {
            Swal.fire({
                title: 'Near Expiration Warning',
                text: `This product has a batch expiring soon (${product.earliest_expiry}). Proceed?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ffc107',
                confirmButtonText: 'Yes, Sell It',
                target: ModernGrosir.getSwalTarget('#pos-wrapper')
            }).then((result) => {
                if (result.isConfirmed) {
                    addToCart(product);
                }
            });
            return;
        }

        addToCart(product);
    });

    $(document).on('click', '.btn-plus', function() {
        const id = $(this).data('id');
        const item = cart.find(c => c.id === id);
        if (!item) return;

        const visibleProduct = displayedProducts.find(p => p.id === id);
        let maxStock = 9999;
        
        if (visibleProduct) {
            maxStock = visibleProduct.current_stock;
        } else if (item.product_obj && item.product_obj.current_stock !== undefined) {
            maxStock = item.product_obj.current_stock; 
        }

        if (item.qty + 1 > maxStock) {
            Swal.fire({
                title: 'Stock Limit',
                text: 'Cannot add more quantity.',
                icon: 'warning',
                target: ModernGrosir.getSwalTarget('#pos-wrapper')
            });
            return; 
        }
        
        item.qty++;
        renderCart();
    });

    $(document).on('click', '.btn-minus', function() {
        const id = $(this).data('id');
        const warehouseId = $(this).data('warehouse-id'); 
        const item = cart.find(c => c.id === id && c.warehouse_id === warehouseId);
        
        // Handle case where warehouse_id might be undefined (regular items)
        const targetItem = item || cart.find(c => c.id === id);

        if (targetItem) {
            if (targetItem.qty > 1) {
                targetItem.qty--;
            } else {
                cart = cart.filter(c => c !== targetItem);
            }
            renderCart();
        }
    });

    $('#btn-clear').click(function() {
        cart = [];
        loadedDraftIds = [];
        renderCart();
    });
    
    $('#btn-checkout').click(function() {
        const total = ModernGrosir.parseMoney($('#total-display').text());
        const customerId = $('#customer-select').val();

        Swal.fire({
            title: 'Confirm Transaction?',
            text: `Total: ${$('#total-display').text()}`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, Pay!',
            confirmButtonColor: '#5d87ff',
            target: ModernGrosir.getSwalTarget('#pos-wrapper')
        }).then((result) => {
            if (result.isConfirmed) {
                const paymentMethod = $('#payment-method-select').val();
                processCheckout(total, customerId, paymentMethod);
            }
        });
    });

    $('#btn-fullscreen').click(function() {
        const elem = document.getElementById('pos-wrapper');
        if (!document.fullscreenElement) {
            if (elem.requestFullscreen) elem.requestFullscreen();
            else if (elem.webkitRequestFullscreen) elem.webkitRequestFullscreen();
            else if (elem.msRequestFullscreen) elem.msRequestFullscreen();
            $(this).html('<i class="ti ti-minimize"></i>');
            $(elem).addClass('p-3'); 
        } else {
            if (document.exitFullscreen) document.exitFullscreen();
            else if (document.webkitExitFullscreen) document.webkitExitFullscreen();
            else if (document.msExitFullscreen) document.msExitFullscreen();
            $(this).html('<i class="ti ti-maximize"></i>');
            $(elem).removeClass('p-3');
        }
    });
});

function addToCart(product) {
    const existing = cart.find(c => c.id === product.id);
    if (existing) {
        existing.qty++;
    } else {
        cart.push({
            id: product.id,
            name: product.name,
            base_price: product.retail_price,
            image: product.image,
            qty: 1,
            product_obj: product
        });
    }
    renderCart();
    // Use ModernGrosir Toast
    const isMobile = window.innerWidth < 768;
    if (isMobile) {
        ModernGrosir.showToast('Ditambahkan ke cart');
    }
}

function fetchProducts(append = false) {
    if (isLoading) return;
    isLoading = true;
    
    const search = $('#search-input').val();
    const catId = $('#category-filter').val();
    
    if (!append) {
        $('#product-grid').html('<div class="col-12 text-center py-5"><i class="ti ti-loader animate-spin fs-6"></i> Loading...</div>');
    }

    $.ajax({
        url: window.posRoutes.products,
        data: {
            page: currentPage,
            warehouse_id: selectedWarehouse,
            search: search,
            category_id: catId
        },
        success: function(response) {
            const products = response.data;
            lastPage = response.last_page;
            
            if (!append) {
                displayedProducts = products;
            } else {
                displayedProducts = [...displayedProducts, ...products];
            }

            let html = '';
            products.forEach(p => {
                const stock = parseInt(p.current_stock || 0);
                const stockClass = stock > 0 ? 'text-success' : 'text-danger';
                const disableClass = stock <= 0 ? 'opacity-50 pointer-events-none' : 'cursor-pointer product-card';
                const imageUrl = p.image ? `/${p.image}` : '/build/images/products/product-1.jpg';
                
                let expiryBadge = '';
                if (p.has_near_expiry) {
                    expiryBadge = `<span class="badge bg-warning text-dark fs-2 position-absolute top-0 end-0 m-2" title="Expired Soon: ${p.earliest_expiry}">Expiring Soon</span>`;
                }

                html += `
                <div class="col-6 col-sm-6 col-md-4">
                    <div class="card h-100 hover-img shadow-sm pos-product-card ${disableClass}" data-id="${p.id}">
                        ${expiryBadge}
                        <img src="${imageUrl}" class="card-img-top rounded-0" alt="${p.name}">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2 badge-row">
                                 <span class="badge bg-light text-dark fw-semibold fs-2">${p.category.name}</span>
                                 <span class="badge bg-light text-dark fs-2 badge-sku" title="${p.sku}">${p.sku}</span>
                            </div>
                            <h6 class="fw-semibold fs-3 mb-1 product-title">${p.name}</h6>
                            <div class="d-flex justify-content-between align-items-center mt-3 price-row">
                                <h5 class="fw-bold text-primary mb-0">Rp ${p.formatted_price}</h5>
                                <span class="${stockClass} fs-2 fw-semibold">
                                    <i class="ti ti-box"></i> ${stock} ${p.unit.name}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>`;
            });

            if (products.length === 0 && !append) {
                html = '<div class="col-12 text-center text-muted py-5">No products found</div>';
            }

            if (append) $('#product-grid').append(html);
            else $('#product-grid').html(html);
            
            isLoading = false;
        },
        error: function() {
            isLoading = false;
            if (!append) $('#product-grid').html('<div class="col-12 text-center text-danger py-5">Failed to load products</div>');
        }
    });
}

function renderCart() {
    let html = '';
    let subtotal = 0;
    
    const customerSelect = $('#customer-select option:selected');
    const isReseller = customerSelect.val() !== '';
    const tierDiscountStart = isReseller ? parseFloat(customerSelect.data('discount')) : 0;
    
    cart.forEach(item => {
        let price = item.base_price;
        if (isReseller && !item.is_draft_item) {
             price = price * (1 - (tierDiscountStart / 100));
        }
        
        const itemTotal = price * item.qty;
        subtotal += itemTotal;
        const imageUrl = item.image ? `/${item.image}` : '/build/images/products/product-1.jpg';

        html += `
        <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-3">
            <div class="d-flex align-items-center" style="width: 60%;">
                <img src="${imageUrl}" class="rounded-1 me-2" width="40" height="40" style="object-fit: cover;">
                <div class="d-flex flex-column text-truncate">
                    <h6 class="fw-semibold mb-1 text-truncate fs-2">${item.name}</h6>
                    <span class="text-muted fs-2">${ModernGrosir.formatMoney(price)} x ${item.qty}</span>
                </div>
            </div>
            <div class="d-flex align-items-center gap-1">
                <button class="btn btn-sm btn-light text-primary btn-minus p-1 px-2" data-id="${item.id}" data-warehouse-id="${item.warehouse_id || ''}"><i class="ti ti-minus fs-2"></i></button>
                <span class="fw-semibold fs-2 mx-1">${item.qty}</span>
                <button class="btn btn-sm btn-light text-primary btn-plus p-1 px-2" data-id="${item.id}"><i class="ti ti-plus fs-2"></i></button>
            </div>
            <div class="fw-bold text-dark fs-2 ms-auto">
                ${ModernGrosir.formatMoney(itemTotal)}
            </div>
        </div>`;
    });

    if (cart.length === 0) {
        $('#cart-items').html(`<div class="text-center text-muted p-5"><i class="ti ti-shopping-cart-off fs-8 mb-3 d-block"></i>Cart is empty</div>`);
        $('#btn-checkout').prop('disabled', true);
    } else {
        $('#cart-items').html(html);
        $('#btn-checkout').prop('disabled', false);
    }

    $('#cart-count').text(`${cart.length} items`);
    $('#pos-cart-fab-count').text(cart.length);
    const formattedSubtotal = ModernGrosir.formatMoney(subtotal);
    $('#total-display').text(formattedSubtotal);
    $('#subtotal-display').text(formattedSubtotal);
}

function processCheckout(totalAmount, customerId, paymentMethod = 'cash') {
    $.ajax({
        url: window.posRoutes.checkout,
        method: 'POST',
        data: {
            _token: window.csrfToken,
            cart: cart,
            warehouse_id: selectedWarehouse,
            customer_id: customerId,
            total_amount: totalAmount,
            payment_method: paymentMethod,
            draft_order_ids: loadedDraftIds 
        },
        beforeSend: function() {
            $('#btn-checkout').html('<i class="ti ti-loader animate-spin me-2"></i> Processing...').prop('disabled', true);
        },
        success: function(response) {
            cart = [];
            renderCart();
            $('#customer-select').val('').trigger('change');
            $('#btn-checkout').html('<i class="ti ti-cash me-2"></i> Process Payment').prop('disabled', false);
            
            if (response.transactions && response.transactions.length > 0) {
                 showInvoice(response.transactions[0].id);
            } else {
                 Swal.fire('Success', 'Transaction completed', 'success').then(() => location.reload());
            }
        },
        error: function(xhr) {
            $('#btn-checkout').html('<i class="ti ti-cash me-2"></i> Process Payment').prop('disabled', false);
            let msg = xhr.responseJSON?.message || 'Transaction failed.';
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: msg,
                target: ModernGrosir.getSwalTarget('#pos-wrapper')
            });
        }
    });
}

function showInvoice(trxId) {
    $('#invoice-modal-content').html('<div class="text-center py-5"><i class="ti ti-loader fs-6 animate-spin"></i> Loading Invoice...</div>');
    $('#invoiceModal').modal('show');

    $.ajax({
        url: `/admin/transactions/${trxId}/receipt`,
        success: function(html) {
            $('#invoice-modal-content').html(html);
        },
        error: function() {
            $('#invoice-modal-content').html('<div class="alert alert-danger">Failed to load invoice.</div>');
        }
    });
}

function fetchDraftOrders() {
    $.ajax({
        url: `${window.posRoutes.drafts}?reseller_id=${currentResellerId}`,
        success: function(drafts) {
            let html = '';
            if (drafts.length === 0) {
                html = '<tr><td colspan="6" class="text-center">No pending orders found</td></tr>';
            } else {
                drafts.forEach(d => {
                    html += `
                        <tr>
                            <td><input type="checkbox" class="form-check-input draft-checkbox" value="${d.id}" data-draft='${JSON.stringify(d)}'></td>
                            <td>#${d.id}</td>
                            <td>${d.warehouse ? d.warehouse.name : 'N/A'}</td>
                            <td>${d.items.length} items</td>
                            <td>${ModernGrosir.formatMoney(d.total_amount)}</td>
                            <td>${new Date(d.created_at).toLocaleDateString()}</td>
                        </tr>
                    `;
                });
            }
            $('#draft-list-container').html(html);
            $('#draftOrdersModal').modal('show');
        }
    });
}

function loadSelectedDrafts() {
    const selectedCheckboxes = $('.draft-checkbox:checked');
    if (selectedCheckboxes.length === 0) {
        Swal.fire({
            icon: 'warning',
            title: 'No Selection',
            text: 'Please select at least one draft order to load.',
            target: ModernGrosir.getSwalTarget('#pos-wrapper')
        });
        return;
    }

    let newItemsCount = 0;
    selectedCheckboxes.each(function() {
        const rawDraft = $(this).data('draft');
        const draft = typeof rawDraft === 'string' ? JSON.parse(rawDraft) : rawDraft;
        loadedDraftIds.push(draft.id);
        
        draft.items.forEach(item => {
            const existingItem = cart.find(c => c.id === item.product_id && c.warehouse_id == draft.warehouse_id);
            if (existingItem) {
                existingItem.qty += item.quantity;
            } else {
                const productName = item.product ? item.product.name : 'Product #' + item.product_id;
                const productImg = item.product ? item.product.image : null;
                cart.push({
                    id: item.product_id,
                    name: productName, 
                    base_price: parseFloat(item.unit_price),
                    image: productImg,
                    qty: item.quantity,
                    warehouse_id: draft.warehouse_id,
                    warehouse_name: draft.warehouse ? draft.warehouse.name : 'Unknown',
                    is_draft_item: true 
                });
            }
            newItemsCount++;
        });
    });

    $('#draftOrdersModal').modal('hide');
    renderCart();
    Swal.fire('Success', `${newItemsCount} items loaded from drafts`, 'success');
}
