function cancelOrder(orderId) {
    Swal.fire({
        title: 'Cancel Order?',
        text: 'This action cannot be undone',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, cancel it',
        confirmButtonColor: '#d33'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/admin/reseller/orders/${orderId}/cancel`,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': window.csrfToken
                },
                success: function() {
                    Swal.fire('Cancelled!', 'Order has been cancelled', 'success')
                        .then(() => location.reload());
                },
                error: function() {
                    Swal.fire('Error', 'Failed to cancel order', 'error');
                }
            });
        }
    });
}

function getStatusColor(status) {
    const colors = {
        'pending': 'warning',
        'processing': 'info',
        'completed': 'success',
        'cancelled': 'danger'
    };
    return colors[status] || 'secondary';
}
