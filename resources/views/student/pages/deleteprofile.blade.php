@section('title', 'Home tetcher')

@extends('layouts.student')



@section('student.content')
<!-- Card -->
<div class="card">
    <!-- Card header -->
    <div class="card-header">
        <h3 class="mb-0">حذف حسابك</h3>
        <p class="mb-0">حذف أو إغلاق حسابك بشكل دائم.</p>
    </div>
    <!-- Card body -->
    <div class="card-body p-4">
        <span class="text-danger h4">تحذير</span>
        <p>إذا قمت بإغلاق حسابك، ستتم إلغاء اشتراكك من جميع دوراتك الـ 0، وستفقد الوصول إليها للأبد.</p>
        <a href="../index.html" class="btn btn-danger">إغلاق حسابي</a>
    </div>
</div>
@endsection