@extends('layouts.master')

@section('title', 'My Wallet - ModernGrosir')

@section('pageContent')
<div class="row">
    <div class="col-lg-4">
        <div class="card bg-primary-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8 text-primary">My Wallet</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item text-primary" aria-current="page">Wallet</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="card text-white bg-primary overflow-hidden shadow-primary mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <i class="ti ti-wallet fs-8"></i>
                    <div class="ms-auto">
                        <span class="badge bg-white text-primary fw-semibold">Active</span>
                    </div>
                </div>
                <div class="mb-2">
                    <span class="fs-4 opacity-75">Your Balance</span>
                    <h2 class="text-white fw-bold mb-0">Rp {{ number_format($reseller->balance, 0, ',', '.') }}</h2>
                </div>
                <div class="pt-3 border-top border-white-50">
                    <div class="d-flex align-items-center">
                        <div>
                            <span class="fs-2 opacity-75">Credit Limit</span>
                            <h6 class="text-white fw-semibold mb-0">Rp {{ number_format($reseller->credit_limit, 0, ',', '.') }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Request Top-up</h5>
                <form action="{{ route('reseller.wallet.topup') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nominal Top-up (Min. Rp 10.000)</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="amount" class="form-control" placeholder="100000" min="10000" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bukti Transfer (Image)</label>
                        <input type="file" name="proof_image" class="form-control" accept="image/*" required>
                        <div class="form-text">Upload foto bukti transfer bank Anda.</div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Catatan (Opsional)</label>
                        <textarea name="notes" class="form-control" rows="2" placeholder="Transfer via BCA a.n Ricky"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit Top-up Request</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Transaction History</h5>
                <div class="table-responsive">
                    <table class="table align-middle text-nowrap mb-0">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Date</h6></th>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Type</h6></th>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Amount</h6></th>
                                <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Status</h6></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transactions as $trx)
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ $trx->created_at->format('d M Y') }}</h6>
                                    <span class="text-muted" style="font-size: 0.75rem;">{{ $trx->created_at->format('H:i') }}</span>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="d-flex align-items-center gap-2">
                                        @if($trx->type == 'deposit')
                                            <span class="badge bg-success-subtle text-success rounded-3 fw-semibold">Top-up</span>
                                        @elseif($trx->type == 'payment')
                                            <span class="badge bg-danger-subtle text-danger rounded-3 fw-semibold">Payment</span>
                                        @else
                                            <span class="badge bg-warning-subtle text-warning rounded-3 fw-semibold">Refund</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="border-bottom-0 text-end">
                                    <h6 class="fw-semibold mb-0 @if($trx->type == 'deposit') text-success @else text-danger @endif">
                                        {{ $trx->type == 'deposit' ? '+' : '-' }} Rp {{ number_format($trx->amount, 0, ',', '.') }}
                                    </h6>
                                </td>
                                <td class="border-bottom-0">
                                    @if($trx->status == 'pending')
                                        <span class="badge bg-warning rounded-3 fw-semibold">Pending</span>
                                    @elseif($trx->status == 'completed')
                                        <span class="badge bg-success rounded-3 fw-semibold">Success</span>
                                    @elseif($trx->status == 'failed')
                                        <span class="badge bg-danger rounded-3 fw-semibold">Failed</span>
                                    @else
                                        <span class="badge bg-secondary rounded-3 fw-semibold">Cancelled</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">No transactions found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
