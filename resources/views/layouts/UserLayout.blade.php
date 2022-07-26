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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    @yield('meta')
</head>

<body>
    <div class="modal fade" id="Cart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class=" cart">
                    <h1 class="text-center"><i class="bi bi-cart "></i> My cart</h1>
                    <ul>
                        <li class="text-center cart-count-inside" style="list-style: none">{{ $cartCount }} Items
                        </li>
                        @if ($cart)
                            <table class="custom-table">
                                <thead>
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Price
                                        </th>
                                        <th>
                                            Quantity
                                        </th>
                                        <th>
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    @foreach ($cart as $item)
                                        <tr>
                                            <td>
                                                {{ $item->name }}
                                            </td>
                                            <td>${{ $item->price }}</td>
                                            <td>
                                                {{ $item->qty }}
                                            </td>
                                            <td>${{ $item->priceTotal }}</td>
                                            <td><button class="close-button remove-item" onclick="removeItem(this)"
                                                    data-id="{{ $item->rowId }}"><i class="bi bi-x-lg"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No items in cart currently</p>
                        @endif

                    </ul>
                    <div class="d-flex justify-content-between mt-3 align-items-center">
                        <p class="m-0 totalprice">Total : ${{ $total }}</p>
                        <form action="{{ route('user.checkout') }}"><button class="custom-button"
                                id="checkout-button">Checkout</button></form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-wrapper">
        <div class="container">
            <nav>
                <div class="logo">
                    <img src="{{ asset('img/globals/logo.png') }}" alt="">
                    <h1>Ath<span>LIT</span>ic</h1>
                </div>
                <div class="nav-buttons">
                    <button class="close-button" id="cart-toggle" data-bs-toggle="modal" data-bs-target="#Cart"><i
                            class="bi bi-cart"></i> <span class="cart-count">{{ $cartCount }}</span></button>
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
                <form action="{{ route('user.shop') }}" style="margin-left:auto">
                    <input type="search" class="custom-input" name="keyword" placeholder="Search for an item ...">
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
                <div class="footer-aligner">
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
                <p style="text-align: center;margin:1.5rem 0 0 0 ">© 2022 <a href="" class="signature">Yaou
                        Mourad</a> - All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"
        integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const checkoutbutton = document.querySelector('#checkout-button')
        let count = '{{ $cartCount }}'
        if (!parseInt(count)) {
            checkoutbutton.disabled = true
        }
    </script>
    <script>
        const btns = document.querySelectorAll('.add-to-cart-btn')
        const body = document.querySelector('.table-body')
        const totalprice = document.querySelector('.totalprice')
        btns.forEach(e => {
            e.addEventListener('click', () => {
                axios.post('add-to-cart', {
                    id: e.dataset.id,
                }).then((res) => {
                    if (res.status == 200) {
                        body.textContent = ''
                        Object.values(res.data[0]).forEach(e => {

                            let tuple = document.createElement('tr')
                            tuple.innerHTML =
                                ` <td>
                                                ${ e.name }
                                            </td>
                                            <td>$${ e.price }</td>
                                            <td>
                                                ${ e.qty }
                                            </td>
                                            <td>$${ Math.round(e.price*e.qty*100)/100 }</td>
                                            <td><button class="close-button remove-item" onclick="removeItem(this)" data-id="${ e.rowId }"><i class="bi bi-x-lg"></i></button></td>`

                            body.appendChild(tuple)
                        })

                        Toastify({
                            text: "Item added successfully",
                            duration: 3000,
                            position: 'center',
                            close: true,
                            style: {
                                background: "#FC7171",
                            },
                        }).showToast();
                        totalprice.textContent = `Total : $${Math.round(res.data[2]*100)/100}`
                        document.querySelector('.cart-count').textContent = res.data[1]
                        document.querySelector('.cart-count-inside').textContent = res.data[1] +
                            ' Items'
                            checkoutbutton.disabled = false
                    } else {
                        console.log(res.status)
                    }
                })
            })
        })
    </script>

    <script>
        function removeItem(e) {
            axios.post('http://localhost:8000/user/remove-from-cart', {
                id: e.dataset.id,
            }).then((res) => {

                if (res.status == 200) {
                    body.textContent = ''
                    Object.values(res.data[0]).forEach(e => {

                        let tuple = document.createElement('tr')
                        tuple.innerHTML =
                            ` <td>
                                                ${ e.name }
                                            </td>
                                            <td>$${ e.price }</td>
                                            <td>
                                                ${ e.qty }
                                            </td>
                                            <td>$${ Math.round(e.price*e.qty*100)/100 }</td>
                                            <td><button class="close-button remove-item" onclick="removeItem(this)" data-id="${ e.rowId }"><i class="bi bi-x-lg"></i></button></td>`

                        body.appendChild(tuple)
                    })

                    Toastify({
                        text: "Item removed",
                        duration: 3000,
                        position: 'center',
                        close: true,
                        style: {
                            background: "#FC7171",
                        },
                    }).showToast();
                    totalprice.textContent = `Total : $${Math.round(res.data[2]*100)/100}`
                    document.querySelector('.cart-count').textContent = res.data[1]
                    document.querySelector('.cart-count-inside').textContent = res.data[1] +
                        ' Items'
                        if(!res.data[1]){
                            checkoutbutton.disabled=true
                        }
                } else {
                    console.log(res.status)
                }
            })
        }
    </script>




    @yield('script')

</body>

</html>
