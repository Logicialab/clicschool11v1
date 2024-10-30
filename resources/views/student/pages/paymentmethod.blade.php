@section('title', 'Home tetcher')

@extends('layouts.student')



@section('student.content')
<!-- Card -->
<div class="card mb-4">
    <div class="d-lg-flex justify-content-between align-items-center card-header">
        <div class="mb-3 mb-lg-0">
            <h3 class="mb-0">الخطة الحالية</h3>
            <span>أدناه معلومات خطتك النشطة الحالية.</span>
        </div>
        <div>
            <a href="#" class="btn btn-outline-primary btn-sm">التحول إلى الفوترة السنوية</a>
        </div>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <h2 class="fw-bold mb-0">$39/شهريًا</h2>
        <p class="mb-0">
            سيتم تطبيق الرسوم الشهرية التالية
            <span class="text-success">$39</span>
            على طريقة الدفع الرئيسية الخاصة بك في
            <span class="text-success">20 يوليو 2020.</span>
        </p>
    </div>
</div>
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
        <h3 class="mb-0">المحفظة الالكترونية</h3>
        <span>تستخدم طريقة الدفع الرئيسية بشكل افتراضي</span>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <!-- List group -->
        @if(!empty($user->wallets) && count($user->wallets) > 0)
            <h2 class="fw-bold mb-0">{{ $user->wallets[0]->balance }}</h2>
        @else
            <h2 class="fw-bold mb-0">لا يوجد رصيد متاح</h2>
        @endif
        
        <!-- button-->
        <a href="#" class="btn btn-outline-primary mt-4" data-bs-toggle="modal" data-bs-target="#paymentModal">إضافة طريقة دفع</a>
    </div>
</div>

@endsection