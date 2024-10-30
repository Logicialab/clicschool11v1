@section('title', 'Home tetcher')

@extends('layouts.student')



@section('student.content')
<!-- Card -->
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
        <div class="mb-lg-0 mb-3">
            <h3 class="mb-1">عنوان الفواتير</h3>
            <span>ستسري التغييرات على معلومات الفوترة الخاصة بك بدءًا من الدفعة المجدولة وستنعكس على فاتورتك التالية.</span>
        </div>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <!-- List group -->
        <ul class="list-group list-group-flush mb-4">
            <!-- List group item  -->
            <li class="list-group-item px-0 pt-0 pb-4">
                <div class="row">
                    <div class="col">
                        <div class="form-check">
                            <input type="radio" id="customRadio1" name="customRadio" class="form-check-input" checked="">
                            <label class="form-check-label" for="customRadio1">
                                <span class="h4">عنوان الفواتير #1</span>
                                <span class="d-block">1901 Thornridge Cir. Shiloh, Hawaii 81063</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="btn btn-outline-secondary btn-sm">تعديل العنوان</a>
                    </div>
                </div>
            </li>
            <!-- List group item -->
            <li class="list-group-item px-0 py-4 border-bottom">
                <div class="row">
                    <div class="col">
                        <div class="form-check">
                            <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
                            <label class="form-check-label" for="customRadio2">
                                <span class="h4">عنوان الفواتير #2</span>
                                <span class="d-block">1901 Thornridge Cir. Shiloh, Hawaii 81063</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="btn btn-outline-secondary btn-sm">تعديل العنوان</a>
                    </div>
                </div>
            </li>
        </ul>
        <!-- button -->
        <a href="#" class="btn btn-primary mb-5">إضافة عنوان جديد</a>
        <p class="mb-0">يحدد موقعك الضريبي الضرائب التي يتم تطبيقها على فاتورتك.</p>
        <a href="#">كيف يمكنني تصحيح موقعي الضريبي؟</a>
    </div>
</div>

@endsection