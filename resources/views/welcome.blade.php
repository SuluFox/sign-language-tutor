<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-primary">
        <div class="container">
            <nav class="navbar navbar-dark navbar-expand-lg py-0 d-flex justify-content-between">
                <a href="{{ route('welcome') }}" class="navbar-brand">
                    <h1 class="text-white fw-bold d-block">Sign<span class="text-secondary">Lingo</span> </h1>
                </a>
                <div class="float-right">
                    @auth
                        <button type="button" class="btn btn-outline-danger"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <span>{{ __('Logout') }}</span>
                        </button>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endauth

                </div>

            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <div class="container-fluid px-0">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="First slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="{{ asset('img/carousel-1.jpg') }}" class="img-fluid" alt="First slide">
                    <div class="carousel-caption">
                        <div class="container carousel-content">
                            <h6 class="text-secondary h4 animated fadeInUp">Sign Language Solutions</h6>
                            <h1 class="text-white display-1 mb-4 animated fadeInRight">An Innovative Way of Learning
                                Sign Language.
                            </h1>
                            <p class="mb-4 text-white fs-5 animated fadeInDown">We provide you with all the bases needed
                                to kick start your journey to a whole new world of communication.</p>
                            @auth
                                <a href="{{ route('home') }}" class="ms-2"><button type="button"
                                        class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn2 animated fadeInRight">

                                        @if (auth()->user()->isAdmin)
                                            Dashboard
                                        @else
                                            Continue
                                            Learning
                                        @endif

                                    </button></a>
                            @else
                                <a href="{{ route('home') }}" class="ms-2">
                                    <button type="button"
                                        class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn2 animated fadeInRight">
                                        Start
                                        Learning
                                    </button>
                                </a>
                            @endauth

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src=" {{ asset('img/carousel-2.jpg') }}" class="img-fluid" alt="Second slide">
                    <div class="carousel-caption">
                        <div class="container carousel-content">
                            <h6 class="text-secondary h4 animated fadeInUp">Sign Language Solutions</h6>
                            <h1 class="text-white display-1 mb-4 animated fadeInLeft">All You Need to Know to Master the
                                Signs.</h1>
                            <p class="mb-4 text-white fs-5 animated fadeInDown">Master all the sign from our learning
                                platform, here you get to learn all the basic things in sign languaging. After a
                                completion of our programms you would be a pro at communicatinn in signs.</p>
                            @auth
                                <a href="{{ route('home') }}" class="ms-2"><button type="button"
                                        class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn2 animated fadeInRight">
                                        @if (auth()->user()->isAdmin)
                                            Dashboard
                                        @else
                                            Continue
                                            Learnig
                                        @endif

                                    </button></a>
                            @else
                                <a href="{{ route('home') }}" class="ms-2"><button type="button"
                                        class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn2 animated fadeInRight">Start
                                        Learnig</button></a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Carousel End -->


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
