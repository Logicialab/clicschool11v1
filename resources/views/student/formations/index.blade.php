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
                    <th>العنوان</th>
                    <th>نوع التدريب                  </th>
                    <th>الأستاذ</th>
                    <th>السعر</th>
                </tr>
            </thead>
            <tbody>
                @foreach($formations_participant as $formation)
                @if($formation && $formation->formation)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div>
                                @if (file_exists($formation->formation->image))
                                <a href="{{ route('formation.show', $formation->formation->slug) }}">
                                    <img src="/storage/{{ $formation->formation->image}}" alt="course"
                                        class="rounded img-4by3-lg">
                                </a> 
                            @else
                            <a href="{{ route('formation.show', $formation->formation->slug) }}">
                                <img src="/assets/images/course/online_course.jpg" alt="course"
                                    class="rounded img-4by3-lg">
                            </a> 
                            @endif
                            </div>
                            <div class="ms-3">
                                <h4 class="mb-1 h5">
                                    <a href="{{ route('formation.show', $formation->formation->slug) }}" 
                                        class="text-inherit">{{ \Illuminate\Support\Str::limit($formation->formation->title, 50, '...') }}</a>
                                </h4>
                           
                            </div>
                        </div>
                    </td>
                    <td>
                        @if($formation->formation->formationType)
                        {{ $formation->formation->formationType->title }}</span>
                    @else
                        -
                    @endif


                    </td>
                    <td>
                        @if($formation->formation->teacher)
                                            <span>{{ $formation->formation->teacher->name }}</span>
                                        @else
                                            <span>-</span>
                                        @endif
                    </td>
                    <td>
                        @if($formation->formation)
                        {{ $formation->formation->price  }}</span>
                    @else
                         
                    @endif
                    </td>
                    
                </tr>
                @endif
                @endforeach
                
            </tbody>
        </table>
    </div>

</div>
@endsection