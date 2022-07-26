<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Athlitic</title>
    <link rel="stylesheet" href="{{ asset('sass/homepage.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                    <a href="{{ route('user.login') }}" class="custom-button">Login</a>
                    <a href="" class="custom-button">Register</a>
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
            </div>
        </div>
    </div>
    <div class="latest-release-wrapper">
        <div class="container">
            <div class="latest-release">
                <h1 class="my-5 fs-1">Latest Releases</h1>
                <div>
                    <div>
                        <img class="presented-img" src="{{ asset('img/globals/latest1.png') }}" alt="">

                        <h1>TechWear QG</h1>
                        <p class="subtitle">lorem ipsum</p>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit earum nesciunt molestiae
                            cupiditate aliquid voluptate.</p>
                        <button class="custom-button">Explore!</button>
                    </div>
                    <div>


                        <h1>Athletism</h1>
                        <p class="subtitle">lorem ipsum</p>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit earum nesciunt molestiae
                            cupiditate aliquid voluptate.</p>
                        <button class="custom-button" style="margin-bottom:16px">Explore!</button>
                        <img class="presented-img" src="{{ asset('img/globals/latest2.png') }}" alt="">
                    </div>
                    <div>
                        <img class="presented-img" src="{{ asset('img/globals/latest3.png') }}" alt="">

                        <h1>StreetWear</h1>
                        <p class="subtitle">lorem ipsum</p>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit earum nesciunt molestiae
                            cupiditate aliquid voluptate.</p>
                        <button class="custom-button">Explore!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="trending-wrapper">
        <div class="container">
            <div class="trending">
                <h1 class="my-5">Trending Items</h1>
            </div>
        </div>
        <div class="ccarousel-wrap">
            <button class="left">
                <p>&#8592</p>
            </button>
            <button class="right">
                <p>&#8594</p>
            </button>
            <div class="ccarousel-cadre">
                <div class="blur">

                </div>
                <div class="ccarousel-item on">
                    <img src="{{ asset('img/globals/featured1.png') }}" alt="">
                    <div>
                        <h1>Reverse Mocha</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt deleniti necessitatibus, animi quae labore officia!</p>
                        <p><span class="old-price">$99.99</span><span class="new-price">$79.99</span></p>
                        <button class="custom-button">Purchase</button>
                    </div>
                </div>
                <div class="ccarousel-item next">
                    <img src="{{ asset('img/globals/featured2.png') }}" alt="">
                    <div>
                        <h1>Reverse Mocha</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt deleniti necessitatibus, animi quae labore officia!</p>
                        <p><span class="old-price">$99.99</span><span class="new-price">$79.99</span></p>
                        <button class="custom-button">Purchase</button>
                    </div>
                </div>
                <div class="ccarousel-item">
                    <h1>Item 3</h1>
                </div>
                <div class="ccarousel-item prev">
                    <h1>Item 4</h1>
                </div>
       
            </div>
        </div>
    </div>
    <div class="wide-image-wrapper">
        <div class="container">
            <div class="wide-image">
                <h1>Biking on a whole new level!</h1>
                <button class="custom-button">Explore!</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        const items = document.querySelectorAll('.ccarousel-item')
        const nextbtn = document.querySelector('.right')
        const prevbtn = document.querySelector('.left')

        let i = 0

        nextbtn.addEventListener('click', () => {
            if (i == items.length-1) {
                i = 0
            } else {
                i++
            }
            if (i == 0) {
                items.forEach(e => {
                    e.classList.remove('on')
                    e.classList.remove('next')
                    e.classList.remove('prev')
                })
                items[0].classList.add('on')
                items[items.length - 1].classList.add('prev')
                items[1].classList.add('next')
            } else if (i == items.length - 1) {
                items.forEach(e => {
                    e.classList.remove('on')
                    e.classList.remove('next')
                    e.classList.remove('prev')
                })
                items[items.length - 1].classList.add('on')
                items[0].classList.add('next')
                items[items.length - 2].classList.add('prev')
            } else {
                items.forEach((element, index) => {
                    if (index == i) {
                        element.classList.remove('next')
                        element.classList.remove('prev')
                        element.classList.add('on')
                    }
                    if (index == i-1) {
                        element.classList.remove('on')
                        element.classList.remove('next')
                        element.classList.add('prev')

                    }
                    if (index == i + 1) {
                        element.classList.remove('prev')
                        element.classList.remove('on')
                        element.classList.add('next')

                    }
                })

            }
        })
        prevbtn.addEventListener('click', () => {
            if (i == 0) {
                i = items.length-1
            } else {
                i--
            }
            if (i == 0) {
                items.forEach(e => {
                    e.classList.remove('on')
                    e.classList.remove('next')
                    e.classList.remove('prev')
                })
                items[0].classList.add('on')
                items[items.length - 1].classList.add('prev')
                items[1].classList.add('next')
            } else if (i == items.length - 1) {
                items.forEach(e => {
                    e.classList.remove('on')
                    e.classList.remove('next')
                    e.classList.remove('prev')
                })
                items[items.length - 1].classList.add('on')
                items[0].classList.add('next')
                items[items.length - 2].classList.add('prev')
            } else {
                items.forEach((element, index) => {

                    if (index == i) {
                        element.classList.remove('next')
                        element.classList.remove('prev')
                        element.classList.add('on')
                    }
                    if (index == i-1) {
                        items.forEach(e => {
                    e.classList.remove('next')  
                })
                        element.classList.remove('on')
                        element.classList.remove('next')
                        element.classList.add('prev')

                    }
                    if (index == i + 1) {
                        element.classList.remove('prev')
                        element.classList.remove('on')
                        element.classList.add('next')

                    }
                })

            }
        })
    </script>
</body>

</html>
