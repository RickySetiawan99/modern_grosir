@extends('layouts.master')

@section('title', 'ModernGrosir - Resellers')

@section('pageContent')
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Resellers</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a class="text-muted" href="javascript:void(0)">Master Data</a></li>
            <li class="breadcrumb-item" aria-current="page">Resellers</li>
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
      <h5 class="card-title fw-semibold">Resellers List</h5>
      <div class="d-flex gap-2">
        <button id="bulk-delete" class="btn btn-sm btn-danger d-none" onclick="executeBulkDelete()">
          <i class="ti ti-trash fs-3 me-2"></i> Delete Selected <span class="selected-count"></span>
        </button>
        <a href="{{ route('master.resellers.create') }}" class="btn btn-sm btn-primary">
          <i class="ti ti-plus fs-3 me-2"></i> Add New Reseller
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
            <th scope="col">Reseller Name</th>
            <th scope="col">Tier</th>
            <th scope="col">Credit Limit</th>
            <th scope="col">Balance</th>
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

<!-- Balance Modal -->
<div class="modal fade" id="modal-balance" tabindex="-1" aria-labelledby="modalBalanceLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header d-flex align-items-center">
        <h5 class="modal-title" id="modalBalanceLabel">Manage Balance</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="form-balance">
        <div class="modal-body">
          <input type="hidden" id="balance-reseller-id">
          
          <div class="d-flex align-items-center mb-4">
            <div class="bg-light rounded p-3 w-100">
              <span class="d-block text-muted mb-1">Current Balance</span>
              <h4 class="mb-0 fw-bold text-primary" id="display-balance">Rp 0</h4>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 mb-3">
              <label class="form-label">Action Type</label>
              <div class="d-flex gap-3">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="type" id="type-add" value="add" checked>
                  <label class="form-check-label" for="type-add">Top Up (Add)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="type" id="type-subtract" value="subtract">
                  <label class="form-check-label" for="type-subtract">Deduct (Subtract)</label>
                </div>
              </div>
            </div>
            
            <div class="col-md-12 mb-3">
              <label for="amount" class="form-label">Amount (IDR)</label>
              <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="number" class="form-control" id="amount" name="amount" min="1" required>
              </div>
            </div>

            <div class="col-md-12 mb-3">
              <label for="notes" class="form-label">Notes (Optional)</label>
              <textarea class="form-control" id="notes" name="notes" rows="2" placeholder="Reason for adjustment..."></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-save-balance">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

@section('scripts')
<script>
    window.csrfToken = '{{ csrf_token() }}';
    window.resellerRoutes = {
        data: '{{ route("master.resellers.data") }}',
        bulkDelete: '{{ route("master.resellers.bulk-delete") }}'
    };
</script>
<script src="{{ asset('js/admin/resellers.js') }}"></script>
@endsection
