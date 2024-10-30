@section('title', 'Home tetcher')

@extends('layouts.student')



@section('student.content')
<!-- Card -->
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header d-flex align-items-center justify-content-between">
        <div>
            <h3 class="mb-0">المسابقات</h3>
        </div>
    </div>
    <!-- Card body -->
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-centered text-nowrap">
                <tbody>
                    @foreach($classe->competitions as $competition)
                    <tr>
                        <td>{{$competition->order}}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!-- quiz img -->
                                <a href="#"><img src="/assets/images/course/course-javascript.jpg" alt="course"
                                        class="rounded img-4by3-lg"></a>
                                <!-- quiz content -->
                                <div class="ms-3">
                                    <h4 class="mb-2"><a href="#" class="text-inherit">{{$competition->title}}</a></h4>
                                    <div>
                                        <span>
                                            <span class="me-2 align-middle"><i class="fe fe-clock"></i>{{$competition->date_start}}</span>
                                        </span>
                                        <span class="me-2">
                                            <span class="me-2 align-middle"><i class="fe fe-clock"></i>{{$competition->date_end}}</span>
                                        </span>
                                        <a href="#" class="me-2 text-body">
											
                                            <span class="me-2 align-middle"><i class="fe fe-file-text"></i>{{$competition->description}}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <!-- icon -->
                            <div>
								<a href="#" class="btn btn-outline-primary btn-sm">دخول المسابقة</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection