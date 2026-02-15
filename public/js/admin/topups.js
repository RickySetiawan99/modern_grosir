/**
 * Admin Top-up Verification JS - ModernGrosir
 */
$(document).ready(function() {
    $('.btn-review').on('click', function() {
        const data = $(this).data();
        
        $('#modal-reseller').text(data.reseller);
        $('#modal-store').text(data.store);
        $('#modal-amount').text(data.amount);
        $('#modal-date').text(data.date);
        $('#modal-notes').text(data.notes);
        $('#modal-proof-img').attr('src', data.proof);
        $('#modal-proof-link').attr('href', data.proof);
        
        // Set dynamic form actions
        $('#approve-form').attr('action', `/admin/master/topups/${data.id}/approve`);
        $('#reject-form').attr('action', `/admin/master/topups/${data.id}/reject`);
        
        $('#reviewModal').modal('show');
    });

    $('.btn-approve-submit').on('click', function() {
        Swal.fire({
            title: "Approve Top-up?",
            text: "Saldo reseller akan bertambah sesuai nominal.",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Yes, Approve!",
            cancelButtonText: "Cancel",
            confirmButtonColor: "#13deb9",
        }).then((result) => {
            if (result.isConfirmed) {
                $('#approve-form').submit();
            }
        });
    });

    $('.btn-reject-submit').on('click', function() {
        Swal.fire({
            title: "Reject Top-up?",
            text: "Permintaan ini akan ditolak.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, Reject!",
            cancelButtonText: "Cancel",
            confirmButtonColor: "#fa896b",
        }).then((result) => {
            if (result.isConfirmed) {
                $('#reject-form').submit();
            }
        });
    });
});
