@section('title', 'Home tetcher')

@extends('layouts.student')



@section('student.content')
<!-- Card -->
<div class="card">
    <!-- Card header -->
    <div class="card-header">
        <h3 class="mb-0">تفاصيل الملف الشخصي</h3>
        <p class="mb-0">لديك التحكم الكامل لإدارة إعدادات حسابك.</p>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <div class="d-lg-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center mb-4 mb-lg-0">
                <img src="/assets/images/avatar/avatar-3.jpg" id="img-uploaded" class="avatar-xl rounded-circle"
                    alt="avatar">
                <div class="ms-3">
                    <h4 class="mb-0">صورتك الرمزية</h4>
                    <p class="mb-0">PNG أو JPG لا تزيد عن 800 بكسل عرضاً وارتفاعاً.</p>
                </div>
            </div>
            <div>
                <a href="#" class="btn btn-outline-secondary btn-sm">تحديث</a>
                <a href="#" class="btn btn-outline-danger btn-sm">حذف</a>
            </div>
        </div>
        <hr class="my-5">
        <div>
            <h4 class="mb-0">التفاصيل الشخصية</h4>
            <p class="mb-4">عدل معلوماتك الشخصية وعنوانك.</p>
            <!-- Form -->
            <form class="row gx-3 needs-validation" novalidate="">
                <!-- First name -->
                <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="fname">الاسم الأول</label>
                    <input type="text" id="fname" class="form-control" placeholder="الاسم الأول" required="">
                    <div class="invalid-feedback">يرجى إدخال الاسم الأول.</div>
                </div>
                <!-- Last name -->
                <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="lname">الاسم الأخير</label>
                    <input type="text" id="lname" class="form-control" placeholder="الاسم الأخير" required="">
                    <div class="invalid-feedback">يرجى إدخال الاسم الأخير.</div>
                </div>
                <!-- Phone -->
                <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="phone">الهاتف</label>
                    <input type="text" id="phone" class="form-control" placeholder="الهاتف" required="">
                    <div class="invalid-feedback">يرجى إدخال رقم الهاتف.</div>
                </div>
                <!-- Birthday -->
                <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="birth">تاريخ الميلاد</label>
                    <input class="form-control flatpickr flatpickr-input" type="text" placeholder="تاريخ الميلاد"
                        id="birth" name="birth" readonly="readonly">
                    <div class="invalid-feedback">يرجى اختيار تاريخ.</div>
                </div>
                <!-- Address -->
                <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="address">العنوان الأول</label>
                    <input type="text" id="address" class="form-control" placeholder="العنوان" required="">
                    <div class="invalid-feedback">يرجى إدخال العنوان.</div>
                </div>
                <!-- Address -->
                <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="address2">العنوان الثاني</label>
                    <input type="text" id="address2" class="form-control" placeholder="العنوان" required="">
                    <div class="invalid-feedback">يرجى إدخال العنوان.</div>
                </div>
                <!-- State -->
                <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="editState">الولاية</label>
                    <select class="form-select" id="editState" required="">
                        <option value="">اختر الولاية</option>
                        <option value="1">غوجارات</option>
                        <option value="2">راجستان</option>
                        <option value="3">ماهاراشترا</option>
                    </select>
                    <div class="invalid-feedback">يرجى اختيار ولاية.</div>
                </div>
                <!-- Country -->
                <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="editCountry">الدولة</label>
                    <select class="form-select" id="editCountry" required="">
                        <option value="">اختر الدولة</option>
                        <option value="1">الهند</option>
                        <option value="2">المملكة المتحدة</option>
                        <option value="3">الولايات المتحدة</option>
                    </select>
                    <div class="invalid-feedback">يرجى اختيار دولة.</div>
                </div>
                <div class="col-12">
                    <!-- Button -->
                    <button class="btn btn-primary" type="submit">تحديث الملف الشخصي</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection