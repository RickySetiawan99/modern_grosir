/**
 * Admin Inventory Pricing JS - ModernGrosir
 */
$(document).ready(function() {
    const table = initModernDatatable('#main-table', {
        ajax: window.pricingRoutes.data,
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'retail_price', name: 'retail_price' },
            { data: 'tier_prices', name: 'tier_prices', orderable: false },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        order: [[1, 'asc']]
    });

    let currentProductId = null;

    // Handle Edit Prices Click
    $('#main-table').on('click', '.btn-edit-prices', function() {
        currentProductId = $(this).data('id');
        
        $.get(`/admin/pricing/${currentProductId}`, function(data) {
            $('#modal-product-name').text(data.product_name);
            $('#modal-retail-price').text(ModernGrosir.formatMoney(data.retail_price));
            
            let html = '';
            data.tiers.forEach(tier => {
                html += `
                <div class="p-4 bg-light rounded-4 border">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <span class="fw-bold text-dark fs-3">${tier.tier_name}</span>
                            <small class="text-muted ms-1.5 fs-2">(${tier.discount}% Default Disc)</small>
                        </div>
                        <span class="badge bg-white text-dark border fs-2 fw-normal px-2.5 py-1.5">Default: ${ModernGrosir.formatMoney(tier.default_price)}</span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text bg-white border border-end-0 text-muted px-3 fs-2">Rp</span>
                        <input type="number" class="form-control bg-white border border-start-0 py-2 fs-2" 
                            name="prices[${tier.tier_id}]" 
                            value="${tier.override_price || ''}" 
                            placeholder="Set harga manual atau kosongkan untuk default">
                    </div>
                </div>`;
            });
            
            $('#tiers-container').html(html);
            $('#pricingModal').modal('show');
        });
    });

    // Handle Form Submit
    $('#pricingForm').on('submit', function(e) {
        e.preventDefault();
        
        $.ajax({
            url: `/admin/pricing/${currentProductId}`,
            method: 'POST',
            data: $(this).serialize() + `&_token=${window.csrfToken}`,
            success: function(response) {
                if (response.success) {
                    $('#pricingModal').modal('hide');
                    ModernGrosir.showToast(response.message, 'success');
                    table.ajax.reload(null, false);
                }
            },
            error: function(xhr) {
                Swal.fire('Error!', xhr.responseJSON?.message || 'Something went wrong.', 'error');
            }
        });
    });
});
