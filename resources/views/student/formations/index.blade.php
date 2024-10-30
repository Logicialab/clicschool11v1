@section('title', 'Home student')

@extends('layouts.student')



@section('student.content')
<!-- Card -->
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header d-flex">
        <div class="col-md-10">
            <h3 class="mb-0">الدورات</h3>
            <span>إدارة دوراتك وتحديثاتها مثل الدورات المباشرة والمسودة والإرشادية.</span>
        </div>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <!-- Form -->
        <form class="row gx-3">
            <div class="col-lg-9 col-md-7 col-12 mb-lg-0 mb-2">
                <input type="search" class="form-control" placeholder="ابحث في الدورات التدريبية الخاصة بك">
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
                    <th>الدورات</th>
                    <th>الطلاب</th>
                    <th>التقييمات</th>
                    <th>الحالة</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($formations as $formation)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div>
                                <a href="{{ route('formation.show', $formation->slug) }}">
                                    <img src="/storage/{{ $formation->image}}" alt="course"
                                        class="rounded img-4by3-lg">
                                </a>
                            </div>
                            <div class="ms-3">
                                <h4 class="mb-1 h5">
                                    <a href="{{ route('formation.show', $formation->slug) }}" class="text-inherit">{{ \Illuminate\Support\Str::limit($formation->title, 50, '...') }}</a>
                                </h4>
                                <ul class="list-inline fs-6 mb-0">
                                    <li class="list-inline-item">
                                        <span class="align-text-bottom">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z">
                                                </path>
                                                <path
                                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z">
                                                </path>
                                            </svg>
                                        </span>
                                        @if($formation->teacher)
                                            <span>{{ $formation->teacher->name }}</span>
                                        @else
                                            <span>-</span>
                                        @endif
                                    </li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
                                            <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                                            <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                                        </svg>
                                        @if($formation->formationType)
                                            {{ $formation->formationType->name }}</span>
                                        @else
                                            -
                                        @endif
                                    </li>
                                    <li class="list-inline-item">
                                        <span class="align-text-bottom">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z">
                                                </path>
                                                <path
                                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z">
                                                </path>
                                            </svg>
                                        </span>
                                        
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                    <td>{{ optional($formation->formationParticipants)->count() }}</td>
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
                        <span class="badge bg-success">{{ $formation->status }}</span>
                    </td>
                    <td>
                        <span class="dropdown dropstart">
                            <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button"
                                id="courseDropdown" data-bs-toggle="dropdown" data-bs-offset="-20,20"
                                aria-expanded="false">
                                <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown">
                                <span class="dropdown-header">الإعدادات</span>
                                <a class="dropdown-item" href="#">
                                    <i class="fe fe-edit dropdown-item-icon"></i>
                                    تعديل </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fe fe-trash dropdown-item-icon"></i>
                                    ازالة </a>
                            </span>
                        </span>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

</div>
@endsection