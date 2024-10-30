@section('title', 'Home teacher')

@extends('layouts.teacher')



@section('teacher.content')

<div class="card mb-4" bis_skin_checked="1">
    <!-- card body -->
    <div class="card-body" bis_skin_checked="1">
        <div class="d-flex align-items-center" bis_skin_checked="1">
            <!-- img -->
            <img src="/storage/{{$course->image}}" class="avatar-xl rounded-circle" alt="">
            <div class="ms-4" bis_skin_checked="1">
                <!-- text -->
                <h3 class="mb-1">{{$course->title}}</h3>
                <div bis_skin_checked="1">
                    <span>
                        <i class="fe fe-calendar me-2"></i>
                        {{$course->description}}
                    </span>
                    <span class="ms-3">
                        <i class="fe fe-map-pin me-2"></i>
                        الأستاذ :  {{$course->teacher->name." ".$course->teacher->name}}
                    </span>
                </div>
                <a href="{{ route('student.course.show_show', $course->slug) }}" class="btn btn-primary w-50 d-none d-md-block">قراءة الدرس</a>
            </div>
        </div>
    </div>
    <!-- card body -->
    
</div>


<div class="card rounded-3" bis_skin_checked="1">
    <!-- Card header -->
    <div class="card-header p-0" bis_skin_checked="1">
        <div bis_skin_checked="1">
            <!-- Nav -->
            <ul class="nav nav-lb-tab border-bottom-0" id="tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="files-tab" data-bs-toggle="pill" href="#files" role="tab"
                        aria-controls="files" aria-selected="true">الملفات</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="exercises-tab" data-bs-toggle="pill" href="#exercises" role="tab"
                        aria-controls="exercises" aria-selected="true">التمارين</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="quizs-tab" data-bs-toggle="pill" href="#quizs" role="tab"
                        aria-controls="quizs" aria-selected="false" tabindex="-1">الاختبارات</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="lives-tab" data-bs-toggle="pill" href="#lives" role="tab"
                        aria-controls="lives" aria-selected="false" tabindex="-1">البث المباشر</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- <div class="p-4 row" bis_skin_checked="1">
        
        <form class="d-flex align-items-center col-12 col-md-12 col-lg-12">
            <span class="position-absolute ps-3 search-icon"><i class="fe fe-search"></i></span>
            <input type="search" class="form-control ps-6" placeholder="Search Course">
        </form>
    </div> -->
    <div bis_skin_checked="1">
        <!-- Table -->
        <div class="tab-content" id="tabContent" bis_skin_checked="1">
            <!--Tab pane -->
            <div class="tab-pane fade show active" id="files" role="tabpanel" aria-labelledby="files-tab"
                bis_skin_checked="1">
                <div class="table-responsive border-0 overflow-y-hidden" bis_skin_checked="1">
                    <table class="table mb-0 text-nowrap table-centered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>العنوان</th>
                                <th>تحميل</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($course->files as $file)
                            <tr>
                                <td>
                                        <div class="d-flex align-items-center" bis_skin_checked="1">
                                            
                                            <div class="ms-3" bis_skin_checked="1">
                                                <h4 class="mb-1 text-primary-hover">{{$file->title}}</h4>
                                                <span>{{$file->created_at}}</span>
                                            </div>
                                        </div>
                                </td>
                                <td>
                                    <!-- <a href="#" class="btn btn-outline-secondary btn-sm">Reject</a> -->
                                    <a href="/storage/{{ $file->file }}" class="btn btn-success btn-sm">تحميل</a>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--Tab pane -->
            <div class="tab-pane fade" id="exercises" role="tabpanel" aria-labelledby="exercises-tab"
                bis_skin_checked="1">
                <div class="table-responsive border-0 overflow-y-hidden" bis_skin_checked="1">
                    <table class="table mb-0 text-nowrap table-centered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>العنوان</th>
                                <th>ترتيب</th>
                                <th>تحميل</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($course->exercices as $exercice)
                            <tr>
                                <td>
                                        <div class="d-flex align-items-center" bis_skin_checked="1">
                                            <div class="ms-3" bis_skin_checked="1">
                                                <h4 class="mb-1 text-primary-hover">{{ $exercice->title }}</h4>
                                                <span>{{ $exercice->created_at }}</span>
                                            </div>
                                        </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center" bis_skin_checked="1">
                                        <h5 class="mb-0">{{ $exercice->order }}</h5>
                                    </div>
                                </td>
                                <td>
                                    <a href="/storage/{{ $exercice->file }}" class="btn btn-success btn-sm">تحميل</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--Tab pane -->
            <div class="tab-pane fade" id="quizs" role="tabpanel" aria-labelledby="quizs-tab"
                bis_skin_checked="1">
                <div class="table-responsive border-0 overflow-y-hidden" bis_skin_checked="1">
                    <table class="table mb-0 text-nowrap table-centered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>ترتيب</th>
                                <th>العنوان</th>
                                <th>الوصف</th>
                                <th>اختبار</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($course->quizzes as $quiz)
                            <tr>
                                <td>
                                    {{ $quiz->order }}
                                </td>
                                <td>
                                    <a href="#" class="text-inherit">
                                        <div class="d-flex align-items-center" bis_skin_checked="1">
                                            <div class="ms-3" bis_skin_checked="1">
                                                <h4 class="mb-1 text-primary-hover">{{ $quiz->name }}</h4>
                                                <span>{{ $quiz->created_at }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    {{ $quiz->description }}
                                </td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm">الدخول الى الاختبار</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--Tab pane -->
            <div class="tab-pane fade" id="lives" role="tabpanel" aria-labelledby="lives-tab" bis_skin_checked="1">
                <div class="table-responsive border-0 overflow-y-hidden" bis_skin_checked="1">
                    <table class="table mb-0 text-nowrap table-centered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>البث المباشر</th>
                                <th>الأستاذ</th>
                                <th>المقرر في</th>
                                <th>المدة</th>
                                <th>url الرابط</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($course->lives as $live)
                            <tr>
                                <td>
                                    <a href="{{ $live->url }}" class="text-inherit">
                                        <div class="d-flex align-items-center" bis_skin_checked="1">
                                            <div bis_skin_checked="1">
                                                <img src="/storage/{{$live->image}}" alt=""
                                                    class="img-4by3-lg rounded">
                                            </div>
                                            <div class="ms-3" bis_skin_checked="1">
                                                <h4 class="mb-1 text-primary-hover">{{$live->title}}</h4>
                                                <span>{{$live->created_at}}</span>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center" bis_skin_checked="1">
                                        <h5 class="mb-0">{{$live->teacher->name." ".$live->teacher->name}}</h5>
                                    </div>
                                </td>
                                <td>
                                    {{$live->scheduled_at}}
                                </td>
                                <td>
                                    {{$live->duration}}
                                </td>
                                <td>
                                    <a href="{{ $live->url }}" class="btn btn-success btn-sm">الرابط</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Card Footer -->
    <!-- <div class="card-footer" bis_skin_checked="1">
        <nav>
            <ul class="pagination justify-content-center mb-0">
                <li class="page-item disabled">
                    <a class="page-link mx-1 rounded" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor"
                            class="bi bi-chevron-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="page-item active">
                    <a class="page-link mx-1 rounded" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link mx-1 rounded" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link mx-1 rounded" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link mx-1 rounded" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor"
                            class="bi bi-chevron-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                            </path>
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
    </div> -->
</div>


@endsection