/**
 * Admin Resellers JS - ModernGrosir
 */
$(document).ready(function() {
    const table = initModernDatatable('#main-table', {
        ajax: window.resellerRoutes.data,
        columns: [
            { data: 'checkbox', name: 'checkbox', orderable: false, searchable: false },
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'user.name', name: 'user.name' },
            { data: 'tier.name', name: 'tier.name' },
            { data: 'credit_limit', name: 'credit_limit' },
            { data: 'balance', name: 'balance' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        order: [[2, 'asc']], 
        bulkDeleteUrl: window.resellerRoutes.bulkDelete,
        messages: {
            deleteText: 'Reseller "{name}" akan dihapus permanen beserta akun user-nya!'
        }
    });

    // Balance Modal Handler
    $(document).on('click', '.btn-balance', function() {
        const id = $(this).data('id');
        const name = $(this).data('name');
        const balance = $(this).data('balance');

        $('#balance-reseller-id').val(id);
        $('#display-balance').text(balance);
        $('#modalBalanceLabel').text(`Manage Balance: ${name}`);
        $('#form-balance')[0].reset();
        $('#modal-balance').modal('show');
    });

    $('#form-balance').on('submit', function(e) {
        e.preventDefault();
        const id = $('#balance-reseller-id').val();
        const $btn = $('.btn-save-balance');

        $btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-1"></span> Processing...');

        $.ajax({
            url: `/admin/master/resellers/${id}/balance`,
            method: 'POST',
            data: {
                _token: window.csrfToken,
                type: $('input[name="type"]:checked').val(),
                amount: $('#amount').val(),
                notes: $('#notes').val()
            },
            success: function(response) {
                $('#modal-balance').modal('hide');
                table.ajax.reload(null, false);
                ModernGrosir.showToast(response.message, 'success');
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: xhr.responseJSON?.message || 'Something went wrong'
                });
            },
            complete: function() {
                $btn.prop('disabled', false).text('Submit');
            }
        });
    });
});
