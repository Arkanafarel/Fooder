<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h2>Form Register</h2>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ url('/register') }}" method="POST">
        @csrf
        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Konfirmasi Password:</label><br>
        <input type="password" name="password_confirmation" required><br><br>

        <label>Daftar Sebagai:</label><br>
        <select name="role" required>
            <option value="customer">Customer</option>
            <option value="store">Store / Seller</option>
        </select><br><br>

        <button type="submit">Daftar</button>
    </form>

    <br>
    <a href="{{ url('/login') }}">Sudah punya akun? Login di sini</a>
</body>
</html>