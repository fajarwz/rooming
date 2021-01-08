## ROOMING (Room Booking)

Aplikasi booking ruangan sederhana

Pertama user membuat form, form otomatis akan berstatus PENDING. Lalu admin bisa menyetujui atau menolak permintaan booking user. Admin juga bisa membatalkan penyetujuan maupun penolakan booking. 

Form booking dibuat untuk booking 1 hari. 

Ada 7 status booking, di antaranya PENDING, DIBOOKING, DIGUNAKAN, DITOLAK, BATAL, SELESAI, dan EXPIRED.

### Tech Stack
- Laravel 8
- Bootstrap 4
lain-lain:
- Yajra Datatables
- Stisla Admin Theme

### Instalasi
- Clone atau Download 
- Masuk ke folder ROOMING ini
- Copy .env.example ke .env (Jika tidak ada .env silakan buat di root folder)
- Sesuaikan konfigurasi .env seperti username dan password database dengan milikmu
- Jalankan `php artisan key:generate` untuk generate `APP_KEY` di .env
- Buat database MySQL dengan nama `db_rooming`
- Jalankan di terminal `composer install`
- Jalankan di terminal `php artisan migrate --seed`
- Buat Cron Job (Linux) atau Task Scheduler (Windows) untuk menjalankan perintah schedule Laravel karena ROOMING menggunakan [Laravel Scheduler](https://laravel.com/docs/8.x/scheduling).

### Menjalankan Laravel Scheduler di Linux (Ubuntu)
- Ketik cronjob -e di terminal
- Sistem akan membuatkan sebuah file jika ini adalah kali pertama
- Masukkan perintah `* * * * * cd /path/ke/projekmu && php artisan schedule:run >> /dev/null 2>&1`
- Ganti `/path/ke/projekmu` dengan path projek ROOMING kamu
- Tekan `Ctrl+x` lalu tekan `y` dan enter

### Jalankan Aplikasi
```
php artisan serve
```

### User
User\
Username: user\
Password: user

Admin\
Username: admin\
Password: admin

by: fajarwz

[Visit my Medium](http://fajarwz.medium.com)\
[Get Connected](http://linkedin.com/in/fajarwz)\
[Let's be friends](http://fb.me/fajarwz123)

### Lisensi
ROOMING menggunakan [lisensi MIT](https://tldrlegal.com/license/mit-license)