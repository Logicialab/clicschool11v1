@section('title', 'Home tetcher')

@extends('layouts.student')



@section('student.content')
<!-- Card -->
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
        <h3 class="mb-0">الدروس للمادة {{$subject->title}}</h3>
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
    <div class="table-responsive overflow-y-hidden">
        <table class="table mb-0 text-nowrap table-hover table-centered text-nowrap">
            <thead class="table-light">
                <tr>
                    <th>الدروس</th>
                    <th>المدرس</th>
                    <th>التقييمات</th>
                    <th>الحالة</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($subject->unitCourses as $unitCourse)
                <tr>
                    <td>
                        <a href="{{ route('student.course.show', $unitCourse->slug) }}">
                            <div class="d-flex align-items-center">
                                <div>
                                    
                                        <img src="/storage/{{$unitCourse->image}}" alt="course"
                                            class="rounded img-4by3-lg">
                                    
                                </div>
                                <div class="ms-3">
                                    <h4 class="mb-1 h5">
                                        <a href="{{ route('student.course.show', $unitCourse->slug) }}" class="text-inherit">{{$unitCourse->title}}</a>
                                    </h4>
                                </div>
                            </div>
                        </a>
                    </td>
                    <td></td>
                    <td>
                        <span class="lh-1">
                            <span class="text-warning">4.5</span>
                            <span class="mx-1 align-text-top">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor"
                                    class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                </svg>
                            </span>
                            (3,250)
                        </span>
                    </td>
                    <td>
                        <span class="badge bg-success"> {{$unitCourse->status}} </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection