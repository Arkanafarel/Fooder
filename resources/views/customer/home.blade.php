<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda Customer</title>
</head>
<body>
    <h1>Halaman Utama Customer</h1>
    <p>Selamat datang, {{ Auth::user()->name }}!</p>

    <form action="{{ url('/logout') }}" method="POST">
        @csrf
        <button type="submit">Keluar / Logout</button>
    </form>
</body>
</html>