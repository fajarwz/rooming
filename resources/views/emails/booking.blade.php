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
    <p>Ada request booking baru</p>
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