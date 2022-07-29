<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Verification</title>
    <link rel="stylesheet" href="{{ asset('sass/verifyemail.css') }}">
    <link rel="stylesheet" href="{{ asset('sass/homepage.css') }}">
</head>

<body>


</body>
<div class="wrapper">
    <div class="logo">
        <img src="{{ asset('img/globals/logo.png') }}" alt="">
        <h1>Ath<span>LIT</span>ic</h1>
    </div>
    <div class="text">
        <p>Click the button below to send a verification email to <span
                style="color: blue">{{ Auth::user()->email }}</span></p>
    </div>
    <div class="action">
        <div class="flex">
            <form action="{{ route('verification.send') }}" method="post">
                @csrf
                <button class="custom-button">Send Verfication email</button>
            </form>
          <a href="{{ route('user.logout') }}">Logout</a>
        </div>
        @if (Session::get('message'))
        <p style="color: green">{{ Session::get('message') }}</p>
        @endif
    </div>
</div>

</html>
