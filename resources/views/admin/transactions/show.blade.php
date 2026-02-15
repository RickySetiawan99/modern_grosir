@extends('layouts.master')

@section('title', 'Transaction Detail - ' . $transaction->transaction_code)

@section('pageContent')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0">Invoice #{{ $transaction->transaction_code }}</h4>
                    <span class="badge bg-{{ $transaction->status == 'completed' ? 'success' : 'warning' }}-subtle text-{{ $transaction->status == 'completed' ? 'success' : 'warning' }} fs-4">
                        {{ ucfirst($transaction->status) }}
                    </span>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-4">
                        <p class="text-muted mb-1">Billed To</p>
                        <h6 class="fw-bold">{{ $transaction->customer ? $transaction->customer->name : 'Retail Guest' }}</h6>
                        @if($transaction->customer)
                            <p class="text-muted mb-0">{{ $transaction->customer->email }}</p>
                            @if($transaction->customer->reseller)
                            <span class="badge bg-primary-subtle text-primary mt-1">{{ $transaction->customer->reseller->tier->name }}</span>
                            @endif
                        @endif
                    </div>
                    <div class="col-md-4">
                        <p class="text-muted mb-1">Transaction Info</p>
                        <p class="mb-1"><strong>Date:</strong> {{ $transaction->created_at->format('d M Y, H:i') }}</p>
                        <p class="mb-1"><strong>Cashier:</strong> {{ $transaction->user->name }}</p>
                        <p class="mb-1"><strong>Warehouse:</strong> {{ $transaction->warehouse->name }}</p>
                        <p class="mb-0"><strong>Payment Method:</strong> 
                            <span class="badge bg-{{ $transaction->payment_method == 'wallet' ? 'primary' : 'secondary' }}-subtle text-{{ $transaction->payment_method == 'wallet' ? 'primary' : 'secondary' }}">
                                {{ ucfirst($transaction->payment_method) }}
                            </span>
                        </p>
                    </div>
                    <div class="col-md-4 text-end">
                       <p class="text-muted mb-1">Total Amount</p>
                       <h2 class="text-primary fw-bold">Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</h2>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th>Product</th>
                                <th class="text-end">Unit Price</th>
                                <th class="text-center">Qty</th>
                                <th class="text-end">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaction->details as $detail)
                            <tr>
                                <td>
                                    <h6 class="mb-0">{{ $detail->product->name }}</h6>
                                    <small class="text-muted">{{ $detail->product->sku }}</small>
                                </td>
                                <td class="text-end">Rp {{ number_format($detail->unit_price, 0, ',', '.') }}</td>
                                <td class="text-center">{{ $detail->quantity }}</td>
                                <td class="text-end fw-bold">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="text-end fw-bold">Grand Total</td>
                                <td class="text-end fw-bold fs-4 text-primary">Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end mt-4 gap-2">
                    <a href="{{ route('transactions.index') }}" class="btn btn-outline-secondary">Back to List</a>
                    <button class="btn btn-primary" onclick="window.print()"><i class="ti ti-printer me-2"></i> Print Invoice</button>
                    
                    @if($transaction->status == 'completed')
                    <form id="cancel-form" action="{{ route('transactions.cancel', $transaction->id) }}" method="POST">
                        @csrf
                        <button type="button" class="btn btn-danger btn-cancel-trx">
                            <i class="ti ti-trash me-2"></i> Cancel Transaction
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
<script>
    $(document).ready(function() {
        $('.btn-cancel-trx').on('click', function() {
            Swal.fire({
                title: "Cancel Transaction?",
                text: "Stock akan dikembalikan, dan dana reseller akan di-refund jika membayar via Wallet.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Cancel & Refund!",
                cancelButtonText: "No, Keep it",
                confirmButtonColor: "#fa896b",
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#cancel-form').submit();
                }
            });
        });
    });
</script>
@endsection
@endsection
