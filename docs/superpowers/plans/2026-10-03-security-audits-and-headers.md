# Security Audits & Headers Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Menambal celah keamanan dependensi (NPM dan Composer) serta memasang perlindungan CSP dan Secure Headers pada API ModernGrosir.

**Architecture:** Memperbarui dependensi ke versi aman tanpa merusak struktur saat ini, dan menambahkan library keamanan pihak ketiga (`bepsvpt/secure-headers` dan `spatie/laravel-csp`) ke middleware global.

**Tech Stack:** Laravel 12, NPM, Composer, bepsvpt/secure-headers, spatie/laravel-csp.

## Global Constraints

- Jangan mengubah konfigurasi Midtrans atau logika auth yang sudah ada.
- Jangan paksa (`--force`) update NPM jika berpotensi memutus aplikasi Vue/React yang ada, batasi pada `npm audit fix` biasa terlebih dahulu, dan catat peringatannya.

---

### Task 1: Update Composer Dependencies

**Files:**
- Modify: `moderngrosir_laravel/composer.json` (via command)
- Modify: `moderngrosir_laravel/composer.lock` (via command)

- [ ] **Step 1: Jalankan composer update untuk Symfony packages**

Run: `composer update symfony/routing symfony/yaml symfony/polyfill-intl-idn`
Expected: Output menunjukkan packages diperbarui.

- [ ] **Step 2: Commit perubahan**

```bash
git add composer.json composer.lock
git commit -m "chore: update symfony dependencies to patch vulnerabilities"
```

---

### Task 2: Update NPM Dependencies

**Files:**
- Modify: `moderngrosir_laravel/package.json` (via command)
- Modify: `moderngrosir_laravel/package-lock.json` (via command)

- [ ] **Step 1: Jalankan npm audit fix**

Run: `npm audit fix`
Expected: Beberapa celah keamanan berhasil diperbaiki tanpa merusak fungsionalitas (tidak memakai --force dulu).

- [ ] **Step 2: Commit perubahan**

```bash
git add package.json package-lock.json
git commit -m "chore: run npm audit fix to patch frontend dependencies"
```

---

### Task 3: Install & Configure Secure Headers

**Files:**
- Create/Modify: `moderngrosir_laravel/config/secure-headers.php` (via vendor publish)
- Modify: `moderngrosir_laravel/bootstrap/app.php`

- [ ] **Step 1: Install `bepsvpt/secure-headers`**

Run: `composer require bepsvpt/secure-headers`
Expected: Paket terinstal.

- [ ] **Step 2: Publish config**

Run: `php artisan vendor:publish --provider="Bepsvpt\SecureHeaders\SecureHeadersServiceProvider"`
Expected: File `config/secure-headers.php` terbuat.

- [ ] **Step 3: Pasang global middleware**

Pada file `moderngrosir_laravel/bootstrap/app.php`, tambahkan middleware `\Bepsvpt\SecureHeaders\SecureHeadersMiddleware::class` pada `withMiddleware`.
```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->append(\Bepsvpt\SecureHeaders\SecureHeadersMiddleware::class);
})
```

- [ ] **Step 4: Commit perubahan**

```bash
git add composer.json composer.lock config/secure-headers.php bootstrap/app.php
git commit -m "feat: add secure headers middleware"
```

---

### Task 4: Install & Configure Laravel CSP

**Files:**
- Create/Modify: `moderngrosir_laravel/config/csp.php`
- Modify: `moderngrosir_laravel/bootstrap/app.php`

- [ ] **Step 1: Install `spatie/laravel-csp`**

Run: `composer require spatie/laravel-csp`
Expected: Paket terinstal.

- [ ] **Step 2: Publish config**

Run: `php artisan vendor:publish --tag=csp-config`
Expected: File `config/csp.php` terbuat.

- [ ] **Step 3: Tambahkan middleware CSP**

Tambahkan `\Spatie\Csp\AddCspHeaders::class` di `bootstrap/app.php` dalam `withMiddleware`.
```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->append(\Bepsvpt\SecureHeaders\SecureHeadersMiddleware::class);
    $middleware->append(\Spatie\Csp\AddCspHeaders::class);
})
```

- [ ] **Step 4: Commit perubahan**

```bash
git add composer.json composer.lock config/csp.php bootstrap/app.php
git commit -m "feat: add content security policy middleware"
```
