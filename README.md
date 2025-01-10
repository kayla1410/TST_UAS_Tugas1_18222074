<h1 align="center"> Tugas 2 - Mengembangkan Layanan Microservices Menggunakan Framework CI4 dan XAMPP </h1>

## Table of Contents
* [General Information](#general-information)
* [How to Run](#how-to-run)
* [Contributors](#contributors)

## General Information
Tugas UAS 2 II3160 Teknologi Sistem Terintegrasi bertujuan untuk memberikan pengalaman dalam mengembangkan Layanan Microservices Menggunakan Framework CI4 dan XAMPP. Layanan yang saya buat adalah layanan terkait Learning Management System (LMS) yang bernama StudentHub dengan beberapa fitur, yaitu:

1. Dashboard Mahasiswa: Halaman utama yang muncul saat pertama kali mahasiswa mengakses website dan berhasil melakukan login, menampilkan sambutan selamat datang, Nomor Induk Mahasiswa (NIM), informasi mengenai semester yang sedang dijalani oleh pengguna, serta fitur yang bisa diakses oleh pengguna.
2. Dashboard Admin : Halaman utama yang muncul saat pertama kali admin mengakses website dan berhasil melakukan login, menampilkan sambutan selamat datang dan fitur-fitur apa saja yang bisa diakses oleh pengguna.
3. Data Pribadi : Fitur mahasiswa untuk melihat informasi mengenai mahasiswa seperti IPK, mata kuliah yang dipilih, dan grafik IP.
4. Input Data Mahasiswa : Fitur admin untuk menambahkan data mahasiswa. Hanya mahasiswa yang terdata pada database yang bisa melakukan login (setelah melakukan signup).
5. Input Nilai Mahasiswa : Fitur admin untuk menambahkan data nilai IP mahasiswa yang nantinya akan ditampilkan pada halaman data pribadi mahasiswa dalam bentuk grafik IP.
6. Input Data Dosen : Fitur admin untuk menambahkan data dosen.

## How to Run
1. Open this URL
```
http://studenthub18222074.zya.me/kayla/public
```
2. Sign up if you don't have an account yet, then log in to your account.
3. Log in directly if you want to try using the existing data (username: Kayla, password: Kayla) or (username: admin, password: admin).
4. You have successfully accessed the features available on StudentHub.
5. Welcome to the StudentHub Learning Management System. We hope it provides you with an enjoyable experience!

## Running the Service on Localhost
### Persyaratan Sistem
1. **XAMPP**  
   Unduh dan instal XAMPP dari [https://www.apachefriends.org](https://www.apachefriends.org).
2. **Composer**  
   Unduh dan instal Composer dari [https://getcomposer.org](https://getcomposer.org).

### Instalasi
### **1. Clone atau Unduh Proyek**
Clone atau unduh repository ini ke folder `htdocs` di direktori instalasi XAMPP:
```bash
git clone [URL_REPOSITORY]
```
atau cukup unduh dan ekstrak file ZIP ke folder htdocs.

### **2. Konfigurasi XAMPP**
1. Buka XAMPP Control Panel dan aktifkan Apache dan MySQL.
2. Akses PHPMyAdmin melalui http://localhost/phpmyadmin.

### **3. Import Database**
1. Masuk ke PHPMyAdmin.
2. Buat database baru dengan nama pendidikan_microservices
3. Import file database dari folder database yang terdapat di root proyek ini:
- Buka tab Import di PHPMyAdmin.
- Pilih file .sql yang terdapat dalam folder database.
- Klik Go untuk mengimpor database.

### **4. Instal Dependensi**
Jalankan perintah berikut untuk menginstal dependensi menggunakan Composer:
```bash
composer install
```

### **5. Jalankan Aplikasi**
1. Akses aplikasi melalui browser:
```url
http://localhost/[folder_proyek]
```

## Contributors
### Kelompok 7 - Final Project
- Kayla Dyara (18222074)
