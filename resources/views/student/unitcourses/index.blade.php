@section('title', 'الوحدات الدراسية')

@extends('layouts.student')



@section('student.content')


<!-- Card -->
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header d-flex">
        <div class="col-md-10">
            @if ($unitCourse && $unitCourse->classe)
            <h3 class="mb-0"> الوحدة الدراسية: {{$unitCourse->title}}</h3>
            <span>{{$unitCourse->classe->description}}</span><br>
            <span>{{$unitCourse->classe->title}}</span><br>
            <span>العام الدراسي : {{$unitCourse->classe->annee_scolaire}}</span>
            @else
            <h3 class="mb-0"> </h3>
            @endif
           
        </div>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <!-- Form -->
        <form class="row gx-3">
            <div class="col-lg-9 col-md-7 col-12 mb-lg-0 mb-2">
                <input type="search" class="form-control" placeholder="ابحث في المواد الدراسية الخاصة بك">
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
</div>
    <!-- Table -->

    <div class="tab-content" bis_skin_checked="1">
        <!-- Tab pane -->

        @if ($courses)
            
       
        <div class="tab-pane fade pb-4 active show" id="tabPaneGrid" role="tabpanel" aria-labelledby="tabPaneGrid"
            bis_skin_checked="1">
            <div class="row" bis_skin_checked="1">
                @foreach($courses as $course)
                <div class="col-lg-4 col-md-6 col-12" bis_skin_checked="1">
                    <!-- Card -->
                    <div class="card mb-4 card-hover" bis_skin_checked="1">
                        <a href="{{ route('student.course.show_show', $course->slug) }}">
                            @if (file_exists( $course->image))
                            <img src="/storage/{{$course->image}}" alt="course"
                                class="card-img-top">
                             
                            @else
                                <img src="/assets/images/course/online_course.jpg">
                            @endif
                            </a>
                        <!-- Card body -->
                        <div class="card-body" bis_skin_checked="1">
                            <h4 class="mb-2 text-truncate-line-2"><a href="{{ route('student.course.show_show', $course->slug) }}" class="text-inherit">{{$course->title}}</a></h4>
                            <!-- List inline -->
                            <ul class="mb-3 list-inline">
                                <li class="list-inline-item">
                                    
                                    <span>{{$course->description}}</span>
                                </li>
                                
                            </ul>
                        </div>
                        <!-- Card footer -->
                        
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        @else
            
        @endif
        <!-- Tab pane -->
        <div class="tab-pane fade pb-4" id="tabPaneList" role="tabpanel" aria-labelledby="tabPaneList"
            bis_skin_checked="1">
            <!-- Card -->
            <div class="card mb-4 card-hover" bis_skin_checked="1">
                <div class="row g-0" bis_skin_checked="1">
                    <a class="col-12 col-md-12 col-xl-3 col-lg-3 bg-cover img-left-rounded"
                        style="background-image: url(../assets/images/course/course-vue.jpg)" href="#">
                        <img src="/assets/images/course/course-vue.jpg" alt="..." class="img-fluid d-lg-none invisible">
                    </a>
                    <div class="col-lg-9 col-md-12 col-12" bis_skin_checked="1">
                        <!-- Card body -->
                        <div class="card-body" bis_skin_checked="1">
                            <h3 class="mb-2 text-truncate-line-2"><a href="#" class="text-inherit">Vue.js Components
                                    Fundamentals</a></h3>
                            <!-- List inline -->
                            <ul class="mb-5 list-inline">
                                <li class="list-inline-item">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            fill="currentColor" class="bi bi-clock align-baseline" viewBox="0 0 16 16">
                                            <path
                                                d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z">
                                            </path>
                                            <path
                                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z">
                                            </path>
                                        </svg>
                                    </span>
                                    <span>3h 56m</span>
                                </li>
                                <li class="list-inline-item">
                                    <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
                                        <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                                    </svg>
                                    Beginner
                                </li>
                                <li class="list-inline-item">
                                    <span class="align-text-top lh-1">
                                        <span class="fs-6">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg>
                                        </span>
                                    </span>

                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6">(9,300)</span>
                                </li>
                            </ul>
                            <!-- Row -->
                            <div class="row align-items-center g-0" bis_skin_checked="1">
                                <div class="col-auto" bis_skin_checked="1">
                                    <img src="/assets/images/avatar/avatar-3.jpg" class="rounded-circle avatar-xs"
                                        alt="">
                                </div>
                                <div class="col ms-2" bis_skin_checked="1">
                                    <span>Morris Mccoy</span>
                                </div>
                                <div class="col-auto" bis_skin_checked="1">
                                    <a href="#" class="text-reset bookmark">
                                        <i class="fe fe-bookmark fs-4"></i>
                                    </a>
                                </div>
                            </div>
                            <div bis_skin_checked="1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection