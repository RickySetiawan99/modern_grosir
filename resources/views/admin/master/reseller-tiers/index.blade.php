@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Reseller Tiers')

@section('pageContent')
<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
    <div class="card-body p-4">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-primary text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">Master Data</span>
                    <span class="text-muted fs-2">&bull; Tingkatan Reseller</span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">Kategori Tiering Reseller</h3>
                <p class="text-muted mb-0 fs-3">Atur level diskon bertingkat untuk Silver, Gold, Platinum, dan kategori khusus.</p>
            </div>
            <div class="d-flex align-items-center gap-2 flex-shrink-0">
                <a href="{{ route('master.reseller-tiers.create') }}" class="btn btn-primary px-3.5 py-2 rounded-3 d-flex align-items-center gap-2 shadow-sm fw-medium">
                    <i class="ti ti-plus fs-5"></i>
                    <span>Add New Tier</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
  <div class="card-body">
        <div class="d-flex align-items-center justify-content-end mb-3">
      <button id="bulk-delete" class="btn btn-sm btn-danger d-none" onclick="executeBulkDelete()">
        <i class="ti ti-trash fs-3 me-2"></i> Delete Selected <span class="selected-count"></span>
      </button>
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
            <th scope="col">Tier Name</th>
            <th scope="col">Discount (%)</th>
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
    initModernDatatable('#main-table', {
      ajax: '{{ route("master.reseller-tiers.data") }}',
      columns: [
        { data: 'checkbox', name: 'checkbox', orderable: false, searchable: false },
        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
        { data: 'name', name: 'name' },
        { data: 'discount_percentage', name: 'discount_percentage' },
        { data: 'action', name: 'action', orderable: false, searchable: false }
      ],
      order: [[2, 'asc']], 
      bulkDeleteUrl: '{{ route("master.reseller-tiers.bulk-delete") }}',
      messages: {
        deleteText: 'Tier Reseller "{name}" akan dihapus permanen!'
      }
    });
  });
</script>
@endsection
