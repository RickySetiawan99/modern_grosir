@extends('layouts.master')

@section('title', 'Top-up Verification - ' . config('app.name', 'ModernGrosir'))

@section('pageContent')
<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
    <div class="card-body p-4">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-primary text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">Partners</span>
                    <span class="text-muted fs-2">&bull; Verifikasi Saldo</span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">Top-up Verification</h3>
                <p class="text-muted mb-0 fs-3">Review dan verifikasi permintaan top-up saldo dari akun reseller.</p>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table id="main-table" class="table table-hover align-middle text-nowrap mb-0">
                <thead>
                    <tr class="text-uppercase fs-2 text-muted tracking-wider border-bottom">
                        <th scope="col" class="ps-3 py-3">Date</th>
                        <th scope="col" class="py-3">Reseller</th>
                        <th scope="col" class="py-3">Amount</th>
                        <th scope="col" class="py-3">Proof</th>
                        <th scope="col" class="py-3">Status</th>
                        <th scope="col" class="px-3 py-3 text-center" style="width: 120px;">Action</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Approval Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title text-white" id="reviewModalLabel">Review Top-up Request</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted mb-1">Reseller Details</label>
                            <h5 class="fw-semibold mb-0" id="modal-reseller"></h5>
                            <span class="text-muted small" id="modal-store"></span>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted mb-1">Nominal Top-up</label>
                            <h4 class="text-primary fw-bold" id="modal-amount"></h4>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted mb-1">Submission Date</label>
                            <p class="mb-0" id="modal-date"></p>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted mb-1">Reseller Notes</label>
                            <div class="p-3 bg-light rounded" id="modal-notes" style="font-size: 0.9rem;"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-muted mb-1">Proof of Payment</label>
                        <div class="border rounded overflow-hidden">
                            <a href="#" id="modal-proof-link" target="_blank">
                                <img src="" id="modal-proof-img" class="img-fluid w-100" alt="Proof of Payment" style="max-height: 400px; object-fit: contain;">
                            </a>
                        </div>
                        <p class="text-center text-muted small mt-2">Click image to enlarge</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <div class="ms-auto d-flex gap-2">
                    <form id="reject-form" action="" method="POST">
                        @csrf
                        <button type="button" class="btn btn-outline-danger btn-reject-submit">
                            <i class="ti ti-x"></i> Reject
                        </button>
                    </form>
                    <form id="approve-form" action="" method="POST">
                        @csrf
                        <button type="button" class="btn btn-success btn-approve-submit">
                            <i class="ti ti-check"></i> Approve & Top-up
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    window.topupRoutes = {
        data: '{{ route("master.topups.data") }}'
    };
</script>
<script src="{{ asset('js/admin/topups.js') }}"></script>
@endsection
