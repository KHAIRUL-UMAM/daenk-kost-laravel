# Panduan Instalasi Sistem Pengelolaan Daenk Kost Jambi

Sistem ini dibangun menggunakan Framework Laravel 11. Berikut adalah langkah-langkah untuk menjalankan project ini di komputer lokal Anda:

## Prasyarat
- PHP >= 8.2
- Composer
- MySQL / MariaDB
- Web Server (Apache/Nginx atau gunakan `php artisan serve`)

## Langkah-langkah Instalasi

1. **Ekstrak File**
   Ekstrak file project ini ke dalam folder web server Anda (misal: `htdocs` untuk XAMPP).

2. **Konfigurasi Database**
   - Buat database baru di MySQL dengan nama `daenk_kost`.
   - Salin file `.env.example` menjadi `.env`.
   - Sesuaikan pengaturan database di file `.env`:
     ```
     DB_DATABASE=daenk_kost
     DB_USERNAME=root
     DB_PASSWORD=
     ```

3. **Install Dependencies**
   Buka terminal/command prompt di dalam folder project, lalu jalankan:
   ```bash
   composer install
   ```

4. **Generate App Key**
   Jalankan perintah berikut untuk membuat key aplikasi:
   ```bash
   php artisan key:generate
   ```

5. **Migrasi Database & Seeding**
   Jalankan perintah berikut untuk membuat tabel dan data admin default:
   ```bash
   php artisan migrate --seed
   ```

6. **Jalankan Aplikasi**
   Jalankan server development Laravel:
   ```bash
   php artisan serve
   ```
   Buka browser dan akses `http://127.0.0.1:8000`.

## Akun Login Admin Default
- **Email**: `admin@daenkkost.com`
- **Password**: `admin123`

## Fitur Utama
- Dashboard Statistik
- Manajemen Data Kamar
- Manajemen Data Penyewa
- Pencatatan Pembayaran Bulanan
- Laporan (Cetak PDF/Print)
