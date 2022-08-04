<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('sass/homepage.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        @yield('meta')
</head>

<body>
    <div class="nav-wrapper">
        <div class="container">
            <nav>
                <div class="logo">
                    <img src="{{ asset('img/globals/logo.png') }}" alt="">
                    <h1>Ath<span>LIT</span>ic</h1>
                </div>
                <div class="nav-buttons">
                    @auth('web')
                        <a href="" class="custom-button">My orders</a>
                        <a class="custom-button" href="{{ route('user.logout') }}">Logout</a>
                    @endauth
                    @guest
                        <a href="{{ route('user.login') }}" class="custom-button">Login</a>
                        <a href="" class="custom-button">Register</a>
                    @endguest
                </div>
            </nav>
        </div>
    </div>
    <div class="links-wrapper">
        <div class="container">
            <div class="links">
                <div class="link">
                    <button>Men's Section &#x25BC</button>
                    <div class="dropdown">
                        <ul>
                            <li>Clothes</li>
                            <li><a href="">Shirts</a></li>
                            <li><a href="">Shorts</a></li>
                            <li><a href="">Jackets</a></li>
                            <li><a href="">Socks</a></li>
                            <li><a href="">Accesories</a></li>
                        </ul>
                        <ul>
                            <li>Shoes</li>
                            <li><a href="">Sports</a></li>
                            <li><a href="">Running Shoes</a></li>
                            <li><a href="">Basketball</a></li>
                            <li><a href="">Football</a></li>
                            <li><a href="">Golf</a></li>
                        </ul>
                    </div>
                </div>
                <div class="link">
                    <button>Women's Section &#x25BC</button>
                    <div class="dropdown">
                        <ul>
                            <li>Clothes</li>
                            <li><a href="">Shirts</a></li>
                            <li><a href="">Shorts</a></li>
                            <li><a href="">Jackets</a></li>
                            <li><a href="">Socks</a></li>
                            <li><a href="">Accesories</a></li>
                        </ul>
                        <ul>
                            <li>Shoes</li>
                            <li><a href="">Sports</a></li>
                            <li><a href="">Running Shoes</a></li>
                            <li><a href="">Basketball</a></li>
                            <li><a href="">Football</a></li>
                            <li><a href="">Golf</a></li>
                        </ul>
                    </div>
                </div>
                <div class="link">
                    <button>Kids's Section &#x25BC</button>
                    <div class="dropdown">
                        <ul>
                            <li>Clothes</li>
                            <li><a href="">Shirts</a></li>
                            <li><a href="">Shorts</a></li>
                            <li><a href="">Jackets</a></li>
                            <li><a href="">Socks</a></li>
                            <li><a href="">Accesories</a></li>
                        </ul>
                        <ul>
                            <li>Shoes</li>
                            <li><a href="">Sports</a></li>
                            <li><a href="">Running Shoes</a></li>
                            <li><a href="">Basketball</a></li>
                            <li><a href="">Football</a></li>
                            <li><a href="">Golf</a></li>
                        </ul>
                    </div>
                </div>
                <form  action="" style="margin-left:auto">
                    <input type="search" class="custom-input" placeholder="Search for an item ...">
                    <button class="custom-button"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    @auth
        @empty(Auth::user()->email_verified_at)
            <div class="email-notif-wrapper bg-warning py-3">
                <div class="container">
                    <div class="email-notif">
                        <p class="m-0">You cannot place orders before verifying your email. <a
                                href="{{ route('verification.notice') }}">Click here to verify your email</a></p>
                    </div>
                </div>
            </div>
        @endempty
    @endauth
    @yield('main')
    
            <footer>
                <div class="footer-wrap">
                    <div class="container">
                        <div class="logo" style="padding-top: 0">
                            <img src="{{ asset('img/globals/logo.png') }}" alt="">
                            <h1>Ath<span>LIT</span>ic</h1>
                        </div>
                        <div class="footer-aligner" >
                            <div>
                                <h1>Navigate</h1>
                                <ul>
                                    <li><a href="">Home</a></li>
                                    <li><a href="">My orders</a></li>
                                    <li><a href="">About</a></li>
                                    <li><a href="">Contact us</a></li>
                                </ul>
                            </div>
                            <div>
                                <h1>Recourses</h1>
                                <ul>
                                    <li><a href="">Home</a></li>
                                    <li><a href="">My orders</a></li>
                                    <li><a href="">Contact us</a></li>
                                </ul>
                            </div>
                            <div>
                                <h1>Developers</h1>
                                <ul>
                                    <li><a href="">My orders</a></li>
                                    <li><a href="">About</a></li>
                                    <li><a href="">Forums</a></li>
                                </ul>
                            </div>
                            <div class="socials">
                                <a href=""><i class="bi bi-instagram"></i> Instagram</a>
                                <a href=""><i class="bi bi-facebook"></i> Facebook</a>
                            </div>
                        </div>
                        <p style="text-align: center;margin:1.5rem 0 0 0 ">© 2022 <a href="" class="signature">Yaou Mourad</a> - All Rights Reserved.</p>
                    </div>
                </div>
            </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    @yield('script')
    
</body>

</html>
