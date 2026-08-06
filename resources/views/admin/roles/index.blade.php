@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Role Management')

@section('pageContent')
<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
    <div class="card-body p-4">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-primary text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">Access Control</span>
                    <span class="text-muted fs-2">&bull; Hak Akses & Izin</span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">Roles & Permissions</h3>
                <p class="text-muted mb-0 fs-3">Atur peran, hak akses modul, dan izin operasional per role.</p>
            </div>
            <div class="d-flex align-items-center gap-2 flex-shrink-0">
                <a href="{{ route('master.roles.create') }}" class="btn btn-primary px-3.5 py-2 rounded-3 d-flex align-items-center gap-2 shadow-sm fw-medium">
                    <i class="ti ti-plus fs-5"></i>
                    <span>Add New Role</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table id="main-table" class="table text-nowrap align-middle mb-0">
        <thead>
          <tr class="text-muted fw-semibold">
            <th scope="col" style="width: 50px;">No</th>
            <th scope="col">Role Name</th>
            <th scope="col">Permissions Count</th>
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
    const table = initModernDatatable('#main-table', {
      ajax: '{{ route("master.roles.data") }}',
      itemName: 'Role',
      columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
        { data: 'name', name: 'name' },
        { data: 'permissions_count', name: 'permissions_count', searchable: false },
        { data: 'action', name: 'action', orderable: false, searchable: false }
      ]
    });
  });
</script>
@endsection
