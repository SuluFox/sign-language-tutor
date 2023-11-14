<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/admincss/css/dataTables.bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admincss/css/style.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
            </button>
            <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="topNavBar">
                <ul class="navbar-nav ms-auto my-3 my-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>

                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('home') }}">
                                    {{ __('Dashboard') }}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('levels') }}">
                                    {{ __('Course Levels') }}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('admin.users')}}">
                                    {{ __('Users') }}
                                </a>
                            </li>

                            <li>
                                <a class=" dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li class="my-4">
                        <hr class="dropdown-divider bg-light" />
                    </li>
                    <li>
                        <a href="{{ route('home') }}" class="nav-link px-3">
                            <span class="me-2"><i class="fas fa-tachometer-alt"></i></span>
                            <span>Dashboard</span>
                        </a>

                    </li>
                    <li>
                        <a href="{{ route('levels') }}" class="nav-link px-3">
                            <span class="me-2"><i class="fas fa-chart-line"></i></span>
                            <span>Course Levels</span>
                        </a>

                    </li>
                    <li>
                        <a href="{{route('admin.users')}}" class="nav-link px-3">
                            <span class="me-2"><i class="fas fa-users"></i></span>
                            <span>Users</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <main class="mt-5 pt-3">
        @yield('content')
    </main>

    @if (Session::has('success'))
    <script>
        swal("Success", "{{ Session::get('success') }}", 'success', {
            button: "OK",
            // timer: 3000,
        });
    </script>
    @endif
    @if (Session::has('info'))
    <script>
        swal("Information", "{{ Session::get('info') }}", 'info', {
            button: "OK",
            // timer: 3000,
        });
    </script>
    @endif
    @if (Session::has('error'))
    <script>
        swal("Error", "{{ Session::get('error') }}", 'error', {
            button: "OK",
            // timer: 3000,
            dangerMode: true,
        });
    </script>
    @endif
    <script src="{{ asset('js/adminjs/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{ asset('js/adminjs/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/adminjs/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/adminjs/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/adminjs/js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>