@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Warehouses')

@section('pageContent')
<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
    <div class="card-body p-4">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-primary text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">Master Data</span>
                    <span class="text-muted fs-2">&bull; Lokasi Penyimpanan</span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">Manajemen Gudang</h3>
                <p class="text-muted mb-0 fs-3">Atur lokasi gudang penyimpanan untuk distribusi stok barang.</p>
            </div>
            <div class="d-flex align-items-center gap-2 flex-shrink-0">
                <a href="{{ route('master.warehouses.create') }}" class="btn btn-primary px-3.5 py-2 rounded-3 d-flex align-items-center gap-2 shadow-sm fw-medium">
                    <i class="ti ti-plus fs-5"></i>
                    <span>Add New Warehouse</span>
                </a>
            </div>
        </div>
    </div>
</div>

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
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Location</th>
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
    initModernDatatable('#main-table', {
      ajax: '{{ route("master.warehouses.data") }}',
      columns: [
        { data: 'checkbox', name: 'checkbox', orderable: false, searchable: false },
        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
        { data: 'name', name: 'name' },
        { data: 'type', name: 'type' },
        { data: 'location', name: 'location' },
        { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center' }
      ],
      order: [[2, 'asc']], // Order by Name (third column)
      bulkDeleteUrl: '{{ route("master.warehouses.bulk-delete") }}',
      messages: {
        deleteText: 'Gudang/Toko "{name}" akan dihapus permanen!'
      }
    });
  });
</script>
@endsection
