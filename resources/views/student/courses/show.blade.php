@section('title', 'Home student')

@extends('layouts.student')



@section('student.content')

<div class="card" bis_skin_checked="1">
    <!-- Card header -->
    <div class="card-header" bis_skin_checked="1">
        <h3 class="mb-0">{{ $course->title ?? '' }}</h3>
        <p class="mb-0">{{ $course->teacher ? $course->teacher->name." ".$course->teacher->name :''}}</p>
        <p class="mb-0">{{ $course->description }}</p>
    </div>
    <!-- Card body -->
    <div class="card-body" bis_skin_checked="1">
        <div class="row mb-5" bis_skin_checked="1">
            <!-- Twitter -->
            <!-- <div class="col-lg-3 col-md-4 col-12" bis_skin_checked="1">
                <h5>تويتر</h5>
            </div> -->
            <div class="col-lg-9 col-md-8 col-12" bis_skin_checked="1">
                
                <small>{!! $course->body !!}</small>
            </div>
        </div>
        {{-- <div bis_skin_checked="1">
                    <a href="{{ route('student.course.show', $course->slug) }}" class="btn btn-primary d-none w-20 d-md-block">العودة</a>
                </div> --}}
        
    </div>
</div>

@endsection