@extends('layouts.master')

@section('title', 'My Orders')

@section('pageContent')
<div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">My Orders</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Orders</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ URL::asset('build/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Warehouse</th>
                            <th>Items</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td><strong>#{{ $order->id }}</strong></td>
                            <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                            <td>
                                @if($order->warehouse)
                                    <span class="badge bg-light-info text-info">{{ $order->warehouse->name }}</span>
                                @else
                                    <span class="text-muted">Not specified</span>
                                @endif
                            </td>
                            <td>{{ $order->items->count() }} items</td>
                            <td><strong>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</strong></td>
                            <td>
                                @if($order->status === 'pending')
                                    <span class="badge bg-warning-subtle text-warning">Pending</span>
                                @elseif($order->status === 'processing')
                                    <span class="badge bg-info-subtle text-info">Processing</span>
                                @elseif($order->status === 'completed')
                                    <span class="badge bg-success-subtle text-success">Completed</span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger">Cancelled</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('reseller.orders.show', $order->id) }}" class="btn btn-sm btn-primary">
                                    <i class="ti ti-eye"></i> View
                                </a>
                                @if($order->status === 'pending')
                                <button class="btn btn-sm btn-danger" onclick="cancelOrder({{ $order->id }})">
                                    <i class="ti ti-x"></i> Cancel
                                </button>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-5">
                                <i class="ti ti-inbox fs-8 d-block mb-3"></i>
                                No orders yet. <a href="{{ route('reseller.catalog.index') }}">Start shopping!</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $orders->links() }}
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    window.csrfToken = '{{ csrf_token() }}';
</script>
<script src="{{ asset('js/reseller/orders.js') }}"></script>
@endsection
