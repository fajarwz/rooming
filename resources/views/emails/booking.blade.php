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
        @if ($status == 'CREATED')
            <p>Ada request booking baru dengan data:</p>
        @elseif ($status == 'CANCELED')
            <p>Request booking berikut ini sekarang dibatalkan:</p>
        @endif
        
    @elseif ($to_role == 'USER')
        @if ($status == 'CREATED')
            <p>Request kamu <strong>berhasil dibuat</strong>! Berikut ini datanya:</p>
        @elseif ($status == 'CANCELED')
            <p>Request kamu sekarang <strong>dibatalkan</strong>! Berikut ini datanya:</p>
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
    </table>
    <p>Cek <a href="{{ $url }}">disini</a></p>
</body>
</html>