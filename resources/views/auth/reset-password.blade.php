@extends('layouts.master-auth')

@section('title', config('app.name', 'ModernGrosir') . ' — Reset Password')

@section('css')
<style>
    :root {
        --color-canvas: #f5f5f5;
        --color-paper: #ffffff;
        --color-surface-alt: #fafafa;
        --color-ink: #0a0a0a;
        --color-ink-soft: #171717;
        --color-mid-gray: #737373;
        --color-hairline: #e5e5e5;
        --color-ember: #e7000b;
        --font-geist: 'Geist', 'Inter', ui-sans-serif, system-ui, -apple-system, sans-serif;
    }

    body {
        background-color: var(--color-canvas) !important;
        font-family: var(--font-geist) !important;
        color: var(--color-ink) !important;
    }

    .auth-bg-wrapper {
        min-height: 100vh;
        background-color: var(--color-canvas);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 24px;
    }

    .auth-card {
        background: var(--color-paper);
        border: 1px solid var(--color-hairline);
        border-radius: 24px;
        box-shadow: 0px 0px 0px 1px rgba(23, 23, 23, 0.05),
                    0px 1px 3px 0px rgba(0, 0, 0, 0.08),
                    0px 1px 2px -1px rgba(0, 0, 0, 0.06);
        overflow: hidden;
        max-width: 920px;
        width: 100%;
    }

    .auth-card .row {
        align-items: stretch;
    }

    .auth-brand-col {
        display: flex;
        flex-direction: column;
    }

    .auth-brand-side {
        background: var(--color-ink);
        color: #fafafa;
        padding: 48px 40px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
        min-height: 100%;
    }

    .auth-brand-logo {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 1.15rem;
        font-weight: 600;
        letter-spacing: -0.03em;
        color: #ffffff;
    }

    .auth-brand-copy h1 {
        font-size: 30px;
        font-weight: 600;
        letter-spacing: -0.05em;
        line-height: 1.15;
        color: #ffffff;
        margin-bottom: 12px;
    }

    .auth-brand-copy p {
        font-size: 14px;
        color: #a3a3a3;
        line-height: 1.5;
        margin: 0;
    }

    .auth-form-side {
        padding: 48px 40px;
        background: var(--color-paper);
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .auth-form-header {
        margin-bottom: 28px;
    }

    .auth-form-header h2 {
        font-size: 24px;
        font-weight: 600;
        letter-spacing: -0.04em;
        margin-bottom: 6px;
        color: var(--color-ink);
    }

    .auth-form-header p {
        font-size: 14px;
        color: var(--color-mid-gray);
        margin: 0;
    }

    .form-label-custom {
        font-size: 13px;
        font-weight: 500;
        color: var(--color-ink);
        margin-bottom: 6px;
        display: block;
    }

    .form-control-custom {
        width: 100%;
        height: 42px;
        padding: 8px 14px;
        background-color: var(--color-canvas);
        border: 1px solid var(--color-hairline);
        border-radius: 18px;
        font-family: var(--font-geist);
        font-size: 14px;
        color: var(--color-ink);
        outline: none;
        transition: all 0.15s ease;
    }

    .form-control-custom:focus {
        background-color: var(--color-paper);
        border-color: var(--color-ink);
        box-shadow: 0 0 0 1px var(--color-ink);
    }

    .form-control-custom.is-invalid {
        border-color: var(--color-ember);
        background-color: #fef2f2;
    }

    .btn-pill-primary {
        width: 100%;
        height: 42px;
        background: var(--color-ink);
        color: #fafafa;
        border: none;
        border-radius: 18px;
        font-size: 14px;
        font-weight: 500;
        font-family: var(--font-geist);
        cursor: pointer;
        transition: all 0.15s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-pill-primary:hover {
        background: var(--color-ink-soft);
        transform: translateY(-1px);
    }

    .back-to-login {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        color: var(--color-mid-gray);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.15s ease;
    }

    .back-to-login:hover {
        color: var(--color-ink);
        text-decoration: underline;
    }

    .badge-infra {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 2px 10px;
        background: #262626;
        color: #a3a3a3;
        border-radius: 18px;
        font-size: 12px;
        font-weight: 500;
    }
</style>
@endsection

@section('pageContent')
<div class="auth-bg-wrapper">
    <div class="auth-card">
        <div class="row g-0">
            <!-- Left Side: Brand Blueprint -->
            <div class="col-lg-5 d-none d-lg-block auth-brand-col">
                <div class="auth-brand-side">
                    <a href="{{ url('/') }}" class="auth-brand-logo" style="text-decoration: none; cursor: pointer;">
                        <img src="{{ asset('images/logos/logo-light.svg') }}" alt="{{ config('app.name', 'ModernGrosir') }}" height="36">
                    </a>

                    <div class="auth-brand-copy">
                        <div style="margin-bottom: 16px;">
                            <span class="badge-infra">New Credentials</span>
                        </div>
                        <h1>Buat Password Baru Anda.</h1>
                        <p>Pastikan password baru Anda kuat, minimal 8 karakter, dan tidak digunakan di situs lain.</p>
                    </div>

                    <div style="font-size: 12px; color: #737373;">
                        &copy; {{ date('Y') }} {{ config('app.name', 'ModernGrosir') }} Ecosystem
                    </div>
                </div>
            </div>

            <!-- Right Side: Reset Password Form -->
            <div class="col-lg-7">
                <div class="auth-form-side">
                    <div class="d-lg-none mb-4">
                        <a href="{{ url('/') }}" class="auth-brand-logo" style="text-decoration: none; cursor: pointer;">
                            <img src="{{ asset('images/logos/logo-dark.svg') }}" alt="{{ config('app.name', 'ModernGrosir') }}" height="32">
                        </a>
                    </div>

                    <div class="auth-form-header">
                        <h2>Reset Password</h2>
                        <p>Masukkan email dan password baru akun Anda.</p>
                    </div>

                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3">
                            <label for="email" class="form-label-custom">Email Address</label>
                            <input type="email" name="email" id="email" 
                                   class="form-control-custom @error('email') is-invalid @enderror" 
                                   value="{{ $email ?? old('email') }}" required autofocus 
                                   placeholder="nama@email.com">
                            @error('email')
                                <div style="color: var(--color-ember); font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label-custom">Password Baru</label>
                            <input type="password" name="password" id="password" 
                                   class="form-control-custom @error('password') is-invalid @enderror" 
                                   required 
                                   placeholder="••••••••">
                            @error('password')
                                <div style="color: var(--color-ember); font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label-custom">Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" 
                                   class="form-control-custom" 
                                   required 
                                   placeholder="••••••••">
                        </div>

                        <button type="submit" class="btn-pill-primary mb-4">Perbarui Password</button>
                    </form>

                    <div style="text-align: center;">
                        <a href="{{ route('login') }}" class="back-to-login">
                            <i class="ti ti-arrow-left"></i> Batal & Kembali ke Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
