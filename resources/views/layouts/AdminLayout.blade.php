<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('sass/adminlayout.css') }}">
    @yield('meta')
</head>

<body>
    <div class="wrapper">
        <div class="sidebar-placeholder ">

        </div>
        <div class="main">
            @yield('main')
        </div>
        <div class="sidebar">
            <div class="header">
                <div class="logo ">
                    <img src="{{ asset('img/globals/logo.png') }}" alt="">
                    <h1>Ath<span>LIT</span>ic</h1>
                </div>
            </div>
            <div class="navigation">
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}"
                            class="
                    @if (Route::current()->getName() == 'admin.dashboard') selected @endif
                    "><i
                                class="bi bi-speedometer"></i><span>Dashboard</span></a></li>
                    <li><a href="{{ route('admin.ProductsManagement') }}" class="
                        @if (Route::current()->getName() == 'admin.ProductsManagement') selected @endif
                        "><i
                                class="bi bi-shop"></i><span>Products Management</span></a></li>
                    <li><a href="" class=""><i class="bi bi-collection"></i><span>Collection
                                Management</span></a></li>
                    <li><a href="" class=""><i class="bi bi-people"></i><span>Users List</span></a></li>
                    <li><a href="" class=""><i class="bi bi-list-ol"></i><span>Orders</span></a></li>
                </ul>
            </div>
            <div class="logout">
                <ul>
                    <li><button class="custom-button sidebar-toggler"><i class="bi bi-arrow-right-square"></i></button>
                    </li>
                    <li><a href="{{ route('admin.logout') }}"><i
                                class="bi bi-box-arrow-right"></i><span>Logout</span></a></li>
                </ul>
            </div>
        </div>

    </div>
    @yield('script')
    <script>
        const toggler = document.querySelector('.sidebar-toggler')
        const sidebar = document.querySelector('.sidebar')
        const togglerIcon = document.querySelector('.bi-arrow-right-square')
        toggler.addEventListener('click', () => {
            sidebar.classList.toggle('extend')
            toggler.classList.toggle('extend')
            togglerIcon.classList.toggle('extend')
        })
    </script>
</body>

</html>
