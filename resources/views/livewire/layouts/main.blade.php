<html lang="ar" dir="rtl">

<head>
    <link rel="stylesheet" href="/assets/libs/quill/dist/quill.snow.css" />
	<link rel="stylesheet" href="/assets/libs/glightbox/dist/css/glightbox.min.css" />
	<link rel="stylesheet" href="/assets/libs/bs-stepper/dist/css/bs-stepper.min.css" />
	<link rel="stylesheet" href="/assets/libs/flatpickr/dist/flatpickr.min.css" />

    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Abdel Jalil" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/lgg.png" />

    <!-- darkmode js -->
    

    <!-- Libs CSS -->
    <link href="/assets/fonts/feather/feather.css" rel="stylesheet" />
    <link href="/assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="/assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/assets/css/theme-rtl.min.css">

    <link href="/assets/libs/@yaireo/tagify/dist/tagify.css" rel="stylesheet " />
	<link href="/assets/libs/dragula/dist/dragula.min.css" rel="stylesheet " />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />


    <title>@yield('title', 'Clic School')</title>
</head>

<body>
    <!-- Page content -->
    @include('inc.public.navbar')

    <main>
        
        <section class="pt-5 pb-5">
            <div class="">
                {{ $slot }}
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



    <script src="/assets/libs/file-upload-with-preview/dist/file-upload-with-preview.iife.js"></script>
	<script src="/assets/libs/@yaireo/tagify/dist/tagify.min.js"></script>



	<script src="/assets/libs/quill/dist/quill.min.js"></script>
	<script src="/assets/libs/dragula/dist/dragula.min.js"></script>

	<script src="/assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
	<script src="/assets/js/vendors/beStepper.js"></script>
	<script src="/assets/js/vendors/customDragula.js"></script>
	<script src="/assets/js/vendors/editor.js"></script>

    <script src="/assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>

	{{-- <script src="/assets/js/vendors/file-upload.js"></script> --}}
    <script src="/assets/js/vendors/tooltip.js"></script>
	<script src="/assets/libs/glightbox/dist/js/glightbox.min.js"></script>
	<script src="/assets/js/vendors/glight.js"></script>


    <script src="/assets/libs/flatpickr/dist/flatpickr.min.js"></script>
	<script src="/assets/js/vendors/flatpickr.js"></script>

</body>

</html>