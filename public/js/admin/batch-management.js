$(document).ready(function() {
    // Initialize Select2
    $('.select2').select2({
        dropdownParent: $('#createBatchModal')
    });

    // Initialize Product Select2 with AJAX
    $('.select2-products').select2({
        dropdownParent: $('#createBatchModal'),
        ajax: {
            url: '/admin/master/products/data',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    keyword: params.term, // search term
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            text: item.name + ' (' + item.sku + ')',
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        },
        minimumInputLength: 1
    });

    // Initialize Supplier Select2 with AJAX
    $('.select2-suppliers').select2({
        dropdownParent: $('#createBatchModal'),
        ajax: {
            url: '/admin/master/suppliers/data',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    keyword: params.term,
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });

    // Handle Create Batch Form Submission
    $('#createBatchForm').on('submit', function(e) {
        e.preventDefault();
        
        const form = $(this);
        const url = form.attr('action');

        $.ajax({
            url: url,
            type: 'POST',
            data: form.serialize(),
            success: function(response) {
                if (response.success) {
                    $('#createBatchModal').modal('hide');
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success'
                    }).then(() => {
                        window.location.reload();
                    });
                }
            },
            error: function(xhr) {
                let message = 'Something went wrong';
                if(xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
                Swal.fire({
                    title: 'Error!',
                    text: message,
                    icon: 'error'
                });
            }
        });
    });

    // Handle Disposal Form Submission
    $('#disposalForm').on('submit', function(e) {
        e.preventDefault();
        
        const batchId = $('#disposal_batch_id').val();
        const url = `/admin/inventory/batches/${batchId}/dispose`;

        $.ajax({
            url: url,
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response.success) {
                    $('#disposalModal').modal('hide');
                    Swal.fire({
                        title: 'Disposed!',
                        text: 'Stock successfully disposed.',
                        icon: 'success'
                    }).then(() => {
                        window.location.reload();
                    });
                }
            },
            error: function(xhr) {
                let message = 'Something went wrong';
                if(xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
                Swal.fire({
                    title: 'Error!',
                    text: message,
                    icon: 'error'
                });
            }
        });
    });

    // Handle Transfer Form Submission
    $('#transferForm').on('submit', function(e) {
        e.preventDefault();
        
        const batchId = $('#transfer_batch_id').val();
        const url = `/admin/inventory/batches/${batchId}/transfer`;

        $.ajax({
            url: url,
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response.success) {
                    $('#transferModal').modal('hide');
                    Swal.fire({
                        title: 'Transferred!',
                        text: 'Stock successfully transferred.',
                        icon: 'success'
                    }).then(() => {
                        window.location.reload();
                    });
                }
            },
            error: function(xhr) {
                let message = 'Something went wrong';
                if(xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
                Swal.fire({
                    title: 'Error!',
                    text: message,
                    icon: 'error'
                });
            }
        });
    });
});

// Helper Functions
function editBatch(id) {
    // For now, simpler edit functionality can be added here
    // Or reuse the create modal with pre-filled values
    Swal.fire({
        title: 'Coming Soon',
        text: 'Edit functionality will be implemented in the next phase.',
        icon: 'info'
    });
}

function disposeBatch(id) {
    // Reset form
    $('#disposalForm')[0].reset();
    $('#disposal_batch_id').val(id);

    // Fetch batch details to show current qty
    // For now we get it from the row or fetch via AJAX if needed
    // Simplified: Assuming we can get it from row data attributes if we added them
    // Or just fetch history to get details
    
    // Better: Fetch details from history endpoint since we need accurate qty
    $.get(`/admin/inventory/batches/${id}/history`, function(data) {
        $('#disposal_current_qty').val(data.current_stock);
        $('#disposalModal').modal('show');
    });
}

function transferBatch(id) {
    $('#transferForm')[0].reset();
    $('#transfer_batch_id').val(id);

    $.get(`/admin/inventory/batches/${id}/history`, function(data) {
        $('#transfer_from_warehouse').val(data.batch.warehouse.name);
        $('#transferModal').modal('show');
    });
}

function viewHistory(id) {
    $('#historyModal').modal('show');
    $('#historyLoading').show();
    $('#historyContent').hide();

    $.get(`/admin/inventory/batches/${id}/history`, function(data) {
        let html = `
            <div class="mb-4">
                <h5>Batch Details</h5>
                <div class="row g-3">
                    <div class="col-6 col-md-3">
                        <small class="text-muted d-block">Batch Number</small>
                        <span class="fw-semibold">${data.batch.batch_number}</span>
                    </div>
                    <div class="col-6 col-md-3">
                        <small class="text-muted d-block">Product</small>
                        <span class="fw-semibold">${data.batch.product.name}</span>
                    </div>
                    <div class="col-6 col-md-3">
                        <small class="text-muted d-block">Current Status</small>
                        <span class="badge bg-${data.status === 'active' ? 'success' : (data.status === 'expired' ? 'danger' : 'secondary')}-subtle text-${data.status === 'active' ? 'success' : (data.status === 'expired' ? 'danger' : 'secondary')}">
                            ${data.status.toUpperCase()}
                        </span>
                    </div>
                    <div class="col-6 col-md-3">
                        <small class="text-muted d-block">Current Stock</small>
                        <span class="fw-bold">${data.current_stock}</span>
                    </div>
                </div>
            </div>

            <ul class="timeline-widget mb-0 position-relative mb-n5">
                <li class="timeline-item d-flex position-relative overflow-hidden">
                    <div class="timeline-time text-dark flex-shrink-0 text-end">${moment(data.receipt.date).format('DD MMM YYYY')}</div>
                    <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                        <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                        <span class="timeline-badge-border d-block flex-shrink-0"></span>
                    </div>
                    <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">
                        Received Stock
                        <span class="d-block fw-normal text-muted fs-2">Quantity: ${data.receipt.quantity} <br> Supplier: ${data.receipt.supplier || '-'}</span>
                    </div>
                </li>
        `;

        // Sort sales and disposals by date
        let events = [];
        
        data.sales.forEach(sale => {
            events.push({
                type: 'sale',
                date: sale.date,
                quantity: sale.quantity,
                detail: sale.customer || 'POS Sale'
            });
        });

        data.disposals.forEach(disposal => {
            events.push({
                type: 'disposal',
                date: disposal.date,
                quantity: disposal.quantity,
                detail: disposal.reason + ' (' + disposal.disposed_by + ')'
            });
        });

        // Sort events by date
        events.sort((a, b) => new Date(a.date) - new Date(b.date));

        events.forEach(event => {
            const isSale = event.type === 'sale';
            const badgeColor = isSale ? 'primary' : 'danger';
            const title = isSale ? 'Stock Sold' : 'Stock Disposed';
            
            html += `
                <li class="timeline-item d-flex position-relative overflow-hidden">
                    <div class="timeline-time text-dark flex-shrink-0 text-end">${moment(event.date).format('DD MMM YYYY')}</div>
                    <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                        <span class="timeline-badge border-2 border border-${badgeColor} flex-shrink-0 my-8"></span>
                        <span class="timeline-badge-border d-block flex-shrink-0"></span>
                    </div>
                    <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">
                        ${title}
                        <span class="d-block fw-normal text-muted fs-2">Quantity: ${event.quantity} <br> ${event.detail}</span>
                    </div>
                </li>
            `;
        });

        html += `</ul>`;

        $('#historyContent').html(html);
        $('#historyLoading').hide();
        $('#historyContent').show();
    });
}
