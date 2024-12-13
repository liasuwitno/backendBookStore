# Book Store - Backend Programming Exam 

## Persyaratan Sistem
Pastikan Anda memiliki prasyarat berikut sebelum menjalankan proyek Laravel:
- **PHP**: 8.1 atau lebih baru ([Unduh PHP](https://www.php.net/downloads)).
- **Laravel**: Versi 10 ([Dokumentasi Laravel](https://laravel.com/docs/10.x)).
- **Database**: MySQL atau lainnya yang didukung Laravel ([MySQL](https://dev.mysql.com/downloads/)).
- **Composer**: Terinstal di sistem Anda ([Unduh Composer](https://getcomposer.org/download/)).


## Langkah-Langkah Instalasi

### 1. Clone Repository
Clone repository proyek ini dan masuk ke direktori proyek:
```bash
git clone https://github.com/liasuwitno/backendBookStore.git
cd backendBookStore


### Install Dependency Backend Gunakan Composer untuk menginstal dependency backend:
bash
composer install


### Salin File Konfigurasi .env Salin file .env.example menjadi .env:
bash
cp .env.example .env


### Konfigurasi Environment Buka file .env dan sesuaikan konfigurasi berikut:
bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:q/IiaX4Ql5rh1Z5tTUfF9xI//hE79PFX/kgH0xbE3sA=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=book-store
DB_USERNAME=root
DB_PASSWORD=


### Generate Application Key Jalankan perintah berikut untuk membuat application key:
bash
php artisan key:generate


### Migrasi dan Seed Database Jalankan perintah untuk membuat tabel di database:
bash
php artisan migrate


#### (Opsional) Jika ada data awal, gunakan seed:
bash
php artisan db:seed


### Jalankan Server Jalankan server Laravel dengan perintah berikut:
bash
php artisan serve

Akses aplikasi melalui http://localhost:8000.