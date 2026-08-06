<!DOCTYPE html>
<html>
<head>
    <title>Laporan Analitik - {{ config('app.name', 'ModernGrosir') }}</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .text-right { text-align: right; }
        .summary-box { margin-bottom: 20px; border: 1px solid #eee; padding: 15px; }
        .header { text-align: center; margin-bottom: 30px; }
        .profit-text { font-weight: bold; color: green; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Analitik & Laba Rugi</h2>
        <p>Periode: {{ $startDate }} s/d {{ $endDate }}</p>
    </div>

    <div class="summary-box">
        <strong>Ringkasan Performa:</strong><br>
        Total Pendapatan: Rp {{ number_format($summary->total_revenue, 0, ',', '.') }}<br>
        Total Beban (COGS): Rp {{ number_format($summary->total_cogs, 0, ',', '.') }}<br>
        <strong>Laba Kotor: Rp {{ number_format($summary->total_profit, 0, ',', '.') }}</strong>
    </div>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kode Transaksi</th>
                <th>Pelanggan</th>
                <th class="text-right">Revenue</th>
                <th class="text-right">Profit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $tx)
                @php
                    $txCost = 0;
                    foreach($tx->details as $detail) {
                        $txCost += ($detail->product->purchase_price ?? 0) * $detail->quantity;
                    }
                    $txProfit = $tx->total_amount - $txCost;
                @endphp
                <tr>
                    <td>{{ $tx->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $tx->transaction_code }}</td>
                    <td>{{ $tx->customer->name ?? 'Guest' }}</td>
                    <td class="text-right">Rp {{ number_format($tx->total_amount, 0, ',', '.') }}</td>
                    <td class="text-right">Rp {{ number_format($txProfit, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
