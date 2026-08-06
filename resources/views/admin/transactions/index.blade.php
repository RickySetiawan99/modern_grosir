@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Transaction History')

@section('pageContent')
    <!-- Header Banner Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
        <div class="card-body p-4">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <span class="badge bg-primary text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">Audit & POS Record</span>
                        <span class="text-muted fs-2">&bull; Riwayat Transaksi Penjualan</span>
                    </div>
                    <h3 class="fw-bold mb-1 text-dark">Riwayat Transaksi POS & Sales</h3>
                    <p class="text-muted mb-0 fs-3">Pantau arus kas transaksi ritel, kasir yang bertugas, serta status pembayaran pelanggan.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold mb-0 text-dark d-flex align-items-center gap-2">
                    <i class="ti ti-receipt-tax fs-5 text-primary"></i> Daftar Seluruh Transaksi
                </h5>
            </div>

            <div class="table-responsive">
                <table id="transactions-table" class="table table-hover align-middle text-nowrap mb-0">
                    <thead>
                        <tr class="text-uppercase fs-2 text-muted tracking-wider border-bottom">
                            <th scope="col" class="ps-3 py-3" style="width: 50px;">No</th>
                            <th scope="col" class="py-3">Waktu & Tanggal</th>
                            <th scope="col" class="py-3">Kode Transaksi</th>
                            <th scope="col" class="py-3">Kasir / User</th>
                            <th scope="col" class="py-3">Pelanggan</th>
                            <th scope="col" class="py-3">Gudang</th>
                            <th scope="col" class="py-3">Total Transaksi</th>
                            <th scope="col" class="py-3">Status</th>
                            <th scope="col" class="pe-3 py-3 text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                    </tbody>
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
