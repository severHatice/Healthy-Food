<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Healty Foods</title>
    {{-- Bootstrap Link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/7fe229702a.js" crossorigin="anonymous"></script>

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

    {{-- custon css --}}
    <link rel="stylesheet" href="{{ asset('css/user-dashboard/user-layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- custom card-recipe css --}}
    <link rel="stylesheet" href="{{ asset('css/recipes/card-recipe.css') }}">
    <!--Theme custom css createRecipe-->
    <link rel="stylesheet" href="{{ asset('css/recipes/create-recipe.css') }}">
    {{-- custom card-container css --}}
    <link rel="stylesheet" href="{{ asset('css/recipes/card-container.css') }}">

        
    {{-- tailwind library --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}

        {{-- recipe-detail custom css --}}
        <link rel="stylesheet" href="{{ asset('css/recipes/recipe-detail.css') }}">

    {{-- swiper css link --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    {{-- custom swiper css --}}
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}">

        {{-- jquerry added for likes  --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

    <header>
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index.html"><img src="/images/logo5.png" alt="#" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="header_information">
                            <nav class="navigation navbar navbar-expand-md navbar-dark ">
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarsExample04" aria-controls="navbarsExample04"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class=" navbar-collapse" id="navbarsExample04">
                                    {{-- collapse is deleted in up --}}
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Hello {{ Auth::user()->username }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/">Home</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="#">notifications</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#recipes">Recipes</a>
                                        </li>
                                        <li class="notifications-mail">
                                            <a href="#" class="site-cart">
                                                <i class="fa-solid fa-envelope"></i>
                                                <span class="count">2</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="sign_btn"><a href="{{ route('createRecipeForm') }}">Create Recipes</a>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    {{-- swiper js --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    {{-- swiper js code  --}}
    <script>
        const swiper = new Swiper('.swiper', {
            slidesPerView: 3,
            centeredSlides: true,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                type: 'bullets',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>



</body>

</html>
