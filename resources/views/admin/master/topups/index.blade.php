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

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle text-nowrap">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Reseller</th>
                        <th>Amount</th>
                        <th>Proof</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($topups as $topup)
                    <tr>
                        <td>
                            <h6 class="fw-semibold mb-1">{{ $topup->created_at->format('d M Y') }}</h6>
                            <span class="text-muted" style="font-size: 0.75rem;">{{ $topup->created_at->format('H:i') }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-0">
                                    <h6 class="fw-semibold mb-0 fs-2">{{ $topup->reseller->user->name }}</h6>
                                    <span class="text-muted" style="font-size: 0.7rem;">{{ $topup->reseller->store_name ?? 'No Store Name' }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <h6 class="fw-semibold mb-0">Rp {{ number_format($topup->amount, 0, ',', '.') }}</h6>
                        </td>
                        <td>
                            @if($topup->proof_image)
                            <a href="{{ Storage::url($topup->proof_image) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                <i class="ti ti-photo"></i> View Proof
                            </a>
                            @else
                            <span class="text-muted">No Proof</span>
                            @endif
                        </td>
                        <td>
                            @if($topup->status == 'pending')
                                <span class="badge bg-warning rounded-3 fw-semibold">Pending</span>
                            @elseif($topup->status == 'completed')
                                <span class="badge bg-success rounded-3 fw-semibold">Success</span>
                            @elseif($topup->status == 'failed')
                                <span class="badge bg-danger rounded-3 fw-semibold">Rejected</span>
                            @else
                                <span class="badge bg-secondary rounded-3 fw-semibold">Cancelled</span>
                            @endif
                        </td>
                        <td>
                            @if($topup->status == 'pending')
                            <button type="button" class="btn btn-sm btn-primary btn-review" 
                                data-id="{{ $topup->id }}"
                                data-reseller="{{ $topup->reseller->user->name }}"
                                data-store="{{ $topup->reseller->store_name ?? 'N/A' }}"
                                data-amount="Rp {{ number_format($topup->amount, 0, ',', '.') }}"
                                data-proof="{{ Storage::url($topup->proof_image) }}"
                                data-notes="{{ $topup->notes ?? '-' }}"
                                data-date="{{ $topup->created_at->format('d M Y H:i') }}">
                                <i class="ti ti-eye"></i> Review
                            </button>
                            @else
                            <span class="text-muted">-</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">No top-up requests found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $topups->links() }}
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
<script src="{{ asset('js/admin/topups.js') }}"></script>
@endsection
