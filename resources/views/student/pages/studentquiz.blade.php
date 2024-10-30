@section('title', 'Home tetcher')

@extends('layouts.student')



@section('student.content')
<!-- Card -->
<div class="card border-0">
    <!-- Card body -->
    <div class="card-body p-10">
        <div class="text-center">
            <!-- img -->
            <img src="/assets/images/svg/survey-img.svg" alt="survey" class="img-fluid">
            <!-- text -->
            <div class="px-lg-8">
                <h1>مرحباً بك في الاختبار</h1>
                <p class="mb-0">شارك بشكل مباشر أو غير مباشر في أسئلة الاختبار والاستطلاع التي يكملها المشاركون حسب وتيرتهم الخاصة.</p>
                <a href="student-quiz-start.html" class="btn btn-primary mt-4">ابدأ اختبارك</a>
            </div>
        </div>
    </div>
</div>

@endsection