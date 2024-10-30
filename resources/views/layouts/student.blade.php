@extends('layouts.dashboard')



@section('main.content')

<x-public.dashboard.inc.header link="student" link_text="الطالب" />

                <!-- Content -->

                <div class="row mt-0 mt-md-4">
                    <x-public.dashboard.inc.sidebar_student />
                    
                    <div class="col-lg-9 col-md-8 col-12">
                        


                            @yield('student.content')


                        
                    </div>
                </div>
                
@endsection