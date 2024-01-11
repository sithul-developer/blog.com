<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ !empty($active_class) ? $active_class : '' }} | Blog</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ url('./assets/img/favicon.png') }}" rel="icon">
    <link href="{{ url('./assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('./assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('./assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('./assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ url('./assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ url('./assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ url('./assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ url('./assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url('./assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Aug 30 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>
{{-- <div>
    <div class="loader">
        <p>Loading...</p>
    </div>
</div> --}}
<div class="content">
        <!-- ======= Header ======= -->
        @include('backend_master.layouts.navbar')
        <!-- End Header -->
        <!-- ======= Sidebar ======= -->
        @include('backend_master.layouts.sidebar')
        <!-- End Sidebar-->
        <main id="main" class="main">

            @yield('content')
        </main> <!-- End #main -->
        <!-- ======= Footer ======= -->
        @include('backend_master.layouts.footer')

    </div>
    <!-- End Footer -->
    <!-- Vendor JS Files -->
    <script src="{{ url('./assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ url('./assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('./assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ url('./assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ url('./assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ url('./assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ url('./assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ url('./assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ url('./assets/js/jquery.min.js') }}"></script>
 {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <!-- Template Main JS File -->
    <script src="{{ url('./assets/js/main.js') }}"></script>
    <script src="{{ url('./assets/js/multiselect-dropdown.js') }}"></script>
  {{--   <script>
        window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    loader.className += " hidden"; // class "loader hidden"
});
    </script> --}}

</body>

</html>


<style>
    .loader {
    position: fixed;
    z-index: 99;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: white;
    display: flex;
    justify-content: center;
    align-items: center;
}

.loader > img {
    width: 100px;
}

.loader.hidden {
    animation: fadeOut 1s;
    animation-fill-mode: forwards;
}

@keyframes fadeOut {
    100% {
        opacity: 0;
        visibility: hidden;
    }
}

.thumb {
    height: 100px;
    border: 1px solid black;
    margin: 10px;
}
</style>
