<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>

<body>
    <div id="show_menuitems" class="my-menu">
        <div class="menu-box">
            <span>
                <i onclick="hide_menu()" class="flaticon-cancel"></i>
            </span>
            <ul>
                <li><a onclick="hide_menu()" href="profile.html">Profile</a></li>
                <li><a onclick="hide_menu()" href="">Logout</a></li>
            </ul>
        </div>
    </div>

    <section id="home">
        <header>
            <div class="container">
                <div class="main-nav">
                    <div class="logo">
                        <h2>Sign<span style="color: rgb(52, 239, 176);">Lingo</span></h2>
                    </div>
                    <div onclick="show_menu()" class="my-toogle">
                        <span><i class="flaticon-menu"></i></span>
                    </div>
                </div>
            </div>
        </header>

        <div class="container">
            <div class="row">
                <div class="my-wrapper">
                    <div class="welcome-box">
                        <h3>A Step in the right Direction<span>Select a Category</span></h3>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="levels.html" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Alphabets</h5>
                        <p class="card-text">Begin your Journey into Dimensions of Communication <br> <br> </p>
                        <a href="#" class="btn btn-primary">Lets Go!!!</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="levels.html" class="card-img-top">
                    <div class="card-body disabled">
                        <h5 class="card-title">Words</h5>
                        <p class="card-text" style="color: #4f4f4f;">Comming Soon <br> <br> <br> <br> </p>
                        <a href="#" class="btn btn-primary disabled">Lets Go!!!</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="levels.html" class="card-img-top">
                    <div class="card-body disabled">
                        <h5 class="card-title">Advanced</h5>
                        <p class="card-text" style="color: #4f4f4f;">Comming Soon <br> <br> <br> <br> </p>
                        <a href="#" class="btn btn-primary disabled">Lets Go!!!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
</body>

</html>