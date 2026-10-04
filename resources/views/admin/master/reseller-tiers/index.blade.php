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
                <button type="button" class="btn btn-outline-primary px-3.5 py-2 rounded-3 d-flex align-items-center gap-2 shadow-sm fw-medium" data-bs-toggle="modal" data-bs-target="#evaluateModal">
                    <i class="ti ti-refresh fs-5"></i>
                    <span>Evaluasi Bulanan</span>
                </button>
                <a href="{{ route('master.reseller-tiers.create') }}" class="btn btn-primary px-3.5 py-2 rounded-3 d-flex align-items-center gap-2 shadow-sm fw-medium">
                    <i class="ti ti-plus fs-5"></i>
                    <span>Add New Tier</span>
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
            <th scope="col">Tier Name</th>
            <th scope="col">Discount (%)</th>
            <th scope="col">Min Spend Bulanan</th>
            <th scope="col" class="text-center" style="width: 140px;">Action</th>
          </tr>
        </thead>
        <tbody class="border-top">
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="evaluateModal" tabindex="-1" aria-labelledby="evaluateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="{{ route('master.reseller-tiers.evaluate') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="evaluateModalLabel">Evaluasi Tiering Reseller</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="text-muted fs-3 mb-3">Sistem akan menghitung total pembelanjaan setiap reseller pada periode yang dipilih dan menyesuaikan tingkatan (upgrade / downgrade) secara otomatis.</p>
          <div class="mb-3">
            <label for="period" class="form-label fw-semibold">Periode Bulan</label>
            <input type="month" class="form-control" id="period" name="period" value="{{ now()->subMonth()->format('Y-m') }}" required>
            <div class="form-text">Secara default mengevaluasi performa bulan lalu.</div>
          </div>
          <div class="mb-3 form-check form-switch">
            <input class="form-check-input" type="checkbox" id="dry_run" name="dry_run" value="1">
            <label class="form-check-label fw-semibold" for="dry_run">Mode Simulasi (Dry Run)</label>
            <div class="form-text">Centang opsi ini jika hanya ingin melihat hasil tanpa mengubah tier reseller di database.</div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">
            <i class="ti ti-player-play"></i>
            <span>Jalankan Evaluasi</span>
          </button>
        </div>
      </form>
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
        { data: 'min_monthly_spend', name: 'min_monthly_spend' },
        { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center' }
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
