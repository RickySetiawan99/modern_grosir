$(document).ready(function() {
    // Initialize Select2 specifically within createBatchModal
    $('#createBatchModal .select2').select2({
        dropdownParent: $('#createBatchModal')
    });

    // Initialize Product Select2 with AJAX
    $('#createBatchModal .select2-products').select2({
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
    $('#createBatchModal .select2-suppliers').select2({
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
    // Handle Edit Batch Form Submission
    $('#editBatchForm').on('submit', function(e) {
        e.preventDefault();
        
        const form = $(this);
        const batchId = $('#edit_batch_id').val();
        const url = `/admin/inventory/batches/${batchId}`;
        const submitBtn = form.find('button[type="submit"]');
        
        submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-1"></span> Menyimpan...');
        
        $.ajax({
            url: url,
            type: 'PUT',
            data: form.serialize(),
            success: function(response) {
                if (response.success) {
                    $('#editBatchModal').modal('hide');
                    Swal.fire({
                        title: 'Berhasil!',
                        text: response.message || 'Data batch berhasil diperbarui.',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        title: 'Gagal!',
                        text: response.message || 'Gagal memperbarui batch.',
                        icon: 'error'
                    });
                }
            },
            error: function(xhr) {
                let message = 'Terjadi kesalahan saat memperbarui batch.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
                Swal.fire({
                    title: 'Error!',
                    text: message,
                    icon: 'error'
                });
            },
            complete: function() {
                submitBtn.prop('disabled', false).html('Simpan Perubahan');
            }
        });
    });
});

// Helper Functions
function editBatch(id) {
    $('#editBatchForm')[0].reset();
    $('#edit_batch_id').val(id);

    $.get(`/admin/inventory/batches/${id}`, function(response) {
        if (response.success && response.batch) {
            const batch = response.batch;
            $('#edit_batch_number_display').text('Batch #' + batch.batch_number);
            $('#edit_product_name').val(batch.product ? batch.product.name + ' (' + batch.product.sku + ')' : '-');
            $('#edit_warehouse_name').val(batch.warehouse ? batch.warehouse.name : '-');
            $('#edit_quantity').val(batch.quantity + ' unit');
            
            if (batch.expiration_date) {
                const expDate = new Date(batch.expiration_date).toISOString().split('T')[0];
                $('#edit_expiration_date').val(expDate);
            } else {
                $('#edit_expiration_date').val('');
            }
            
            if ($('#edit_supplier_id').length) {
                $('#edit_supplier_id').val(batch.supplier_id || '').trigger('change');
            }
            
            $('#edit_purchase_price').val(batch.purchase_price || '');
            $('#edit_notes').val(batch.notes || '');

            $('#editBatchModal').modal('show');
        } else {
            Swal.fire('Error', response.message || 'Gagal memuat data batch', 'error');
        }
    }).fail(function() {
        Swal.fire('Error', 'Gagal memuat data dari server', 'error');
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
        const statusBadgeClass = data.status === 'active' 
            ? 'bg-success-subtle text-success border-success-subtle' 
            : (data.status === 'expired' ? 'bg-danger-subtle text-danger border-danger-subtle' : 'bg-secondary-subtle text-secondary border-secondary-subtle');

        let html = `
            <div class="card border-0 bg-primary-subtle rounded-4 p-3 mb-4">
                <div class="row g-3 align-items-center">
                    <div class="col-6 col-md-3">
                        <small class="text-muted d-block fs-2 text-uppercase tracking-wider fw-medium mb-1">No. Batch</small>
                        <span class="badge bg-white text-dark font-monospace border border-secondary-subtle px-2.5 py-1.5 fs-2 fw-semibold">
                            #${data.batch.batch_number}
                        </span>
                    </div>
                    <div class="col-6 col-md-3">
                        <small class="text-muted d-block fs-2 text-uppercase tracking-wider fw-medium mb-1">Produk</small>
                        <span class="fw-bold text-dark fs-3 d-block text-truncate">${data.batch.product.name}</span>
                    </div>
                    <div class="col-6 col-md-3">
                        <small class="text-muted d-block fs-2 text-uppercase tracking-wider fw-medium mb-1">Status Batch</small>
                        <span class="badge ${statusBadgeClass} border px-2.5 py-1 rounded-pill fs-2 fw-semibold">
                            ${data.status.toUpperCase()}
                        </span>
                    </div>
                    <div class="col-6 col-md-3">
                        <small class="text-muted d-block fs-2 text-uppercase tracking-wider fw-medium mb-1">Sisa Stok</small>
                        <span class="fw-bold fs-4 text-primary d-block">${data.current_stock}</span>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between mb-3">
                <h6 class="fw-bold text-dark mb-0 fs-3">Histori & Audit Trail Pergerakan Stok</h6>
                <span class="badge bg-light text-muted border fs-2 fw-normal">Rotasi FEFO</span>
            </div>

            <div class="d-flex flex-column gap-3">
                <!-- Initial Intake Event -->
                <div class="d-flex align-items-start gap-3 p-3 rounded-3 bg-light border position-relative">
                    <div class="p-2 rounded-circle bg-success text-white shadow-sm flex-shrink-0 mt-0.5 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                        <i class="ti ti-box-seam fs-5 text-white"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-1 mb-1">
                            <h6 class="fw-bold text-dark mb-0 fs-3">Stok Masuk (Penerimaan Supplier)</h6>
                            <span class="badge bg-white text-dark border fs-2 fw-normal">${moment(data.receipt.date).format('DD MMM YYYY')}</span>
                        </div>
                        <div class="d-flex align-items-center gap-3 fs-2 text-muted flex-wrap">
                            <span>Kuantitas: <strong class="text-success">+${data.receipt.quantity}</strong></span>
                            <span>&bull;</span>
                            <span>Supplier: <strong class="text-dark">${data.receipt.supplier || '-'}</strong></span>
                        </div>
                    </div>
                </div>
        `;

        // Sort sales and disposals by date
        let events = [];
        
        data.sales.forEach(sale => {
            events.push({
                type: 'sale',
                date: sale.date,
                quantity: sale.quantity,
                detail: sale.customer || 'Transaksi Kasir POS'
            });
        });

        data.disposals.forEach(disposal => {
            events.push({
                type: 'disposal',
                date: disposal.date,
                quantity: disposal.quantity,
                detail: (disposal.reason || 'Disposisi') + (disposal.disposed_by ? ' (' + disposal.disposed_by + ')' : '')
            });
        });

        // Sort events by date
        events.sort((a, b) => new Date(a.date) - new Date(b.date));

        events.forEach(event => {
            const isSale = event.type === 'sale';
            const icon = isSale ? 'ti-shopping-cart' : 'ti-trash';
            const iconBg = isSale ? 'bg-primary text-white shadow-sm' : 'bg-danger text-white shadow-sm';
            const title = isSale ? 'Penjualan / Terjual (POS)' : 'Disposisi / Pembuangan Stok';
            const qtyColor = isSale ? 'text-primary' : 'text-danger';
            
            html += `
                <div class="d-flex align-items-start gap-3 p-3 rounded-3 bg-light border position-relative">
                    <div class="p-2 ${iconBg} rounded-circle flex-shrink-0 mt-0.5 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                        <i class="ti ${icon} fs-5 text-white"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-1 mb-1">
                            <h6 class="fw-bold text-dark mb-0 fs-3">${title}</h6>
                            <span class="badge bg-white text-dark border fs-2 fw-normal">${moment(event.date).format('DD MMM YYYY')}</span>
                        </div>
                        <div class="d-flex align-items-center gap-3 fs-2 text-muted flex-wrap">
                            <span>Kuantitas: <strong class="${qtyColor}">-${event.quantity}</strong></span>
                            <span>&bull;</span>
                            <span>Keterangan: <strong class="text-dark">${event.detail}</strong></span>
                        </div>
                    </div>
                </div>
            `;
        });

        html += `</div>`;

        $('#historyContent').html(html);
        $('#historyLoading').hide();
        $('#historyContent').show();
    });
}
