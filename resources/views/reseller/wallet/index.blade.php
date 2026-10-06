@extends('layouts.master')

@section('title', 'Dompet & Saldo - ' . config('app.name', 'ModernGrosir'))

@php
    $midtransClientKey = \App\Services\MidtransService::getClientKey();
    $isProduction = \App\Services\MidtransService::isProduction();
    $snapUrl = $isProduction ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js';
@endphp

@section('pageContent')
<!-- Breadcrumb Header -->
<div class="card bg-primary-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8 text-primary">Dompet & Saldo Mitra</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item text-primary" aria-current="page">Dompet & Saldo</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Left Column: Balance Summary & Topup Form -->
    <div class="col-lg-5">
        <!-- Balance Overview Card -->
        <div class="card text-white border-0 shadow-sm rounded-3 mb-4 wallet-balance-card">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <span class="fs-2 text-white-50 text-uppercase tracking-wider fw-semibold">Saldo Tersedia</span>
                    <i class="ti ti-wallet fs-6 text-white-50"></i>
                </div>
                <h2 class="text-white fw-bold mb-3 display-6" id="reseller-balance-display">
                    Rp {{ number_format($reseller->balance, 0, ',', '.') }}
                </h2>
                <div class="pt-3 mt-3 border-top border-white border-opacity-25">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="fs-2 text-white-50 d-block mb-1">Limit Kredit</span>
                            <h6 class="text-white fw-semibold mb-0 fs-3">Rp {{ number_format($reseller->credit_limit, 0, ',', '.') }}</h6>
                        </div>
                        <div class="text-end">
                            <span class="fs-2 text-white-50 d-block mb-1">Poin Loyalitas</span>
                            <h6 class="text-white fw-semibold mb-0 fs-3">{{ number_format($reseller->loyalty_points ?? 0, 0, ',', '.') }} Pts</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top-up Methods Card -->
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <h5 class="fw-bold text-dark mb-3 fs-4">Isi Ulang Saldo</h5>

                <!-- Segmented Tabs -->
                <ul class="nav nav-pills nav-fill bg-light p-1 rounded-2 mb-4" id="topupTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active fw-medium py-2 px-3 fs-3 d-flex align-items-center justify-content-center gap-2 rounded-2" id="tab-snap-btn" data-bs-toggle="pill" data-bs-target="#tab-snap" type="button" role="tab">
                            <i class="ti ti-credit-card fs-4"></i>
                            <span>Otomatis (Midtrans)</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-medium py-2 px-3 fs-3 d-flex align-items-center justify-content-center gap-2 rounded-2" id="tab-manual-btn" data-bs-toggle="pill" data-bs-target="#tab-manual" type="button" role="tab">
                            <i class="ti ti-building-bank fs-4"></i>
                            <span>Transfer Bank</span>
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="topupTabsContent">
                    <!-- Tab 1: Midtrans Instant Snap -->
                    <div class="tab-pane fade show active" id="tab-snap" role="tabpanel">
                        <div class="mb-3">
                            <label class="form-label text-muted fs-2 text-uppercase fw-semibold tracking-wider mb-2">Pilihan Nominal Cepat</label>
                            <div class="row g-2">
                                <div class="col-6 col-sm-4">
                                    <button type="button" class="btn btn-outline-primary w-100 py-2 px-2 fs-3 fw-semibold quick-chip rounded-2" data-amount="50000">Rp 50rb</button>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <button type="button" class="btn btn-outline-primary w-100 py-2 px-2 fs-3 fw-semibold quick-chip rounded-2" data-amount="100000">Rp 100rb</button>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <button type="button" class="btn btn-outline-primary w-100 py-2 px-2 fs-3 fw-semibold quick-chip rounded-2" data-amount="250000">Rp 250rb</button>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <button type="button" class="btn btn-outline-primary w-100 py-2 px-2 fs-3 fw-semibold quick-chip rounded-2" data-amount="500000">Rp 500rb</button>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <button type="button" class="btn btn-outline-primary w-100 py-2 px-2 fs-3 fw-semibold quick-chip rounded-2" data-amount="1000000">Rp 1 jt</button>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <button type="button" class="btn btn-outline-primary w-100 py-2 px-2 fs-3 fw-semibold quick-chip rounded-2" data-amount="2500000">Rp 2,5 jt</button>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="midtrans-amount" class="form-label text-dark fw-semibold fs-3 mb-1">Nominal Top-up</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted fw-bold fs-4 px-3">Rp</span>
                                <input type="number" id="midtrans-amount" class="form-control fs-4 fw-semibold py-2 px-3" placeholder="100.000" min="10000" step="1000">
                            </div>
                            <span class="fs-2 text-muted mt-1 d-block">Minimal pengisian saldo: Rp 10.000</span>
                        </div>

                        <!-- Channel info box -->
                        <div class="p-3 bg-light rounded-2 border mb-4">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <i class="ti ti-shield-check text-success fs-4"></i>
                                <span class="fs-2 text-dark fw-semibold">Proses Otomatis & Terenkripsi</span>
                            </div>
                            <p class="fs-2 text-muted mb-0 lh-sm">
                                Mendukung QRIS (GoPay, OVO, Dana, ShopeePay), Virtual Account BCA/Mandiri/BRI/BNI, dan Kartu Kredit.
                            </p>
                        </div>

                        <button type="button" id="btn-midtrans-pay" class="btn btn-primary w-100 py-2 px-4 fs-3 fw-semibold rounded-2 d-flex align-items-center justify-content-center gap-2" style="min-height: 48px;">
                            <i class="ti ti-shield-lock fs-4"></i>
                            <span id="btn-pay-text">Lanjut Pembayaran via Midtrans</span>
                            <span id="btn-pay-spinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
                        </button>
                    </div>

                    <!-- Tab 2: Manual Bank Transfer -->
                    <div class="tab-pane fade" id="tab-manual" role="tabpanel">
                        <div class="p-3 bg-light rounded-2 border mb-3">
                            <span class="fs-2 text-muted text-uppercase fw-semibold tracking-wider d-block mb-1">Rekening Tujuan Verifikasi:</span>
                            <h6 class="fw-bold text-dark mb-0 fs-3">BCA: 883-091-2331</h6>
                            <span class="fs-2 text-muted">a.n PT Modern Grosir Indonesia</span>
                        </div>

                        <form id="form-manual-topup" action="{{ route('reseller.wallet.topup') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="manual-amount" class="form-label text-dark fw-semibold fs-3 mb-1">Nominal Ditransfer</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted fw-bold fs-4 px-3">Rp</span>
                                    <input type="number" name="amount" id="manual-amount" class="form-control fs-4 fw-semibold py-2 px-3" placeholder="100.000" min="10000" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="manual-proof" class="form-label text-dark fw-semibold fs-3 mb-1">Unggah Bukti Transfer</label>
                                <input type="file" name="proof_image" id="manual-proof" class="form-control py-2 px-3" accept="image/jpeg,image/png,image/webp" required>
                                <span class="fs-2 text-muted mt-1 d-block">Format: JPG, PNG (Maks. 2 MB)</span>
                            </div>
                            <div class="mb-4">
                                <label for="manual-notes" class="form-label text-dark fw-semibold fs-3 mb-1">Catatan Tambahan (Opsional)</label>
                                <textarea name="notes" id="manual-notes" class="form-control p-3" rows="2" placeholder="Nama pemilik rekening pengirim..."></textarea>
                            </div>
                            <button type="submit" id="btn-manual-submit" class="btn btn-primary w-100 py-2 px-4 fs-3 fw-semibold rounded-2 d-flex align-items-center justify-content-center gap-2" style="min-height: 48px;">
                                <i class="ti ti-upload fs-4"></i>
                                <span>Kirim Bukti Pembayaran</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column: Transaction History -->
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
                    <div>
                        <h5 class="fw-bold text-dark mb-1 fs-4">Riwayat Mutasi Saldo</h5>
                        <p class="text-muted fs-2 mb-0">Catatan transaksi keluar-masuk saldo dompet Anda.</p>
                    </div>
                    <span class="badge bg-light text-muted border px-3 py-2 fs-2 rounded-2">
                        Total {{ $transactions->total() }} Mutasi
                    </span>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr class="text-muted fs-2 text-uppercase tracking-wider border-bottom">
                                <th scope="col" class="py-3 px-3">Tanggal</th>
                                <th scope="col" class="py-3 px-3">Keterangan</th>
                                <th scope="col" class="py-3 px-3 text-end">Jumlah</th>
                                <th scope="col" class="py-3 px-3 text-center" style="width: 120px;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transactions as $trx)
                            <tr class="border-bottom">
                                <td class="py-3 px-3">
                                    <span class="fw-semibold text-dark fs-3 d-block">{{ $trx->created_at->format('d M Y') }}</span>
                                    <span class="text-muted fs-2">{{ $trx->created_at->format('H:i') }} WIB</span>
                                </td>
                                <td class="py-3 px-3">
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        @if($trx->type === 'topup')
                                            <span class="badge bg-primary-subtle text-primary fw-semibold fs-1 rounded-1 px-2 py-1">
                                                Midtrans Snap
                                            </span>
                                        @elseif($trx->type === 'deposit')
                                            <span class="badge bg-light text-dark border fw-semibold fs-1 rounded-1 px-2 py-1">
                                                Transfer Manual
                                            </span>
                                        @elseif($trx->type === 'payment')
                                            <span class="badge bg-danger-subtle text-danger fw-semibold fs-1 rounded-1 px-2 py-1">
                                                Pembayaran Order
                                            </span>
                                        @else
                                            <span class="badge bg-warning-subtle text-warning fw-semibold fs-1 rounded-1 px-2 py-1">
                                                Pengembalian Dana
                                            </span>
                                        @endif
                                    </div>
                                    <span class="text-muted text-truncate fs-2 d-block" style="max-width: 240px;" title="{{ $trx->notes }}">
                                        {{ $trx->notes ?: '-' }}
                                    </span>
                                </td>
                                <td class="py-3 px-3 text-end">
                                    @php
                                        $isCredit = in_array($trx->type, ['deposit', 'topup', 'refund']);
                                    @endphp
                                    <span class="fw-bold fs-3 {{ $isCredit ? 'text-success' : 'text-danger' }}">
                                        {{ $isCredit ? '+' : '-' }} Rp {{ number_format($trx->amount, 0, ',', '.') }}
                                    </span>
                                </td>
                                <td class="py-3 px-3 text-center">
                                    @if($trx->status === 'pending')
                                        <span class="badge bg-warning-subtle text-warning fw-semibold fs-2 rounded-2 px-2 py-1">Menunggu</span>
                                    @elseif($trx->status === 'completed')
                                        <span class="badge bg-success-subtle text-success fw-semibold fs-2 rounded-2 px-2 py-1">Berhasil</span>
                                    @elseif($trx->status === 'failed')
                                        <span class="badge bg-danger-subtle text-danger fw-semibold fs-2 rounded-2 px-2 py-1">Gagal</span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary fw-semibold fs-2 rounded-2 px-2 py-1">Dibatalkan</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <div class="py-4">
                                        <i class="ti ti-receipt-off fs-8 text-muted opacity-50 mb-2 d-block"></i>
                                        <h6 class="fw-semibold text-dark fs-3 mb-1">Belum Ada Mutasi Saldo</h6>
                                        <p class="text-muted fs-2 mb-0">Isi ulang saldo akun Anda melalui form di samping untuk mulai berbelanja grosir.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($transactions->hasPages())
                <div class="mt-4 pt-3 border-top">
                    {{ $transactions->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@if(!empty($midtransClientKey))
    <script src="{{ $snapUrl }}" data-client-key="{{ $midtransClientKey }}"></script>
@endif

<script>
$(document).ready(function() {
    function formatCurrency(num) {
        return 'Rp ' + (num || 0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function updatePayButtonText(val) {
        if (val && val >= 10000) {
            $('#btn-pay-text').text('Bayar ' + formatCurrency(val) + ' via Midtrans');
        } else {
            $('#btn-pay-text').text('Lanjut Pembayaran via Midtrans');
        }
    }

    // Quick chips selection
    $('.quick-chip').on('click', function() {
        var amount = parseInt($(this).data('amount'), 10);
        $('#midtrans-amount').val(amount);
        $('.quick-chip').removeClass('btn-primary active text-white').addClass('btn-outline-primary');
        $(this).removeClass('btn-outline-primary').addClass('btn-primary active text-white');
        updatePayButtonText(amount);
    });

    $('#midtrans-amount').on('input', function() {
        var val = parseInt($(this).val(), 10) || 0;
        $('.quick-chip').each(function() {
            if ($(this).data('amount') === val) {
                $(this).removeClass('btn-outline-primary').addClass('btn-primary active text-white');
            } else {
                $(this).removeClass('btn-primary active text-white').addClass('btn-outline-primary');
            }
        });
        updatePayButtonText(val);
    });

    // Client-side pre-flight file validation (Mandatory rule 7)
    $('#form-manual-topup').on('submit', function(e) {
        var fileInput = document.getElementById('manual-proof');
        if (fileInput && fileInput.files && fileInput.files[0]) {
            var maxBytes = 2 * 1024 * 1024; // 2MB
            if (fileInput.files[0].size > maxBytes) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Ukuran Berkas Terlalu Besar',
                    text: 'Ukuran foto bukti transfer maksimal 2 MB. Silakan pilih berkas yang lebih kecil.',
                    confirmButtonText: 'Mengerti'
                });
                return false;
            }
        }
    });

    // Handle Midtrans Snap Payment
    $('#btn-midtrans-pay').on('click', function() {
        var amount = parseInt($('#midtrans-amount').val(), 10);

        if (!amount || isNaN(amount) || amount < 10000) {
            Swal.fire({
                icon: 'warning',
                title: 'Nominal Kurang',
                text: 'Nominal pengisian saldo minimal adalah Rp 10.000.',
                confirmButtonText: 'Mengerti'
            });
            return;
        }

        if (typeof window.snap === 'undefined') {
            Swal.fire({
                icon: 'error',
                title: 'Layanan Pembayaran Belum Siap',
                text: 'Koneksi payment gateway Midtrans belum aktif. Hubungi administrator.',
                confirmButtonText: 'Tutup'
            });
            return;
        }

        var $btn = $('#btn-midtrans-pay');
        var $btnText = $('#btn-pay-text');
        var $spinner = $('#btn-pay-spinner');

        $btn.prop('disabled', true);
        $btnText.text('Menyiapkan sesi pembayaran...');
        $spinner.removeClass('d-none');

        $.ajax({
            url: "{{ route('reseller.wallet.midtrans.snap') }}",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                amount: amount
            },
            success: function(response) {
                $btn.prop('disabled', false);
                updatePayButtonText(amount);
                $spinner.addClass('d-none');

                if (response.success && response.snap_token) {
                    window.snap.pay(response.snap_token, {
                        onSuccess: function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'Pembayaran Berhasil',
                                text: 'Saldo dompet Anda telah diperbarui.',
                                timer: 1800,
                                showConfirmButton: false
                            }).then(function() {
                                window.location.reload();
                            });
                        },
                        onPending: function() {
                            Swal.fire({
                                icon: 'info',
                                title: 'Instruksi Pembayaran Diterbitkan',
                                text: 'Silakan selesaikan pembayaran sesuai panduan sebelum batas waktu berakhir.',
                                confirmButtonText: 'Mengerti'
                            }).then(function() {
                                window.location.reload();
                            });
                        },
                        onError: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Transaksi Gagal',
                                text: 'Gagal memproses pembayaran. Silakan coba kembali.',
                                confirmButtonText: 'Tutup'
                            });
                        },
                        onClose: function() {
                            if (response.order_id) {
                                var checkUrl = "{{ route('reseller.wallet.status', ['orderId' => ':orderId']) }}".replace(':orderId', response.order_id);
                                $.get(checkUrl, function(statusRes) {
                                    if (statusRes.status === 'completed') {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Pembayaran Selesai',
                                            text: 'Saldo dompet Anda telah bertambah.',
                                            timer: 1500,
                                            showConfirmButton: false
                                        }).then(function() {
                                            window.location.reload();
                                        });
                                    }
                                });
                            }
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: response.message || 'Gagal memulai sesi pembayaran.',
                        confirmButtonText: 'Tutup'
                    });
                }
            },
            error: function(xhr) {
                $btn.prop('disabled', false);
                updatePayButtonText(amount);
                $spinner.addClass('d-none');

                var errorMsg = 'Gagal memproses permintaan top-up.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                }
                Swal.fire({
                    icon: 'error',
                    title: 'Kesalahan Sistem',
                    text: errorMsg,
                    confirmButtonText: 'Tutup'
                });
            }
        });
    });
});
</script>
@endsection
