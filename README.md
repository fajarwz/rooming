## ROOMING (Room Booking)

Aplikasi booking ruangan sederhana

Pertama user membuat form, form otomatis akan berstatus PENDING. Lalu admin bisa menyetujui atau menolak permintaan booking user. Admin juga bisa membatalkan penyetujuan maupun penolakan booking. 

Form booking dibuat untuk booking 1 hari. 

Ada 7 status booking, di antaranya PENDING, DISETUJUI, DIGUNAKAN, DITOLAK, BATAL, SELESAI, dan EXPIRED.

### Penjelasan Status Booking
Berikut ini ialah penjelasan status booking yang dibuat oleh User. Otomatisasi perubahan status booking dilakukan dengan Laravel Scheduler.

1. PENDING. Ketika User baru mengajukan permintaan booking.
2. DISETUJUI. Ketika Admin menyetujui permintaan booking User. Aksi ini bisa dibatalkan dengan mengklik Batalkan di data booking User
3. DIGUNAKAN. Ketika User tengah menggunakan ruangan, dilihat berdasarkan tanggal, waktu mulai dan waktu selesai booking User.
4. DITOLAK. Ketika Admin menolak permintaan booking User. Aksi ini bisa dibatalkan dengan mengklik Setujui di data booking User.
5. BATAL. Ketika User membatalkan permintaan booking. Aksi ini tidak bisa dibatalkan
6. SELESAI. Ketika waktu booking selesai, dilihat berdasarkan tanggal, waktu mulai dan waktu selesai booking User.
7. EXPIRED. Ketika permintaan booking User dibiarkan PENDING sampai melewati waktu mulai booking.

Note: ROOMING menggunakan waktu Jakarta / Waktu Indonesia Barat. Jika ingin mengganti waktu yang digunakan, ganti nilai `APP_TIMEZONE` di .env

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
- Ketik `crontab -e` atau `sudo crontab -e` di terminal
- Sistem akan membuatkan sebuah file jika ini adalah kali pertama
- Masukkan perintah `* * * * * cd /path/ke/projekmu && php artisan schedule:run >> /dev/null 2>&1`
- Ganti `/path/ke/projekmu` dengan path projek ROOMING kamu
- Tekan `Ctrl+x` lalu tekan `y` dan enter
- Untuk melihat cronjob akun User yang saat ini dipakai ketik `crontab -l` atau `sudo crontab -l`

### Jalankan Aplikasi
```
php artisan serve
```

### Jalankan Queues
[Queues](https://laravel.com/docs/8.x/queues) digunakan untuk pengiriman email notifikasi pembuatan, pembatalan, penyetujuan, dan penolakan request booking.
```
php artisan queue:work
```

### User
User\
Username: user\
Password: user

Admin\
Username: admin\
Password: admin

### Lisensi
ROOMING menggunakan [lisensi MIT](https://github.com/fajarwz/rooming/blob/main/LICENSE)

### Demo
[Youtube](https://youtu.be/ZZL4VrJCA3E)

### Misc
Aplikasi ini memanfaatkan Blade Component dengan teknik reusable component. Form input hanya 1, tapi dipanggil di setiap fitur tambah data. Input field juga ada 1 tapi dipanggil berkali-kali di setiap fitur tambah data. Lumayan untuk belajar blade component.

by: fajarwz

[Visit my Web](https://fajarwz.netlify.app)\
[Visit my Medium](https://fajarwz.medium.com)\
[Get Connected](https://linkedin.com/in/fajarwz)\
[Let's be friends](https://fb.me/fajarwz123)