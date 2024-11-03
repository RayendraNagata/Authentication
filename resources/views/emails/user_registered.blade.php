<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Berhasil</title>
</head>
<body>
    <h1>Selamat datang di Aplikasi Kami, {{ $user['name'] }}!</h1>
    <p>Anda telah berhasil mendaftar di aplikasi kami. Berikut adalah informasi akun Anda:</p>
    <ul>
        <li><strong>Nama:</strong> {{ $user['name'] }}</li>
        <li><strong>Email:</strong> {{ $user['email'] }}</li>
    </ul>
    <p>Terima kasih telah mendaftar!</p>
</body>
</html>
