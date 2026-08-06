@extends('layouts.master-auth')

@section('title', config('app.name', 'ModernGrosir') . ' — Sign In')

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

    .auth-brand-logo .logo-box {
        width: 32px;
        height: 32px;
        background: #ffffff;
        color: var(--color-ink);
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 13px;
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

    .btn-pill-outline {
        width: 100%;
        height: 42px;
        background: transparent;
        color: var(--color-ink);
        border: 1px solid var(--color-hairline);
        border-radius: 18px;
        font-size: 14px;
        font-weight: 500;
        font-family: var(--font-geist);
        cursor: pointer;
        transition: all 0.15s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-pill-outline:hover {
        background: var(--color-surface-alt);
        border-color: var(--color-mid-gray);
        color: var(--color-ink);
    }

    .divider-line {
        position: relative;
        text-align: center;
        margin: 20px 0;
    }

    .divider-line::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: var(--color-hairline);
    }

    .divider-text {
        position: relative;
        background: var(--color-paper);
        padding: 0 12px;
        font-size: 12px;
        color: var(--color-mid-gray);
    }

    .custom-checkbox-wrapper {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 13px;
    }

    .custom-checkbox-label {
        display: flex;
        align-items: center;
        gap: 8px;
        color: var(--color-mid-gray);
        cursor: pointer;
    }

    .forgot-link {
        color: var(--color-ink);
        text-decoration: none;
        font-weight: 500;
    }

    .forgot-link:hover {
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
            <!-- Left Side: Brand & Infrastructure Blueprint -->
            <div class="col-lg-5 d-none d-lg-block auth-brand-col">
                <div class="auth-brand-side">
                    <a href="{{ url('/') }}" class="auth-brand-logo" style="text-decoration: none; cursor: pointer;">
                        <img src="{{ asset('images/logos/logo-light.svg') }}" alt="{{ config('app.name', 'ModernGrosir') }}" height="36">
                    </a>

                    <div class="auth-brand-copy">
                        <div style="margin-bottom: 16px;">
                            <span class="badge-infra">Infrastructure System</span>
                        </div>
                        <h1>Efisiensi Distribusi Grosir Modern.</h1>
                        <p>Platform B2B all-in-one untuk kontrol stok FEFO, tiering reseller otomatis, dan kecepatan kasir POS.</p>
                    </div>

                    <div style="font-size: 12px; color: #737373;">
                        &copy; {{ date('Y') }} {{ config('app.name', 'ModernGrosir') }} Ecosystem
                    </div>
                </div>
            </div>

            <!-- Right Side: Login Form -->
            <div class="col-lg-7">
                <div class="auth-form-side">
                    <div class="d-lg-none mb-4">
                        <a href="{{ url('/') }}" class="auth-brand-logo" style="text-decoration: none; cursor: pointer;">
                            <img src="{{ asset('images/logos/logo-dark.svg') }}" alt="{{ config('app.name', 'ModernGrosir') }}" height="32">
                        </a>
                    </div>
                    <div class="auth-form-header">
                        <h2>Selamat Datang Kembali</h2>
                        <p>Masukkan akun Anda untuk mengelola inventaris dan penjualan.</p>
                    </div>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="email" class="form-label-custom">Email Address</label>
                            <input type="email" name="email" id="email" 
                                   class="form-control-custom @error('email') is-invalid @enderror" 
                                   value="{{ old('email') }}" required autofocus 
                                   placeholder="admin@moderngrosir.com">
                            @error('email')
                                <div style="color: var(--color-ember); font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label-custom">Password</label>
                            <input type="password" name="password" id="password" 
                                   class="form-control-custom" required 
                                   placeholder="••••••••">
                        </div>

                        <div class="custom-checkbox-wrapper mb-4">
                            <label class="custom-checkbox-label">
                                <input type="checkbox" name="remember" id="remember" checked style="accent-color: var(--color-ink);">
                                <span>Ingat Perangkat Ini</span>
                            </label>
                            <a href="javascript:void(0)" class="forgot-link">Lupa Password?</a>
                        </div>

                        <button type="submit" class="btn-pill-primary mb-3">Sign In ke Dashboard</button>

                        <div class="divider-line">
                            <span class="divider-text">atau gunakan</span>
                        </div>

                        <a href="{{ route('auth.social', 'google') }}" class="btn-pill-outline">
                            <img src="{{ URL::asset('build/images/svgs/google-icon.svg') }}" alt="Google" width="16" onerror="this.style.display='none';">
                            <span>Sign in with Google</span>
                        </a>
                    </form>

                    <div style="text-align: center; margin-top: 28px; font-size: 12px; color: var(--color-mid-gray);">
                        {{ config('app.name', 'ModernGrosir') }} B2B Platform v2.0
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection