# Dokumentasi Akademik: Rancang Bangun Sistem Pengelolaan Kost Berbasis Web (Daenk Kost Jambi)

## 1. Pendahuluan
Sistem Pengelolaan Daenk Kost Jambi adalah aplikasi berbasis web yang dirancang untuk membantu pemilik kost dalam mengelola administrasi internal secara terstruktur. Sistem ini menggunakan Framework Laravel dengan arsitektur MVC (Model-View-Controller).

## 2. Analisis Kebutuhan
### Masalah yang Diselesaikan:
- Pencatatan kamar dan penyewa yang masih manual.
- Kesulitan dalam melacak riwayat pembayaran.
- Tidak adanya laporan administrasi yang terkomputerisasi.

### Kebutuhan Fungsional:
- Autentikasi Admin.
- Manajemen Kamar (CRUD & Status).
- Manajemen Penyewa (CRUD & Penempatan Kamar).
- Manajemen Pembayaran (Pencatatan & Riwayat).
- Laporan (Penyewa, Kamar, Pembayaran).

## 3. Perancangan Sistem

### Entity Relationship Diagram (ERD)
- **Kamar**: Memiliki relasi One-to-One dengan Penyewa (dalam satu waktu).
- **Penyewa**: Memiliki relasi One-to-Many dengan Pembayaran.

### Struktur Tabel:
1. `users`: Menyimpan data admin.
2. `kamar`: Menyimpan detail kamar (nomor, harga, fasilitas, status).
3. `penyewa`: Menyimpan identitas penyewa dan referensi ke kamar.
4. `pembayaran`: Menyimpan transaksi pembayaran bulanan.

## 4. Implementasi Teknologi
- **Backend**: Laravel 11 (PHP 8.2+)
- **Frontend**: Blade Template Engine, Bootstrap 5 (CDN), FontAwesome.
- **Database**: MySQL / MariaDB.
- **ORM**: Eloquent ORM untuk interaksi database yang aman dan efisien.

## 5. Flow Sistem
1. Admin login ke sistem.
2. Admin menginput data kamar yang tersedia.
3. Saat ada penyewa baru, admin mendaftarkan penyewa dan memilih kamar. Status kamar otomatis berubah menjadi 'terisi'.
4. Setiap bulan, admin mencatat pembayaran penyewa.
5. Admin dapat melihat rekapitulasi data melalui fitur laporan yang dapat dicetak.

## 6. Penutup
Sistem ini diharapkan dapat meminimalisir kesalahan manusia (human error) dalam pencatatan administrasi kost dan memberikan kemudahan bagi pemilik dalam memantau bisnis kost mereka.
