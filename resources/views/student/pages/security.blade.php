@section('title', 'Home tetcher')

@extends('layouts.student')



@section('student.content')
<!-- Card -->
<div class="card">
    <!-- Card header -->
    <div class="card-header">
        <h3 class="mb-0">الأمان</h3>
        <p class="mb-0">قم بتحرير إعدادات حسابك وتغيير كلمة المرور هنا.</p>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <h4 class="mb-0">عنوان البريد الإلكتروني</h4>
        <p>
            عنوان بريدك الإلكتروني الحالي هو
            <span class="text-success">stellaflores@gmail.com</span>
        </p>
        <form class="row needs-validation" novalidate="">
            <div class="mb-3 col-lg-6 col-md-12 col-12">
                <label class="form-label" for="email">عنوان بريد إلكتروني جديد</label>
                <input id="email" type="email" name="email" class="form-control" placeholder="" required="">
                <div class="invalid-feedback">يرجى إدخال عنوان البريد الإلكتروني</div>
                <button type="submit" class="btn btn-primary mt-2">تحديث التفاصيل</button>
            </div>
        </form>
        <hr class="my-5">
        <div>
            <h4 class="mb-0">تغيير كلمة المرور</h4>
            <p>سوف نرسل لك تأكيدًا عبر البريد الإلكتروني عند تغيير كلمة المرور، لذا يرجى توقع ذلك البريد الإلكتروني بعد الإرسال.</p>
            <!-- Form -->
            <form class="row needs-validation" novalidate="">
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- Current password -->
                    <div class="mb-3">
                        <label class="form-label" for="currentpassword">كلمة المرور الحالية</label>
                        <input id="currentpassword" type="password" name="currentpassword" class="form-control" placeholder="" required="">
                        <div class="invalid-feedback">يرجى إدخال كلمة المرور الحالية.</div>
                    </div>
                    <!-- New password -->
                    <div class="mb-3 password-field">
                        <label class="form-label" for="newpassword">كلمة المرور الجديدة</label>
                        <input id="newpassword" type="password" name="newpassword" class="form-control mb-2" placeholder="" required="">
                        <div class="invalid-feedback">يرجى إدخال كلمة المرور الجديدة.</div>
                        <div class="row align-items-center g-0">
                            <div class="col-6">
                                <span data-bs-toggle="tooltip" data-placement="right" data-bs-original-title="اختبرها بكتابة كلمة مرور في الحقل أدناه. للوصول إلى القوة الكاملة، استخدم على الأقل 6 أحرف، حرف كبير ورقم، مثل 'Test01'">
                                    قوة كلمة المرور
                                    <i class="fe fe-help-circle ms-1"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <!-- Confirm new password -->
                        <label class="form-label" for="confirmpassword">تأكيد كلمة المرور الجديدة</label>
                        <input id="confirmpassword" type="password" name="confirmpassword" class="form-control mb-2" placeholder="" required="">
                        <div class="invalid-feedback">يرجى إدخال تأكيد كلمة المرور الجديدة.</div>
                    </div>
                    <!-- Button -->
                    <button type="submit" class="btn btn-primary">حفظ كلمة المرور</button>
                    <div class="col-6"></div>
                </div>
                <div class="col-12 mt-4">
                    <p class="mb-0">
                        لا تستطيع تذكر كلمة المرور الحالية؟
                        <a href="#">إعادة تعيين كلمة المرور عبر البريد الإلكتروني</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection