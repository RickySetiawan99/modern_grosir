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

<!-- Filter Card -->
<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
    <div class="card-body p-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="fw-bold mb-0 text-dark d-flex align-items-center gap-2">
                <i class="ti ti-filter fs-5 text-primary"></i> Filter Produk
            </h5>
            <button type="button" id="btn-reset-filter" class="btn btn-sm btn-outline-secondary rounded-3 px-3 d-flex align-items-center gap-1">
                <i class="ti ti-rotate"></i> Reset Filter
            </button>
        </div>
        <div class="row align-items-end g-3">
            <div class="col-md-4">
                <label for="category-filter" class="form-label fw-medium text-dark">Kategori Produk</label>
                <select id="category-filter" class="form-select bg-white border global-select2"
                    placeholder="Semua Kategori"
                    link="globalfetch"
                    t="{{ encrypt('categories') }}"
                    s="{{ encrypt('id,name') }}">
                    <option value="all">Semua Kategori</option>
                </select>
            </div>
        </div>
    </div>
</div>

<!-- Table Card -->
<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
  <div class="card-body p-4">
    <div class="bulk-delete-wrapper d-none mb-3 text-end">
        <button id="bulk-delete" class="btn btn-sm btn-danger rounded-3 px-3 shadow-sm" onclick="executeBulkDelete()">
            <i class="ti ti-trash fs-3 me-1"></i> Delete Selected <span class="selected-count"></span>
        </button>
    </div>

    <div class="table-responsive">
      <table id="main-table" class="table text-nowrap align-middle mb-0">
        <thead>
          <tr class="text-muted fw-semibold">
            <th scope="col" class="col-checkbox" style="width: 40px;">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="select-all">
              </div>
            </th>
            <th scope="col" class="col-no text-center" style="width: 50px;">No</th>
            <th scope="col">SKU</th>
            <th scope="col">Product Name</th>
            <th scope="col">Category</th>
            <th scope="col">Unit</th>
            <th scope="col">Retail Price</th>
            <th scope="col" class="text-center" style="width: 140px;">Action</th>
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
        { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center' }
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

    $('#btn-reset-filter').on('click', function() {
      $('#category-filter').val('all').trigger('change');
    });
  });
</script>
@endsection
