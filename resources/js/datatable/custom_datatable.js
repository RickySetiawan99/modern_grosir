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
    toggleBulkDeleteBtn(tableSelector, options.bulkDeleteUrl, options.itemName || 'Item');

    // Handle select-all checkbox
    $(tableSelector).on('change', '#select-all', function () {
        const isChecked = $(this).is(':checked');
        $(`${tableSelector} .item-checkbox, ${tableSelector} .row-checkbox`).prop('checked', isChecked);
        toggleBulkDeleteBtn(tableSelector, options.bulkDeleteUrl, options.itemName || 'Item');
    });

    // Handle individual checkbox change
    $(tableSelector).on('change', '.item-checkbox, .row-checkbox', function () {
        const $checkboxes = $(`${tableSelector} .item-checkbox, ${tableSelector} .row-checkbox`);
        const allChecked = $checkboxes.length > 0 && $checkboxes.filter(':checked').length === $checkboxes.length;
        $(`${tableSelector} #select-all`).prop('checked', allChecked);
        toggleBulkDeleteBtn(tableSelector, options.bulkDeleteUrl, options.itemName || 'Item');
    });

    return table;
}

function toggleBulkDeleteBtn(tableSelector, bulkDeleteUrl, itemName = 'Item') {
    if (!bulkDeleteUrl) return;

    const selectedCount = $(`${tableSelector} .item-checkbox:checked, ${tableSelector} .row-checkbox:checked`).length;
    const $btn = $('#bulk-delete');

    if (selectedCount > 0) {
        $btn.removeClass('d-none');
        $btn.find('.selected-count').text(`(${selectedCount})`);
        $btn.data('table-selector', tableSelector).data('bulk-url', bulkDeleteUrl).data('item-name', itemName);
    } else {
        $btn.addClass('d-none');
    }
}

function executeBulkDelete() {
    const $btn = $('#bulk-delete');
    const tableSelector = $btn.data('table-selector') || '#main-table';
    const bulkUrl = $btn.data('bulk-url');
    const itemName = $btn.data('item-name') || 'Item';

    const $checked = $(`${tableSelector} .item-checkbox:checked, ${tableSelector} .row-checkbox:checked`);
    const ids = $checked.map(function () { return $(this).val(); }).get();

    if (ids.length === 0) {
        if (typeof Swal !== 'undefined') {
            Swal.fire('Info', 'Tidak ada item yang dipilih.', 'info');
        } else {
            alert('Tidak ada item yang dipilih.');
        }
        return;
    }

    if (!bulkUrl) {
        console.warn('bulkDeleteUrl is not defined for Datatable bulk delete.');
        return;
    }

    const performDeleteAction = function () {
        $.ajax({
            url: bulkUrl,
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                ids: ids
            },
            success: function (response) {
                if (response.success) {
                    if (typeof Swal !== 'undefined') {
                        Swal.fire('Berhasil!', response.message || `${ids.length} ${itemName} berhasil dihapus.`, 'success');
                    } else {
                        alert(response.message || `${ids.length} ${itemName} berhasil dihapus.`);
                    }
                    $(`${tableSelector} #select-all`).prop('checked', false);
                    if ($.fn.DataTable.isDataTable(tableSelector)) {
                        $(tableSelector).DataTable().ajax.reload(null, false);
                    } else {
                        location.reload();
                    }
                    $btn.addClass('d-none');
                } else {
                    if (typeof Swal !== 'undefined') {
                        Swal.fire('Error!', response.message || 'Gagal menghapus item.', 'error');
                    } else {
                        alert(response.message || 'Gagal menghapus item.');
                    }
                }
            },
            error: function (xhr) {
                const msg = xhr.responseJSON?.message || 'Gagal menghapus item yang dipilih.';
                if (typeof Swal !== 'undefined') {
                    Swal.fire('Error!', msg, 'error');
                } else {
                    alert(msg);
                }
            }
        });
    };

    if (typeof Swal !== 'undefined') {
        Swal.fire({
            title: 'Hapus Item Terpilih?',
            text: `Apakah Anda yakin ingin menghapus ${ids.length} ${itemName} yang dipilih? Tindakan ini tidak dapat dibatalkan!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#5d87ff',
            confirmButtonText: 'Ya, Hapus Semua!',
            cancelButtonText: 'Batal'
        }).then(function (result) {
            if (result.isConfirmed) {
                performDeleteAction();
            }
        });
    } else {
        if (confirm(`Apakah Anda yakin ingin menghapus ${ids.length} ${itemName} yang dipilih?`)) {
            performDeleteAction();
        }
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
