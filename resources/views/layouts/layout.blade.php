<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset("assets/img/logo.png") }}">
    <link rel="icon" type="image/png" href="{{ asset("assets/img/logo.png") }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>
        YA LLEGUE
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset("assets/css/material-dashboard.css?v=2.1.0") }}" rel="stylesheet"/>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset("assets/demo/demo.css") }}" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
</head>

<body class="">
    <div class="wrapper ">
        @yield('content')
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset("assets/js/core/jquery.min.js") }}"></script>
    <script src="{{ asset("assets/js/core/popper.min.js") }}"></script>
    <script src="{{ asset("assets/js/core/bootstrap-material-design.min.js") }}"></script>
    <script src="{{ asset("assets/js/plugins/perfect-scrollbar.jquery.min.js") }}"></script>
    <!-- Plugin for the momentJs  -->
    <script src="{{ asset("assets/js/plugins/moment.min.js") }}"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="{{ asset("assets/js/plugins/sweetalert2.js") }}"></script>
    <!-- Forms Validations Plugin -->
    <script src="{{ asset("assets/js/plugins/jquery.validate.min.js") }}"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="{{ asset("assets/js/plugins/jquery.bootstrap-wizard.js") }}"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="{{ asset("assets/js/plugins/bootstrap-selectpicker.js") }}"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="{{ asset("assets/js/plugins/bootstrap-datetimepicker.min.js") }}"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="{{ asset("assets/js/plugins/jquery.dataTables.min.js") }}"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="{{ asset("assets/js/plugins/bootstrap-tagsinput.js") }}"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="{{ asset("assets/js/plugins/jasny-bootstrap.min.js") }}"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="{{ asset("assets/js/plugins/fullcalendar.min.js") }}"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="{{ asset("assets/js/plugins/jquery-jvectormap.js") }}"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset("assets/js/plugins/nouislider.min.js") }}"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="{{ asset("assets/js/plugins/arrive.min.js") }}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="{{ asset("assets/js/plugins/chartist.min.js") }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset("assets/js/plugins/bootstrap-notify.js") }}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset("assets/js/material-dashboard.js?v=2.1.0") }}" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset("assets/demo/demo.js") }}"></script>
</body>

</html>