# iBux

iBux adalah sebuah website penjualan online yang dirancang khusus untuk produk iPhone, menawarkan pengalaman berbelanja yang mudah, cepat, dan aman. Website ini dilengkapi dengan berbagai fitur utama, seperti pencarian produk yang responsif untuk mempermudah pengguna menemukan iPhone sesuai kebutuhan, serta keranjang belanja yang memungkinkan pengelolaan item sebelum melanjutkan ke proses checkout. Proses checkout dibuat sederhana, dan integrasi dengan payment gateway Midtrans memastikan transaksi pembayaran berjalan lancar dengan berbagai metode, termasuk transfer bank, kartu kredit, dan dompet digital.

## Features

- **Multirole autentikasi**: Memiliki peran sebagai Customer dan Admin dengan hak akses yang berbeda.
- **Keranjang**: Memudahkan Customer menyimpan produk ke keranjang sebelum checkout.
- **Payment Gateway**: Integrasi dengan Midtrans untuk kemudahan pembayaran.
- **Manajemen Order**: Memudahkan Admin dalam mengelola order.
- **Manajemen Produk**: Memudahkan Admin dalam mengelola produk.
- **Responsive**: Tampilan web yang optimal di berbagai perangkat.


## Tech Stack

- **Backend**: Laravel
- **Frontend**: Tempalating Blade Engine, TailwindCSS for Styling
- **Database**: MySQL
- **Others**: Javascript


## Demo Project

Web saat ini masih dalam pengembangan (local)


## Preview

![App Screenshot](https://github.com/irsyamokta/assets/blob/a9fcb802bc00cff28ee18932f8837469faefa2f2/ibux/1.png)

![App Screenshot](https://github.com/irsyamokta/assets/blob/a9fcb802bc00cff28ee18932f8837469faefa2f2/ibux/2.png)

![App Screenshot](https://github.com/irsyamokta/assets/blob/a9fcb802bc00cff28ee18932f8837469faefa2f2/ibux/3.png)

![App Screenshot](https://github.com/irsyamokta/assets/blob/a9fcb802bc00cff28ee18932f8837469faefa2f2/ibux/4.png)

![App Screenshot](https://github.com/irsyamokta/assets/blob/a9fcb802bc00cff28ee18932f8837469faefa2f2/ibux/5.png)

![App Screenshot](https://github.com/irsyamokta/assets/blob/a9fcb802bc00cff28ee18932f8837469faefa2f2/ibux/6.png)

![App Screenshot](https://github.com/irsyamokta/assets/blob/a9fcb802bc00cff28ee18932f8837469faefa2f2/ibux/7.png)

![App Screenshot](https://github.com/irsyamokta/assets/blob/a9fcb802bc00cff28ee18932f8837469faefa2f2/ibux/8.png)

![App Screenshot](https://github.com/irsyamokta/assets/blob/a9fcb802bc00cff28ee18932f8837469faefa2f2/ibux/9.png)

## Panduan Instalasi
Ikuti langkah-langkah berikut untuk menginstal iBux di lokal Anda:
<br>Nb. Pastikan lokal server Anda sudah berjalan, bisa menggunakan XAMPP, Laragon, atau sejenisnya.

1. **Clone Repository**
   ```bash
   git clone https://github.com/irsyamokta/ibux.git
   
2. **Masuk ke Direktori Proyek Setelah repositori ter-clone**
   ```bash
   cd ibux
    
3. **Install Dependencies Pastikan Anda sudah menginstal Composer dan Node.js**
   ```bash
   composer install
   npm install
   
4. **Konfigurasi .env**
   ```bash
   cp .env.example .env
   
5. **Generate Key Aplikasi**
   ```bash
   php artisan key:generate
   
6. **Migrasi Database**
   ```bash
   php artisan migrate
   
7. **Buat Storage Link**
   ```bash
   php artisan storage:link
   
8. **Install NPM Assets**
   ```bash
   npm run dev
   
9. **Jalankan Server**
   ```bash
   php artisan serve

10. Akses aplikasi melalui browser di alamat http://localhost:8000.

## Issue
Jika Anda menemui masalah atau membutuhkan bantuan lebih lanjut, silakan buka issue di GitHub atau hubungi saya.

## Authors

- [@irsyamokta](https://github.com/irsyamokta)
