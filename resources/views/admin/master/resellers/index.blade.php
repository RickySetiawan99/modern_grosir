@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Resellers')

@section('pageContent')
<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
    <div class="card-body p-4">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-primary text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">Partners</span>
                    <span class="text-muted fs-2">&bull; Akun Mitra Reseller</span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">Reseller Accounts</h3>
                <p class="text-muted mb-0 fs-3">Kelola data reseller, saldo deposit, dan tiering level mitra.</p>
            </div>
            <div class="d-flex align-items-center gap-2 flex-shrink-0">
                <a href="{{ route('master.resellers.create') }}" class="btn btn-primary px-3.5 py-2 rounded-3 d-flex align-items-center gap-2 shadow-sm fw-medium">
                    <i class="ti ti-plus fs-5"></i>
                    <span>Add New Reseller</span>
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
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
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
