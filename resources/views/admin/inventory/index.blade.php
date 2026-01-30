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
          </tr>
        </thead>
        <tbody class="border-top">
        </tbody>
      </table>
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
        { data: 'quantity', name: 'quantity', className: 'text-end' }
      ],
      order: [[1, 'asc']]
    });

    $('#warehouse-filter').on('change', function() {
      table.ajax.reload();
    });
  });
</script>
@endsection
