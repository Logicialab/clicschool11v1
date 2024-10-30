<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Abdel Jalil" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/lg.png" />

    <!-- darkmode js -->

    <!-- Libs CSS -->
    <link href="/assets/fonts/feather/feather.css" rel="stylesheet" />
    <link href="/assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="/assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/assets/css/theme-rtl.min.css">


    <title>@yield('title', 'Clic School')</title>
</head>

<body>
    <!-- Page content -->
    @include('inc.public.navbar')

    <main>
        <section class="pt-5 pb-5">
            <div class="container">
                @yield('main.content')
            </div>
        </section>

    </main>
    <!-- Footer -->
    <!-- Footer -->
    @include('inc.public.footer')

    <!-- Scroll top -->
    <!-- Scroll Top -->
    <div class="btn-scroll-top">
        <svg class="progress-square svg-content" width="100%" height="100%" viewBox="0 0 40 40">
            <path
                d="M8 1H32C35.866 1 39 4.13401 39 8V32C39 35.866 35.866 39 32 39H8C4.13401 39 1 35.866 1 32V8C1 4.13401 4.13401 1 8 1Z" />
        </svg>
    </div>

    <!-- Scripts -->
    <!-- Libs JS -->
    <script src="/assets/libs/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/assets/libs/simplebar/dist/simplebar.min.js"></script>

    <!-- Theme JS -->
    <script src="/assets/js/theme.min.js"></script>

</body>

</html>