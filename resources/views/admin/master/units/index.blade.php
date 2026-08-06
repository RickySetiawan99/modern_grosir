@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Units of Measurement')

@section('pageContent')
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Units (Satuan)</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a class="text-muted" href="javascript:void(0)">Master Data</a></li>
            <li class="breadcrumb-item" aria-current="page">Units</li>
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

<div class="card">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h5 class="card-title fw-semibold">Units List</h5>
      <div class="d-flex gap-2">
        <button id="bulk-delete" class="btn btn-sm btn-danger d-none" onclick="executeBulkDelete()">
          <i class="ti ti-trash fs-3 me-2"></i> Delete Selected <span class="selected-count"></span>
        </button>
        <a href="{{ route('master.units.create') }}" class="btn btn-sm btn-primary">
          <i class="ti ti-plus fs-3 me-2"></i> Add New Unit
        </a>
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
            <th scope="col">Full Name</th>
            <th scope="col">Short Name</th>
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
      ajax: '{{ route("master.units.data") }}',
      columns: [
        { data: 'checkbox', name: 'checkbox', orderable: false, searchable: false },
        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
        { data: 'name', name: 'name' },
        { data: 'short_name', name: 'short_name' },
        { data: 'action', name: 'action', orderable: false, searchable: false }
      ],
      order: [[2, 'asc']], // Order by Full Name (third column)
      bulkDeleteUrl: '{{ route("master.units.bulk-delete") }}',
      messages: {
        deleteText: 'Satuan "{name}" akan dihapus permanen!'
      }
    });
  });
</script>
@endsection
