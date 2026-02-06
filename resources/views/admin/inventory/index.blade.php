@extends('layouts.master')

@section('title', 'ModernGrosir - Inventory Stock')

@section('pageContent')
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Inventory Stock</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page">Inventory</li>
          </ol>
        </nav>
      </div>
      <div class="col-3">
        <div class="text-center mb-n5">
          <img src="{{ URL::asset('images/logos/favicon.svg') }}" alt="" class="img-fluid mb-n4" width="80" style="opacity: 0.1;">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mb-4">
  <div class="col-md-4">
    <div class="card mb-0">
      <div class="card-body p-3">
        <label for="warehouse-filter" class="form-label fs-2 fw-semibold text-muted mb-1">Filter by Warehouse</label>
        <select id="warehouse-filter" class="form-select form-select-sm border-0 bg-light">
          <option value="">All Warehouses</option>
          @foreach($warehouses as $warehouse)
            <option value="{{ $warehouse->id }}">{{ $warehouse->name }} ({{ ucfirst($warehouse->type) }})</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h5 class="card-title fw-semibold">Current Stock Levels</h5>
    </div>

    <div class="table-responsive">
      <table id="main-table" class="table text-nowrap align-middle mb-0">
        <thead>
          <tr class="text-muted fw-semibold">
            <th scope="col" style="width: 50px;">No</th>
            <th scope="col">Product</th>
            <th scope="col">Category</th>
            <th scope="col">Warehouse</th>
            <th scope="col">Current Stock</th>
            <th scope="col" class="text-end">Action</th>
          </tr>
        </thead>
        <tbody class="border-top">
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Edit Stock Modal -->
<div class="modal fade" id="modal-edit-stock" tabindex="-1" aria-labelledby="modalEditStockLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header d-flex align-items-center">
        <h5 class="modal-title" id="modalEditStockLabel">Update Stock Level</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="form-edit-stock">
        <div class="modal-body">
          <input type="hidden" id="stock-id">
          <div class="mb-3">
            <label class="form-label text-muted mb-1">Product</label>
            <div id="display-product" class="fw-bold fs-4"></div>
          </div>
          <div class="mb-3">
            <label class="form-label text-muted mb-1">Warehouse</label>
            <div id="display-warehouse" class="text-primary fw-semibold"></div>
          </div>
          <div class="mb-3">
            <label for="input-quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="input-quantity" name="quantity" min="0" required>
            <div class="form-text">Enter the current physical stock quantity in this warehouse.</div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-save-stock">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function() {
    const table = initModernDatatable('#main-table', {
      ajax: {
        url: '{{ route("inventory.data") }}',
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
          _token: '{{ csrf_token() }}',
          quantity: qty
        },
        success: function(response) {
          if (response.success) {
            $('#modal-edit-stock').modal('hide');
            table.ajax.reload(null, false);
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: response.message,
                timer: 2000,
                showConfirmButton: false
            });
          }
        },
        error: function(xhr) {
          Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: xhr.responseJSON.message || 'Something went wrong!'
          });
        },
        complete: function() {
          $btn.prop('disabled', false).text('Save Changes');
        }
      });
    });
  });
</script>
@endsection
