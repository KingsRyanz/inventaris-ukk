# Inventaris UKK

Sistem Inventaris untuk Ujian Kompetensi Keahlian (UKK) yang dibuat dengan Laravel.

## Tentang Aplikasi

Aplikasi Inventaris UKK adalah sistem manajemen inventaris berbasis web yang dikembangkan menggunakan framework Laravel. Aplikasi ini dirancang untuk membantu dalam pengelolaan barang, stok, dan peminjaman barang di lingkungan sekolah atau institusi.

## Fitur

- Manajemen Pengguna (Admin, Staff, Peminjam)
- Manajemen Barang/Inventaris
- Pencatatan Stok dan Pergerakan Barang
- Sistem Peminjaman dan Pengembalian
- Laporan dan Statistik
- Dashboard Admin

## Teknologi yang Digunakan

- **Framework:** Laravel
- **Database:** MySQL
- **Frontend:** Bootstrap, jQuery
- **Authentication:** Laravel Breeze/Fortify

## Persyaratan Sistem

- PHP >= 8.0
- Composer
- MySQL/MariaDB
- Node.js dan NPM (untuk mengkompilasi asset)

## Cara Instalasi

1. Clone repository ini:
   ```bash
   git clone https://github.com/KingsRyanz/inventaris-ukk.git
   ```

2. Pindah ke direktori proyek:
   ```bash
   cd inventaris-ukk
   ```

3. Install dependensi PHP:
   ```bash
   composer install
   ```

4. Install dependensi JavaScript:
   ```bash
   npm install && npm run dev
   ```

5. Salin file `.env.example` menjadi `.env`:
   ```bash
   cp .env.example .env
   ```

6. Generate application key:
   ```bash
   php artisan key:generate
   ```

7. Sesuaikan pengaturan database di file `.env`

8. Jalankan migrasi database:
   ```bash
   php artisan migrate
   ```

9. (Opsional) Jalankan seeder untuk data awal:
   ```bash
   php artisan db:seed
   ```

10. Jalankan development server:
    ```bash
    php artisan serve
    ```

11. Akses aplikasi di browser melalui `http://localhost:8000`

## Struktur Aplikasi

- `app/` - Berisi kode inti aplikasi
- `config/` - File konfigurasi
- `database/` - Migrasi dan seeder database
- `public/` - File yang dapat diakses publik
- `resources/` - View, asset, dan file lainnya
- `routes/` - Definisi rute aplikasi
- `tests/` - Test aplikasi

## Penggunaan

1. Login dengan kredensial default:
   - Admin: admin@example.com / password
   - Staff: staff@example.com / password
   - Peminjam: user@example.com / password

2. Kelola inventaris melalui menu yang tersedia sesuai dengan peran pengguna.

## Kontribusi

Kontribusi selalu diterima! Jika Anda ingin berkontribusi:

1. Fork repository ini
2. Buat branch fitur baru (`git checkout -b fitur-baru`)
3. Commit perubahan Anda (`git commit -m 'Menambahkan fitur baru'`)
4. Push ke branch (`git push origin fitur-baru`)
5. Buat Pull Request

## Lisensi

[MIT License](LICENSE)

## Author

[KingsRyanz](https://github.com/KingsRyanz)

## Kontak

Jika Anda memiliki pertanyaan atau masukan, silakan buat issue baru di repository ini.
