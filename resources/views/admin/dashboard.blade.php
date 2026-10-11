<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
</head>
<body>
    <h1>Dashboard Admin Kampus</h1>
    <p>Selamat datang, Admin {{ Auth::user()->name }}!</p>

    <form action="{{ url('/logout') }}" method="POST">
        @csrf
        <button type="submit">Keluar / Logout</button>
    </form>
</body>
</html>