@extends('layouts.dashboard')



@section('main.content')

                <x-public.dashboard.inc.header />

                <!-- Content -->

                <div class="row mt-0 mt-md-4">
                    <x-public.dashboard.inc.sidebar_teacher />
                    
                    <div class="col-lg-9 col-md-8 col-12">
                        


                            @yield('teacher.content')


                        
                    </div>
                </div>
                <script src="/assets/js/vendors/file-upload.js"></script>
                <script src="/assets/libs/file-upload-with-preview/dist/file-upload-with-preview.iife.js"></script>
@endsection