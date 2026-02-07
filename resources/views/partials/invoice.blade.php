
@php
    // Determine context (Transaction or DraftOrder)
    $isTransaction = $data instanceof \App\Models\Transaction;
    
    // Invoice Number - use consistent format
    if ($isTransaction) {
        $invoiceNumber = $data->transaction_code;
    } else {
        // Use order_code from database, fallback to auto-generated TRX if null
        $invoiceNumber = $data->order_code ?? ('TRX-' . $data->created_at->format('Ymd') . '-' . str_pad($data->id, 4, '0', STR_PAD_LEFT));
    }
    
    $date = $data->created_at->format('d M Y, H:i');
    $status = ucfirst($data->status);
    
    // Status Badge Color
    $statusColor = match($data->status) {
        'completed', 'paid' => 'success',
        'pending' => 'warning',
        'processing' => 'info',
        'cancelled' => 'danger',
        default => 'secondary'
    };

    // Customer Info
    $customerUser = $isTransaction ? $data->customer : $data->reseller;
    $customerName = $customerUser ? $customerUser->name : 'Guest';
    $customerEmail = $customerUser ? $customerUser->email : '-';
    $tierName = null;
    if ($customerUser && $customerUser->reseller && $customerUser->reseller->tier) {
        $tierName = $customerUser->reseller->tier->name;
    }

    // Warehouse & Cashier
    $warehouseName = $data->warehouse ? $data->warehouse->name : 'All Warehouses';
    
    if ($isTransaction && $data->user) {
        $cashierName = $data->user->name;
    } else {
        $cashierName = 'Self Order';
    }

    // Items
    $items = $isTransaction ? $data->details : $data->items;
@endphp

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0">Invoice #{{ $invoiceNumber }}</h4>
                    <span class="badge bg-{{ $statusColor }}-subtle text-{{ $statusColor }} fs-4">
                        {{ $status }}
                    </span>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-4">
                        <p class="text-muted mb-1">Billed To</p>
                        <h6 class="fw-bold">{{ $customerName }}</h6>
                        <p class="text-muted mb-0">{{ $customerEmail }}</p>
                        @if($tierName)
                        <span class="badge bg-primary-subtle text-primary mt-1">{{ $tierName }}</span>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <p class="text-muted mb-1">Transaction Info</p>
                        <p class="mb-1"><strong>Date:</strong> {{ $date }}</p>
                        <p class="mb-1"><strong>Cashier:</strong> {{ $cashierName }}</p>
                        <p class="mb-0"><strong>Warehouse:</strong> {{ $warehouseName }}</p>
                    </div>
                    <div class="col-md-4 text-end">
                       <p class="text-muted mb-1">Total Amount</p>
                       <h2 class="text-primary fw-bold">Rp {{ number_format($data->total_amount, 0, ',', '.') }}</h2>
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
                            @foreach($items as $item)
                                @php
                                    $product = $item->product; 
                                    $name = $product ? $product->name : 'Unknown Product';
                                    $sku = $product ? $product->sku : '-';
                                    $price = $item->unit_price;
                                    $qty = $item->quantity;
                                    $subtotal = $item->subtotal;
                                @endphp
                            <tr>
                                <td>
                                    <h6 class="mb-0">{{ $name }}</h6>
                                    <small class="text-muted">{{ $sku }}</small>
                                </td>
                                <td class="text-end">Rp {{ number_format($price, 0, ',', '.') }}</td>
                                <td class="text-center">{{ $qty }}</td>
                                <td class="text-end fw-bold">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="text-end fw-bold">Grand Total</td>
                                <td class="text-end fw-bold fs-4 text-primary">Rp {{ number_format($data->total_amount, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                @if(!isset($hideButtons))
                <div class="d-flex justify-content-end mt-4 gap-2 no-print">
                    @if($isTransaction)
                        <a href="{{ route('pos.index') }}" class="btn btn-outline-secondary">Back to List</a>
                    @else
                        <a href="{{ route('reseller.orders.index') }}" class="btn btn-outline-secondary">Back to List</a>
                    @endif
                    <button class="btn btn-primary" onclick="window.print()"><i class="ti ti-printer me-2"></i> Print Invoice</button>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>


