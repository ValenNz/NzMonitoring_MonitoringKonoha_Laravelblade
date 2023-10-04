## About This Project

username-password, database version, php version, framework dan panduan penggunaan aplikasi.
username admin : admin@gmail.com
password admin : 1234567890

username user yang menyetujui : approval@gmail.com
password user yang menyetujui : 1234567890

Database Version :
    Database server
    Server: 127.0.0.1 via TCP/IP
    Server type: MariaDB
    Server connection: SSL is not being used Documentation
    Server version: 10.4.21-MariaDB - mariadb.org binary distribution
    Protocol version: 10
    User: root@localhost
    Server charset: UTF-8 Unicode (utf8mb4)

PHP Version : 
    PHP 8.2.4 (cli) (built: Mar 14 2023 17:54:25) (ZTS Visual C++ 2019 x64)
    Copyright (c) The PHP Group
    Zend Engine v4.2.4, Copyright (c) Zend Technologies

Laravel Framework : 9.52.

Panduan konfigurasi aplikasi 
1. Clone project dari repository github ( https://github.com/ValenNz/NzMonitoring_MonitoringKonoha_Laravelblade ) 
2. buat database yang nantinya akan dikonfigurasi dengan project laravel 
3. composer install, npm install
4. cp .env.example .env lalu Edit bagian database di file .env
5. php artisan key:generate , lalu php artisan serve


Panduan penggunaan aplikasi
1. Nyalakan server dan jalankan program dengancode php artisan serve
2. Login dengan akun yang sudah tersedia jika ingin mwenggunakan akun lain bisa melakukan sign up pada halaman signup
3. Setlah login akan di arahkan kedalam halaman dashboard
