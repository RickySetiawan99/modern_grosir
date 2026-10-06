@extends('layouts.master')

@section('title', 'Top-up Verification - ' . config('app.name', 'ModernGrosir'))

@section('pageContent')
<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
    <div class="card-body p-4">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <h3 class="fw-bold mb-1 text-dark">Top-up Verification</h3>
                <p class="text-muted mb-0 fs-3">Review dan verifikasi permintaan top-up saldo dari akun reseller serta transaksi otomatis Midtrans.</p>
            </div>
            <div>
                <button type="button" class="btn btn-primary d-inline-flex align-items-center gap-2 rounded-2 px-3 py-2 shadow-none" data-bs-toggle="modal" data-bs-target="#midtransConfigModal">
                    <i class="ti ti-settings fs-4"></i>
                    <span>Pengaturan Midtrans</span>
                </button>
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

<!-- Midtrans Configuration Modal -->
<div class="modal fade" id="midtransConfigModal" tabindex="-1" aria-labelledby="midtransConfigModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-primary text-white px-4 py-3">
                <div class="d-flex align-items-center gap-2">
                    <i class="ti ti-brand-mastercard fs-5"></i>
                    <h5 class="modal-title text-white fw-bold mb-0" id="midtransConfigModalLabel">Pengaturan Payment Gateway Midtrans</h5>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-midtrans-settings" action="{{ route('master.topups.settings.update') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="alert alert-info border-0 rounded-3 mb-4 d-flex align-items-center gap-2">
                        <i class="ti ti-info-circle fs-5 flex-shrink-0"></i>
                        <span class="fs-2">Konfigurasi ini tersimpan langsung di database dan menggantikan konfigurasi <code>.env</code> tanpa perlu restart server atau edit berkas sistem.</span>
                    </div>

                    <!-- Environment Mode Selection -->
                    <div class="mb-4">
                        <label class="form-label text-dark fw-bold fs-3 mb-2">Mode Lingkungan (Environment)</label>
                        <div class="d-flex flex-wrap gap-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_production" id="env_sandbox" value="0" {{ empty($midtransConfig['is_production']) ? 'checked' : '' }}>
                                <label class="form-check-label fw-semibold fs-3 text-dark" for="env_sandbox">
                                    <span class="badge bg-warning text-dark px-2 py-1 rounded-1 me-1">Sandbox</span> Mode Simulasi / Testing
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_production" id="env_production" value="1" {{ !empty($midtransConfig['is_production']) ? 'checked' : '' }}>
                                <label class="form-check-label fw-semibold fs-3 text-dark" for="env_production">
                                    <span class="badge bg-success text-white px-2 py-1 rounded-1 me-1">Production</span> Mode Live / Transaksi Nyata
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <!-- Server Key -->
                        <div class="col-12">
                            <label for="cfg_server_key" class="form-label text-dark fw-semibold fs-3 mb-1">
                                Server Key <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="password" name="server_key" id="cfg_server_key" class="form-control fs-3 py-2 px-3" value="{{ $midtransConfig['server_key'] }}" placeholder="SB-Mid-server-..." required>
                                <button type="button" class="btn btn-outline-secondary px-3" id="toggle-server-key-visibility" title="Lihat Server Key">
                                    <i class="ti ti-eye fs-4" id="eye-icon"></i>
                                </button>
                            </div>
                            <span class="fs-2 text-muted mt-1 d-block">Dapatkan Server Key dari menu Midtrans Dashboard &gt; Settings &gt; Access Keys.</span>
                        </div>

                        <!-- Client Key -->
                        <div class="col-md-6">
                            <label for="cfg_client_key" class="form-label text-dark fw-semibold fs-3 mb-1">
                                Client Key <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="client_key" id="cfg_client_key" class="form-control fs-3 py-2 px-3" value="{{ $midtransConfig['client_key'] }}" placeholder="SB-Mid-client-..." required>
                            <span class="fs-2 text-muted mt-1 d-block">Client Key digunakan pada antarmuka frontend Snap popup.</span>
                        </div>

                        <!-- Merchant ID -->
                        <div class="col-md-6">
                            <label for="cfg_merchant_id" class="form-label text-dark fw-semibold fs-3 mb-1">
                                Merchant ID <span class="text-muted fw-normal fs-2">(Opsional)</span>
                            </label>
                            <input type="text" name="merchant_id" id="cfg_merchant_id" class="form-control fs-3 py-2 px-3" value="{{ $midtransConfig['merchant_id'] }}" placeholder="G123456789">
                            <span class="fs-2 text-muted mt-1 d-block">ID Merchant dari profil akun Midtrans Anda.</span>
                        </div>

                        <!-- Webhook URL Guide -->
                        <div class="col-12 mt-3">
                            <label class="form-label text-dark fw-semibold fs-3 mb-1">URL Notifikasi Webhook (Payment Notification URL)</label>
                            <div class="input-group">
                                <input type="text" readonly id="cfg_webhook_url" class="form-control bg-light fs-3 py-2 px-3 text-muted" value="{{ $webhookUrl }}">
                                <button type="button" class="btn btn-outline-primary px-3 d-inline-flex align-items-center gap-1" id="btn-copy-webhook" title="Salin Webhook URL">
                                    <i class="ti ti-copy fs-4"></i><span id="copy-text">Salin</span>
                                </button>
                            </div>
                            <span class="fs-2 text-muted mt-1 d-block">Daftarkan URL ini pada Midtrans Dashboard &gt; Settings &gt; Configuration &gt; Payment Notification URL.</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light px-4 py-3">
                    <button type="button" class="btn btn-outline-secondary px-3" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" id="btn-save-settings" class="btn btn-primary px-4 fw-semibold d-inline-flex align-items-center gap-2">
                        <i class="ti ti-device-floppy fs-4"></i>
                        <span id="save-btn-text">Simpan Pengaturan</span>
                        <span id="save-spinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    window.topupRoutes = {
        data: '{{ route("master.topups.data") }}'
    };

    $(document).ready(function() {
        // Toggle Server Key Visibility
        $('#toggle-server-key-visibility').on('click', function() {
            const input = $('#cfg_server_key');
            const icon = $('#eye-icon');
            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
                icon.removeClass('ti-eye').addClass('ti-eye-off');
            } else {
                input.attr('type', 'password');
                icon.removeClass('ti-eye-off').addClass('ti-eye');
            }
        });

        // Copy Webhook URL to Clipboard
        $('#btn-copy-webhook').on('click', function() {
            const urlText = $('#cfg_webhook_url').val();
            navigator.clipboard.writeText(urlText).then(function() {
                $('#copy-text').text('Tersalin!');
                setTimeout(function() {
                    $('#copy-text').text('Salin');
                }, 2000);
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'success',
                        title: 'URL Tersalin',
                        text: 'Webhook notification URL telah disalin ke clipboard.',
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
            });
        });

        // Handle AJAX submission of Midtrans settings
        $('#form-midtrans-settings').on('submit', function(e) {
            e.preventDefault();
            const $form = $(this);
            const $btn = $('#btn-save-settings');
            const $btnText = $('#save-btn-text');
            const $spinner = $('#save-spinner');

            $btn.prop('disabled', true);
            $btnText.text('Menyimpan...');
            $spinner.removeClass('d-none');

            $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                data: $form.serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $btn.prop('disabled', false);
                    $btnText.text('Simpan Pengaturan');
                    $spinner.addClass('d-none');

                    if (typeof Swal !== 'undefined') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil Disimpan',
                            text: response.message || 'Konfigurasi Midtrans berhasil diperbarui.',
                            timer: 1800,
                            showConfirmButton: false
                        });
                    }
                    $('#midtransConfigModal').modal('hide');
                },
                error: function(xhr) {
                    $btn.prop('disabled', false);
                    $btnText.text('Simpan Pengaturan');
                    $spinner.addClass('d-none');

                    let errMsg = 'Gagal menyimpan pengaturan.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errMsg = xhr.responseJSON.message;
                    }
                    if (typeof Swal !== 'undefined') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Kesalahan',
                            text: errMsg,
                            confirmButtonText: 'Tutup'
                        });
                    }
                }
            });
        });
    });
</script>
<script src="{{ asset('js/admin/topups.js') }}"></script>
@endsection
