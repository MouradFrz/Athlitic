<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login/Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('sass/login.css') }}">
</head>
<body>
    <div>
        <div class="login-panel">
            <h2>Login</h2>
            @if(Session::get('message'))
            <p class="success">{{ Session::get('message') }}</p>
                
            @endif
            @if(Session::get('error'))
            <p class="error">{{ Session::get('error') }}</p>
                
            @endif
            <form action="{{ route('admin.check') }}" method="POST">
                @csrf
                <label for="">Username</label>
                <input type="text" class="mb-2" name="username">
                <p class="error"> @error('username')
                    {{ $message }}
                @enderror</p>
                <label for="">Password</label>
                <input type="password" name="password" id="">
                <p class="error"> @error('password')
                    {{ $message }}
                @enderror</p>
                <a href="" class="mb-2">I forgot my password</a>
                <input type="submit" value="Login" class="custom-button">
            </form>
        </div>
    </div>
</body>
</html>