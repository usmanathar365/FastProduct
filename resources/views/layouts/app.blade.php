<!doctype html>
    <html lang="en" dir="ltr" data-scompiler-id="0">
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <meta name="format-detection" content="telephone=no" />
            <meta name="csrf-token" content="{{ csrf_token() }}"> 
        <title>Stroyka Admin - eCommerce Dashboard Template</title>
        <!-- icon -->
        <link rel="icon" type="image/png" href="images/favicon.png" />
        <!-- fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" />
        <!-- css -->
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.ltr.css" />
        <link rel="stylesheet" href="vendor/highlight.js/styles/github.css" />
        <link rel="stylesheet" href="vendor/simplebar/simplebar.min.css" />
        <link rel="stylesheet" href="vendor/quill/quill.snow.css" />
        <link rel="stylesheet" href="vendor/air-datepicker/css/datepicker.min.css" />
        <link rel="stylesheet" href="vendor/select2/css/select2.min.css" />
        <link rel="stylesheet" href="vendor/datatables/css/dataTables.bootstrap5.min.css" />
        <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css" />
        <link rel="stylesheet" href="vendor/fullcalendar/main.min.css" />
        <link rel="stylesheet" href="css/style.css" />
    </head>
<body> 
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{'Stroyka Admin - eCommerce Dashboard Template'}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
                    <ul class="navbar-nav me-auto">

                    </ul> 
                    <ul class="navbar-nav ms-auto"> 
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif 
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a> 
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
     <!-- scripts -->
     <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/feather-icons/feather.min.js"></script>
        <script src="vendor/simplebar/simplebar.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/highlight.js/highlight.pack.js"></script>
        <script src="vendor/quill/quill.min.js"></script>
        <script src="vendor/air-datepicker/js/datepicker.min.js"></script>
        <script src="vendor/air-datepicker/js/i18n/datepicker.en.js"></script>
        <script src="vendor/select2/js/select2.min.js"></script>
        <script src="vendor/fontawesome/js/all.min.js" data-auto-replace-svg="" async=""></script>
        <script src="vendor/chart.js/chart.min.js"></script>
        <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/js/dataTables.bootstrap5.min.js"></script>
        <script src="vendor/nouislider/nouislider.min.js"></script>
        <script src="vendor/fullcalendar/main.min.js"></script>
        <script src="js/stroyka.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/calendar.js"></script>
        <script src="js/demo.js"></script>
        <script src="js/demo-chart-js.js"></script>
</body>
</html>
