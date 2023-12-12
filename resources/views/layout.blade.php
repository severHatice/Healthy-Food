<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Healty Foods</title>

    {{-- Bootstrap Link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Poppins:ital,wght@0,200;0,300;0,400;1,200&family=Roboto:ital,wght@0,400;1,300&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    {{-- font-family: 'Montserrat', sans-serif;
         font-family: 'Poppins', sans-serif;
         font-family: 'Roboto', sans-serif; --}}


    {{-- icons-fontawesome --}}
    {{-- my kit --}}
    <script src="https://kit.fontawesome.com/7fe229702a.js" crossorigin="anonymous"></script>

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

    {{-- ********************************************* --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!--Theme custom css color template is here-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('css/homepage/about.css') }}">

    <!--Theme custom css -->
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    <!--Theme custom css login-->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    {{-- custon css --}}
    <link rel="stylesheet" href="{{ asset('css/homepage/contact.css') }}">

    <!--Theme Responsive css-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />
    {{-- custom card-recipe css --}}
    <link rel="stylesheet" href="{{ asset('css/card-recipe.css') }}">

    {{-- footer link --}}
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    {{-- db-recipes --}}
    <link rel="stylesheet" href="{{ asset('css/homepage/db-recipes.css') }}">
    {{-- custom card-recipe css --}}
    <link rel="stylesheet" href="{{ asset('css/recipes/card-recipe.css') }}">

    {{-- custom card-container css --}}
    <link rel="stylesheet" href="{{ asset('css/recipes/card-container.css') }}">
    <link rel="stylesheet" href="{{asset('css/recipes/recipe-detail.css')}}">

        {{-- tailwind library --}}
        <script src="https://cdn.tailwindcss.com"></script>
        {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>

    <header id="home" class="navbar-fixed-top">
        <div class="main_menu_bg">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <img src="/images/logo5.png" alt="logo-foods" class="logo">
                                <ul class="nav navbar-nav navbar-right">

                                    <li><a href="/">Home</a></li>
                                    <li><a href="#recipes">Recipes</a></li>
                                    <li><a href="#about">About</a></li>
                                    <li><a href="#calorieTracker">Calories</a></li>
                                    <li><a href="#contact">Contact</a></li>
                                    @auth
                                        <li><a href="/user/dashboard">{{ Auth::user()->username }}</a></li>
                                        @if (Auth::user()->admin)
                                            <li><a href="/admin/dashboard">Dashboard</a></li>
                                        @endif

                                        <li class="notifications-mail">
                                            <a href="#" class="site-cart">
                                                <i class="fa-solid fa-envelope"></i>
                                                <span class="count">2</span>
                                            </a>
                                        </li>

                                        <form method="POST" action="/logout">
                                            @csrf

                                            <button class="logout">
                                                <i class="fa-solid fa-right-from-bracket"></i>Logout
                                            </button>
                                        </form>
                                    @else
                                        <li><a href="/login">Login</a></li>
                                        <li><a href="{{ Route('registerForm') }}">Register</a></li>
                                    @endAuth

                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        @extends('partials/footer');
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>
