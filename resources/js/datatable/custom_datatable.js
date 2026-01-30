/**
 * Modern DataTable Initialization
 * Provides a consistent look for all DataTables in the application
 */

function initModernDatatable(tableSelector, options = {}) {
    const defaultOptions = {
        processing: true,
        serverSide: true,
        responsive: true,
        pageLength: 10,
        ...options
    };

    const table = $(tableSelector).DataTable(defaultOptions);

    // Auto-setup individual delete if handleDelete helper exists
    if (typeof handleDelete === 'function') {
        handleDelete(table, options.itemName || 'Item');
    }

    // Initial check for bulk delete button
    toggleBulkDeleteBtn(tableSelector, options.bulkDeleteUrl);

    // Handle select-all checkbox
    $(tableSelector).on('change', '#select-all', function () {
        const isChecked = $(this).is(':checked');
        $(`${tableSelector} .item-checkbox, ${tableSelector} .row-checkbox`).prop('checked', isChecked);
        toggleBulkDeleteBtn(tableSelector, options.bulkDeleteUrl);
    });

    // Handle individual checkbox change
    $(tableSelector).on('change', '.item-checkbox, .row-checkbox', function () {
        const $checkboxes = $(`${tableSelector} .item-checkbox, ${tableSelector} .row-checkbox`);
        const allChecked = $checkboxes.length > 0 && $checkboxes.filter(':checked').length === $checkboxes.length;
        $(`${tableSelector} #select-all`).prop('checked', allChecked);
        toggleBulkDeleteBtn(tableSelector, options.bulkDeleteUrl);
    });

    return table;
}

function toggleBulkDeleteBtn(tableSelector, bulkDeleteUrl) {
    if (!bulkDeleteUrl) return;

    const selectedCount = $(`${tableSelector} .item-checkbox:checked, ${tableSelector} .row-checkbox:checked`).length;
    const $btn = $('#bulk-delete');

    if (selectedCount > 0) {
        $btn.removeClass('d-none');
        $btn.find('.selected-count').text(`(${selectedCount})`);
    } else {
        $btn.addClass('d-none');
    }
}

function executeBulkDelete() {
    // This assumes the page has specific context for what's being deleted
    // Usually defined in the page's scripts
    if (typeof window.executeBulkDelete === 'function') {
        window.executeBulkDelete();
    }
}

/**
 * Handle individual delete with SweetAlert
 */
function handleDelete(table, itemName = 'Item') {
    // Determine the selector for delegation
    const containerSelector = table ? $(table.table().container()) : $(document);

    containerSelector.on('click', '.btn-delete', function (e) {
        e.preventDefault();

        const $btn = $(this);
        const id = $btn.data('id');
        const name = $btn.data('name') || '';
        const actionUrl = $btn.data('action'); // Prefer data-action if available

        if (typeof Swal === 'undefined') {
            console.error('SweetAlert2 (Swal) is not loaded.');
            if (confirm(`Are you sure you want to delete ${itemName} "${name}"?`)) {
                performDelete($btn, id, actionUrl, table);
            }
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: `You are about to delete ${itemName} "${name}". This cannot be undone!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#5d87ff',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                performDelete($btn, id, actionUrl, table);
            }
        });
    });
}

function performDelete($btn, id, actionUrl, table) {
    // If no actionUrl, try to infer it from current data URL (less reliable)
    const url = actionUrl || $btn.closest('table').DataTable().ajax.url().replace('/data', `/${id}`);

    $.ajax({
        url: url,
        type: 'DELETE',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                if (typeof Swal !== 'undefined') {
                    Swal.fire('Deleted!', response.message, 'success');
                } else {
                    alert(response.message);
                }

                if (table) {
                    table.ajax.reload(null, false);
                } else {
                    location.reload();
                }
            } else {
                if (typeof Swal !== 'undefined') {
                    Swal.fire('Error!', response.message, 'error');
                } else {
                    alert(response.message);
                }
            }
        },
        error: function (xhr) {
            const msg = xhr.responseJSON?.message || 'Failed to delete item.';
            if (typeof Swal !== 'undefined') {
                Swal.fire('Error!', msg, 'error');
            } else {
                alert(msg);
            }
        }
    });
}
