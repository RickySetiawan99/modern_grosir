# Design Spec: Fitur Lupa Password & Reset Password (ModernGrosir)

**Tanggal**: 2026-08-11  
**Status**: Approved  

---

## 1. Ringkasan
Dokumen ini mendeskripsikan perancangan fitur **Lupa Password & Reset Password** pada aplikasi ModernGrosir menggunakan alur *Native Laravel Password Broker* yang aman, responsif, dan terintegrasi dengan antarmuka Blade bermodel *Geist / Modern UI*.

---

## 2. Arsitektur & Rute

### Rute Publik (`guest` middleware)
- `GET /forgot-password` (`password.request`): Menampilkan form permintaan email reset.
- `POST /forgot-password` (`password.email`): Memvalidasi email dan mengirimkan link reset.
- `GET /reset-password/{token}` (`password.reset`): Menampilkan form input password baru.
- `POST /reset-password` (`password.update`): Mengubah password user di DB & memvalidasi token.

---

## 3. Komponen Backend

### Controllers (`app/Http/Controllers/Auth/`)
1. **`ForgotPasswordController.php`**
   - `showLinkRequestForm()`: Mengembalikan view `auth.forgot-password`.
   - `sendResetLinkEmail(Request $request)`: Validasi format email & memanggil `Password::sendResetLink($request->only('email'))`.
2. **`ResetPasswordController.php`**
   - `showResetForm(Request $request, $token)`: Mengembalikan view `auth.reset-password` membawa `$token` dan `$email`.
   - `reset(Request $request)`: Validasi input (`token`, `email`, `password`, `password_confirmation`), memanggil `Password::reset(...)`, lalu mengarahkan kembali ke login dengan status sukses.

---

## 4. Komponen Frontend (Blade Views)

1. **`resources/views/auth/forgot-password.blade.php`**
   - Form input email tunggal dengan validasi real-time / error feedback.
   - Alert status saat email berhasil dikirim (`session('status')`).
   - Link navigasi kembali ke login (`/login`).
2. **`resources/views/auth/reset-password.blade.php`**
   - Hidden input `token` dan `email`.
   - Form input `Password Baru` dan `Konfirmasi Password Baru`.
   - Tombol submit "Simpan Password Baru".
3. **`resources/views/auth/login.blade.php`**
   - Pembaruan link `Lupa Password?` mengarah ke `route('password.request')`.

---

## 5. Keamanan & Proteksi Data
- **Token Hashing**: Token acak 64-karakter disimpan di `password_reset_tokens` secara terenkripsi.
- **Expiration**: Token otomatis kadaluarsa setelah 60 menit (`config/auth.php`).
- **Throttling**: Rute pengiriman email diproteksi middleware rate limit.
