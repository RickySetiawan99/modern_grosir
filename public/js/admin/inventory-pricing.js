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
                <div class="mb-3 p-3 bg-light rounded-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="fw-bold text-dark fs-3">${tier.tier_name} <small class="text-muted">(${tier.discount}% Default Disc)</small></span>
                        <span class="fs-2 text-muted">Default: ${ModernGrosir.formatMoney(tier.default_price)}</span>
                    </div>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-white">Rp</span>
                        <input type="number" class="form-control border-start-0" 
                            name="prices[${tier.tier_id}]" 
                            value="${tier.override_price || ''}" 
                            placeholder="Set manual price or leave empty for default">
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
