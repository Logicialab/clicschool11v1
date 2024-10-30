@section('title', 'Home tetcher')

@extends('layouts.teacher')



@section('teacher.content')
<div class="row">
    <div class="col-lg-4 col-md-12 col-12">
        <!-- Card -->
        <div class="card mb-4">
            <div class="p-4">
                <span class="fs-6 text-uppercase fw-semibold">الإيرادات</span>
                <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">$467.34</h2>
                <span class="d-flex justify-content-between align-items-center">
                    <span>الأرباح هذا الشهر</span>
                    <span class="badge bg-success ms-2">$203.23</span>
                </span>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-12 col-12">
        <!-- Card -->
        <div class="card mb-4">
            <div class="p-4">
                <span class="fs-6 text-uppercase fw-semibold">تسجيلات الطلاب</span>
                <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">12,000</h2>
                <span class="d-flex justify-content-between align-items-center">
                    <span>جديد هذا الشهر</span>
                    <span class="badge bg-info ms-2">120+</span>
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-12">
        <!-- Card -->
        <div class="card mb-4">
            <div class="p-4">
                <span class="fs-6 text-uppercase fw-semibold">تقييم الدورات</span>
                <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">4.80</h2>
                <span class="d-flex justify-content-between align-items-center">
                    <span>التقييم هذا الشهر</span>
                    <span class="badge bg-warning ms-2">10+</span>
                </span>
            </div>
        </div>
    </div>
</div>
<!-- Card -->

<livewire:teacher.section.dashboard.index-courses />


@endsection