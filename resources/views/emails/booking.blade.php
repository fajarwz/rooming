<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Request Booking Baru</title>
</head>
<body>
    Hai, <strong>{{ $receiver_name }}</strong>

    @if ($to_role == 'ADMIN')
        @if ($status == 'DIBUAT')
            <p>Ada <strong>request booking baru</strong> dengan data:</p>
        @elseif ($status == 'BATAL')
            <p>Request booking berikut ini sekarang <strong>dibatalkan</strong>:</p>
        @elseif ($status == 'DISETUJUI')
            <p>Request booking berikut ini sekarang <strong>disetujui</strong>:</p>
        @elseif ($status == 'DITOLAK')
            <p>Request booking berikut ini sekarang <strong>ditolak</strong>:</p>
        @endif
        
    @elseif ($to_role == 'USER')
        @if ($status == 'DIBUAT')
            <p>Request kamu <strong>berhasil dibuat</strong>! Berikut ini datanya:</p>
        @elseif ($status == 'BATAL')
            <p>Request kamu sekarang <strong>dibatalkan</strong>! Berikut ini datanya:</p>
        @elseif ($status == 'DISETUJUI')
            <p>Selamat! Request kamu sudah <strong>disetujui</strong>! Berikut ini datanya:</p>
        @elseif ($status == 'DITOLAK')
            <p>Maaf, Request kamu <strong>ditolak</strong>! Berikut ini datanya:</p>
        @endif
    @endif

    <table>
        <tr>
            <td>Pemohon</td>
            <td>: {{ $user_name }}</td>
        </tr>
        <tr>
            <td>Nama Ruangan</td>
            <td>: {{ $room_name }}</td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>: {{ $date }}</td>
        </tr>
        <tr>
            <td>Waktu Mulai</td>
            <td>: {{ $start_time }}</td>
        </tr>
        <tr>
            <td>Waktu Selesai</td>
            <td>: {{ $end_time }}</td>
        </tr>
        <tr>
            <td>Keperluan</td>
            <td>: {{ $purpose }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>: {{ ($status == 'DIBUAT') ? 'PENDING' : $status }}</td>
        </tr>
    </table>
    <p>Cek <a href="{{ $url }}">disini</a></p>
</body>
</html>