<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Toko</title>
</head>
<body>
    <h1>Dashboard Pengelola Toko</h1>
    <p>Selamat datang, {{ Auth::user()->name }}!</p>

    <form action="{{ url('/logout') }}" method="POST">
        @csrf
        <button type="submit">Keluar / Logout</button>
    </form>
</body>
</html>