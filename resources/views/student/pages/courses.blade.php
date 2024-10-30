@section('title', 'الدروس')

@extends('layouts.student')



@section('student.content')
<!-- Card -->
<div class="card mb-4">
    <!-- Card header -->
    @if($subject)
    <div class="card-header">
       
        <h3 class="mb-0">الدروس لمادة {{$subject->title}}</h3>
        <span>{{$subject->discription}}</span>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <!-- Form -->
        <form class="row gx-3">
            <div class="col-lg-9 col-md-7 col-12 mb-lg-0 mb-2">
                <input type="search" class="form-control" placeholder="ابحث عن دروس">
            </div>
            <div class="col-lg-3 col-md-5 col-12">
                <select class="form-select">
                    <option value="">تاريخ الإنشاء</option>
                    <option value="Newest">الأحدث</option>
                    <option value="High Rated">تقييم عالي</option>
                    <option value="Law Rated">تصنيف ضعيف</option>
                    <option value="High Earned">دخل مرتفع</option>
                </select>
            </div>
        </form>
    </div>
    <!-- Table -->
     


  <!-- Table -->
  <div class="tab-content" bis_skin_checked="1">
    <!-- Tab pane -->
    <div class="tab-pane fade pb-4 active show" id="tabPaneGrid" role="tabpanel" aria-labelledby="tabPaneGrid"
        bis_skin_checked="1">
        <div class="row" bis_skin_checked="1">
            @foreach($subject->unitCourses as $unitCourse)
                <div class="col-lg-4 col-md-6 col-12" bis_skin_checked="1">
                    <!-- Card -->
                    <div class="card mb-4 card-hover" bis_skin_checked="1">
                       
                        <a href="{{ route('student.unitcourse.show', $unitCourse->slug) }}">
                    
                        @if (file_exists( $unitCourse->image))
                            <img src="/storage/{{$unitCourse->image}}" style="min-width: 100px">
                        @else
                            <img src="/assets/images/course/online_course.jpg">
                        @endif

                    </a>
                        <!-- Card body -->
                         <div class="card-body" bis_skin_checked="1">
                            <h4 class="mb-2 text-truncate-line-2"><a
                                    href="{{ route('student.unitcourse.show', $unitCourse->slug) }}"
                                    class="text-inherit">{{ $unitCourse->title }}</a></h4>
                            <!-- List inline -->
                            <ul class="mb-3 list-inline">
                                <li class="list-inline-item">

                                    <span>{{ $unitCourse->description }}</span>
                                </li>

                            </ul>
                        </div>
                       
                      
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @else
                           
    <h3 class="mb-0">لا يوجد دروس  في هذه المادة</h3> 
                        @endif
    @endsection