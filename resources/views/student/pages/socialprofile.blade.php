@section('title', 'Home tetcher')

@extends('layouts.student')



@section('student.content')
<!-- Card -->
<div class="card">
    <!-- Card header -->
    <div class="card-header">
        <h3 class="mb-0">الملفات الاجتماعية</h3>
        <p class="mb-0">أضف روابط ملفاتك الاجتماعية في الحسابات الاجتماعية أدناه.</p>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <div class="row mb-5">
            <!-- Twitter -->
            <div class="col-lg-3 col-md-4 col-12">
                <h5>تويتر</h5>
            </div>
            <div class="col-lg-9 col-md-8 col-12">
                <input type="text" class="form-control mb-1" placeholder="اسم ملف تويتر">
                <small>أضف اسم المستخدم الخاص بك على تويتر (مثل johnsmith).</small>
            </div>
        </div>
        <!-- Facebook -->
        <div class="row mb-5">
            <div class="col-lg-3 col-md-4 col-12">
                <h5>فيسبوك</h5>
            </div>
            <div class="col-lg-9 col-md-8 col-12">
                <input type="text" class="form-control mb-1" placeholder="اسم ملف فيسبوك">
                <small>أضف اسم المستخدم الخاص بك على فيسبوك (مثل johnsmith).</small>
            </div>
        </div>
        <!-- Instagram -->
        <div class="row mb-5">
            <div class="col-lg-3 col-md-4 col-12">
                <h5>إنستغرام</h5>
            </div>
            <div class="col-lg-9 col-md-8 col-12">
                <input type="text" class="form-control mb-1" placeholder="اسم ملف إنستغرام">
                <small>أضف اسم المستخدم الخاص بك على إنستغرام (مثل johnsmith).</small>
            </div>
        </div>
        <!-- LinkedIn -->
        <div class="row mb-5">
            <div class="col-lg-3 col-md-4 col-12">
                <h5>رابط ملف لينكد إن</h5>
            </div>
            <div class="col-lg-9 col-md-8 col-12">
                <input type="text" class="form-control mb-1" placeholder="رابط ملف لينكد إن">
                <small>أضف رابط ملفك الشخصي على لينكد إن. (مثل https://www.linkedin.com/in/jitu-chauhan-ba004b78)</small>
            </div>
        </div>
        <!-- YouTube -->
        <div class="row mb-3">
            <div class="col-lg-3 col-md-4 col-12">
                <h5>يوتيوب</h5>
            </div>
            <div class="col-lg-9 col-md-8 col-12">
                <input type="text" class="form-control mb-1" placeholder="رابط يوتيوب">
                <small>أضف رابط ملفك الشخصي على يوتيوب.</small>
            </div>
        </div>
        <!-- Button -->
        <div class="row">
            <div class="offset-lg-3 col-lg-6 col-12">
                <a href="#" class="btn btn-primary">حفظ الملف الاجتماعي</a>
            </div>
        </div>
    </div>
</div>

@endsection