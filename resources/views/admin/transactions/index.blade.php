@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Transaction History')

@section('pageContent')
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Transaction History</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page">Transactions</li>
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

<div class="card w-100 position-relative overflow-hidden">
  <div class="card-body p-4">
    <div class="table-responsive rounded-2 mb-4">
      <table id="transactions-table" class="table border text-nowrap customize-table mb-0 align-middle">
        <thead class="text-dark fs-4">
          <tr>
            <th>No</th>
            <th>Date</th>
            <th>Code</th>
            <th>Cashier</th>
            <th>Customer</th>
            <th>Warehouse</th>
            <th>Total</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function() {
    $('#transactions-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('transactions.data') }}",
      columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
        { data: 'created_at', name: 'created_at' },
        { data: 'transaction_code', name: 'transaction_code' },
        { data: 'user_name', name: 'user.name' },
        { data: 'customer_name', name: 'customer.name' },
        { data: 'warehouse.name', name: 'warehouse.name' },
        { data: 'total_amount', name: 'total_amount' },
        { data: 'status', name: 'status' },
        { data: 'action', name: 'action', orderable: false, searchable: false },
      ],
      order: [[1, 'desc']] // Sort by Date Descending
    });
  });
</script>
@endsection
