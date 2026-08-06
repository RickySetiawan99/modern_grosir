@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Product Master')

@section('pageContent')
<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
    <div class="card-body p-4">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-primary text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">Master Data</span>
                    <span class="text-muted fs-2">&bull; Manajemen Produk & Inventory</span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">Daftar Produk (Barang)</h3>
                <p class="text-muted mb-0 fs-3">Kelola seluruh data produk, SKU, harga eceran, dan kategori barang dagangan.</p>
            </div>
            <div class="d-flex align-items-center gap-2 flex-shrink-0">
                <a href="{{ route('master.products.create') }}" class="btn btn-primary px-3.5 py-2 rounded-3 d-flex align-items-center gap-2 shadow-sm fw-medium">
                    <i class="ti ti-plus fs-5"></i>
                    <span>Add New Product</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
  <div class="card-body">
    <div class="row align-items-center justify-content-between mb-3 g-2">
      <div class="col-md-6 col-lg-4">
        <div class="d-flex align-items-center gap-2">
          <label for="category-filter" class="form-label fs-2 fw-semibold text-muted mb-0 flex-shrink-0">Filter Kategori:</label>
          <select id="category-filter" class="form-select form-select-sm border select2">
            <option value="all">Semua Kategori</option>
            @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-auto ms-auto">
        <button id="bulk-delete" class="btn btn-sm btn-danger d-none" onclick="executeBulkDelete()">
          <i class="ti ti-trash fs-3 me-2"></i> Delete Selected <span class="selected-count"></span>
        </button>
      </div>
    </div>
    
    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="table-responsive">
      <table id="main-table" class="table text-nowrap align-middle mb-0">
        <thead>
          <tr class="text-muted fw-semibold">
            <th scope="col">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="select-all">
              </div>
            </th>
            <th scope="col">No</th>
            <th scope="col">SKU</th>
            <th scope="col">Product Name</th>
            <th scope="col">Category</th>
            <th scope="col">Unit</th>
            <th scope="col">Retail Price</th>
            <th scope="col" class="text-end">Action</th>
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
    var table = initModernDatatable('#main-table', {
      ajax: {
        url: '{{ route("master.products.data") }}',
        data: function(d) {
          d.category_id = $('#category-filter').val();
        }
      },
      itemName: 'Product',
      columns: [
        { data: 'checkbox', name: 'checkbox', orderable: false, searchable: false },
        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
        { data: 'sku', name: 'sku' },
        { data: 'name', name: 'name' },
        { data: 'category.name', name: 'category.name' },
        { data: 'unit_info', name: 'unit_info' },
        { data: 'retail_price', name: 'retail_price' },
        { data: 'action', name: 'action', orderable: false, searchable: false }
      ],
      order: [[3, 'asc']], // Order by Product Name (fourth column)
      bulkDeleteUrl: '{{ route("master.products.bulk-delete") }}',
      messages: {
        deleteText: 'Produk "{name}" akan dihapus permanen!'
      }
    });

    $('#category-filter').on('change', function() {
      table.ajax.reload();
    });
  });
</script>
@endsection
