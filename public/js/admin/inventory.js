/**
 * Admin Inventory JS - ModernGrosir
 */
$(document).ready(function() {
    const table = initModernDatatable('#main-table', {
        ajax: {
            url: window.inventoryRoutes.data,
            data: function(d) {
                d.warehouse_id = $('#warehouse-filter').val();
            }
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'product.name', name: 'product.name' },
            { data: 'category', name: 'product.category.name' },
            { data: 'warehouse.name', name: 'warehouse.name' },
            { data: 'quantity', name: 'quantity', className: 'text-end' },
            { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-end' }
        ],
        order: [[1, 'asc']]
    });

    $('#warehouse-filter').on('change', function() {
        table.ajax.reload();
    });

    // Edit Stock Handler
    $(document).on('click', '.btn-edit-stock', function() {
        const data = $(this).data();
        $('#stock-id').val(data.id);
        $('#display-product').text(data.product);
        $('#display-warehouse').text(data.warehouse);
        $('#input-quantity').val(data.qty);
        $('#modal-edit-stock').modal('show');
    });

    $('#form-edit-stock').on('submit', function(e) {
        e.preventDefault();
        const id = $('#stock-id').val();
        const qty = $('#input-quantity').val();
        const $btn = $('.btn-save-stock');

        $btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Saving...');

        $.ajax({
            url: `/admin/inventory/${id}`,
            method: 'POST',
            data: {
                _token: window.csrfToken,
                quantity: qty
            },
            success: function(response) {
                if (response.success) {
                    $('#modal-edit-stock').modal('hide');
                    table.ajax.reload(null, false);
                    ModernGrosir.showToast(response.message, 'success');
                }
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: xhr.responseJSON?.message || 'Something went wrong!'
                });
            },
            complete: function() {
                $btn.prop('disabled', false).text('Save Changes');
            }
        });
    });
});
