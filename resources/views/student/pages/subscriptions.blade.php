@section('title', 'Home tetcher')

@extends('layouts.student')



@section('student.content')
<!-- Card -->
<div class="card border-0">
    <!-- Card header -->
    <div class="card-header d-lg-flex justify-content-between align-items-center">
        <div class="mb-3 mb-lg-0">
            <h3 class="mb-0">اشتراكاتي</h3>
            <p class="mb-0">هنا قائمة الباقات/المنتجات التي قمت بالاشتراك بها.</p>
        </div>
        <div>
            <a href="pricing.html" class="btn btn-success btn-sm">ترقية الآن — Go Pro $39.00</a>
        </div>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <div class="border-bottom pt-0 pb-5">
            <div class="row mb-4">
                <div class="col-lg-6 col-md-8 col-7 mb-2 mb-lg-0">
                    <span class="d-block">
                        <span class="h4">شهري</span>
                        <span class="badge bg-success ms-2">نشط</span>
                    </span>
                    <p class="mb-0 fs-6">معرف الاشتراك: #100010002</p>
                </div>
                <div class="col-lg-3 col-md-4 col-5 mb-2 mb-lg-0">
                    <!-- Custom Switch -->
                    <span>تجديد تلقائي</span>
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="customSwitch1" checked="">
                        <label class="form-check-label" for="customSwitch1"></label>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-12 d-lg-flex align-items-start justify-content-end">
                    <a href="#" class="btn btn-outline-primary btn-sm">تغيير الخطة</a>
                </div>
            </div>
            <!-- Pricing data -->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-6 mb-2 mb-lg-0">
                    <span class="fs-6">تبدأ في</span>
                    <h6 class="mb-0">1 أكتوبر 2020</h6>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mb-2 mb-lg-0">
                    <span class="fs-6">السعر</span>
                    <h6 class="mb-0">شهري</h6>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mb-2 mb-lg-0">
                    <span class="fs-6">الوصول</span>
                    <h6 class="mb-0">الوصول إلى جميع الدورات</h6>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mb-2 mb-lg-0">
                    <span class="fs-6">تاريخ الفاتورة</span>
                    <h6 class="mb-0">الفاتورة القادمة في 1 نوفمبر 2020</h6>
                </div>
            </div>
        </div>
        <div class="pt-5">
            <div class="row mb-4">
                <div class="col mb-2 mb-lg-0">
                    <span class="d-block">
                        <span class="h4">الخطة المجانية</span>
                        <span class="badge bg-danger ms-2">منتهية</span>
                    </span>
                    <p class="mb-0 fs-6">معرف الاشتراك: #100010001</p>
                </div>
                <div class="col-auto">
                    <a href="#" class="btn btn-light btn-sm disabled">معطل</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-6 mb-2 mb-lg-0">
                    <span class="fs-6">تبدأ في</span>
                    <h6 class="mb-0">1 سبتمبر 2020</h6>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mb-2 mb-lg-0">
                    <span class="fs-6">السعر</span>
                    <h6 class="mb-0">مجاني - تجربة لشهر</h6>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mb-2 mb-lg-0">
                    <span class="fs-6">الوصول</span>
                    <h6 class="mb-0">الوصول إلى جميع الدورات</h6>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mb-2 mb-lg-0">
                    <span class="fs-6">تاريخ الفاتورة</span>
                    <h6 class="mb-0">الفاتورة القادمة في 1 أكتوبر 2020</h6>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection