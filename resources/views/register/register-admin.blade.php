<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Admin</title>
</head>
<body>
    <form action="{{ route('register-admin') }}" method="post">
        @csrf
        nama : <input type="text" name="nama" autofocus><br>
        username : <input type="text" name="username"><br>
        email : <input type="email" name="email"><br>
        no_hp : <input type="tel" name="no_hp"><br>
        alamat : <input type="text" name="alamat"><br>
        password : <input type="password" name="password"><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
