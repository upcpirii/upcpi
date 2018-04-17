<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - UPC Portal</title>


    <link rel="stylesheet" href="{!! mix('css/vendor.css') !!}"/>
    <link rel="stylesheet" href="{!! mix('css/app.css') !!}"/>

</head>
<body>

<!-- Wrapper-->
<div id="wrapper">

    <!-- Navigation -->
    @include('layouts.navbar.side')

    <!-- Page wraper -->
    <div id="page-wrapper" class="gray-bg">

        <!-- Navigation top -->
        @include('layouts.navbar.top')

        <!-- Page header -->
        @yield('page-header')

        <!-- Main view  -->
        @yield('content')

        <!-- Footer -->
        @include('layouts.footer')

    </div>
    <!-- End page wrapper-->

</div>
<!-- End wrapper-->

<script src="{!! mix('js/app.js') !!}" type="text/javascript"></script>
@stack('scripts')

</body>
</html>
