# Sistem Informasi Kursus Online

## Screenshot

![Enroll](images/enroll.png)
![Form Pembayaran](images/form-pembayaran.png)
![Kelola Instruktur](images/kelola-instruktur.png)
![Kelola Kategori](images/kelola-kategori.png)
![Kelola Kursus](images/kelola-kursus.png)
![Kelola Pengguna](images/kelola-pengguna.png)
![Landing Page 2](images/landing-page-2.png)
![Landing Page 3](images/landing-page-3.png)
![Landing Page Why Us](images/landing-page-why-us.png)
![Landing Page](images/landing-page.png)
![Materi Kursus](images/materi-kursus.png)
![Owner Dashboard](images/owner-dashboard.png)

## Cara Instalasi

1. **Clone repository**
   ```bash
   git clone https://github.com/username/Sistem-Informasi-Kursus-Online.git
   cd Sistem-Informasi-Kursus-Online
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Copy file environment**
   ```bash
   cp .env.example .env
   ```

4. **Generate application key**
   ```bash
   php artisan key:generate
   ```

5. **Konfigurasi database**  
   Edit file `.env` dan sesuaikan konfigurasi database Anda.

6. **Migrasi dan seeding database**
   ```bash
   php artisan migrate --seed
   ```

7. **Jalankan aplikasi**
   ```bash
   php artisan serve
   ```

8. **Akses aplikasi**  
   Buka browser dan akses `http://localhost:8000`

---

**Catatan:**  
Pastikan sudah menginstall PHP, Composer, dan database server