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
        <main>
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
