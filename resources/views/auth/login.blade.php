<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Form Login</h2>

    @if($errors->any())
        <p>{{ $errors->first() }}</p>
    @endif

    <form action="{{ url('/login') }}" method="POST">
        @csrf
        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Masuk</button>
    </form>

    <br>
    <a href="{{ url('/register') }}">Belum punya akun? Daftar di sini</a>
</body>
</html>