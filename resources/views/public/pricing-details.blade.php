@extends('layouts.main')



@section('main.content')
    <section class="py-xl-8 py-6 bg-gray" style="padding-top:100px;padding-bottom:100px;display:flex;justify-content:center" dir="rtl">
        <div class="container">
            <div class="align-items-center rounded-md overflow-hidden"
            style="display:flex;justify-content:center;width:100% !important;padding:2rem 1rem;outline:1px solid #47474771">
            <div class="col-xl-5 col-lg-6 col-md-12 col-12">
                <div class="py-4" style="padding-right:1rem !important">
                    <div class="d-flex justify-content-between mb-4 align-items-center">
                        <a href="/home">
                            <img alt=""
                                loading="lazy" width="80" height="80" decoding="async" data-nimg="1"
                                class="logo-inverse" style="color:transparent"
                                src="/assets/images/lgg.png"></a>
                        <div class="form-check form-switch theme-switch d-none"><input class="form-check-input"
                                type="checkbox" role="switch" id="flexSwitchCheckDefault"><label class="form-check-label"
                                for="flexSwitchCheckDefault"></label></div>
                    </div>
                    <div>
                        <h1 class="display-5 tajawal-bold">تواصل معنا الآن</h1>
                        <p class="lead text-dark">وابدأ رحلة نجاحك وتفوقك</p>
                        <div class="mt-4 fs-5">
                            <p class="mb-3">إذا كنت بحاجة إلى دعم، يرجى زيارة بوابة الدعم قبل التواصل مباشرة.</p>
                            <p><i class="bi bi-telephone text-primary me-2"></i>+ 0123-456-7890</p>
                            <p><i class="bi bi-envelope-open text-primary me-2"></i>mohammed@gmail.com</p>
                            <p class="d-flex"><i class="bi bi-geo-alt text-primary me-2"></i>2652 Kooter Lane Charlotte, NC
                                28263</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-lg-flex align-items-center w-lg-50 position-fixed-lg bg-cover bg-light top-0 right-0">
                <div class="pr-4 pr-xl-8 mr-xl-8 py-4 py-lg-0">
                    <div>
                        <form class="row g-3 needs-validation">
                            <div class="mb-3 col-12 col-md-6"><label class="form-label" for="fname">الاسم الأول:<span
                                        class="text-danger">*</span></label><input class="form-control" type="text"
                                    id="fname" placeholder="الاسم الأول" required="" name="first name">
                                <div class="invalid-feedback">الرجاء إدخال الاسم الأول</div>
                            </div>
                            <div class="mb-3 col-12 col-md-6"><label class="form-label" for="lname">الاسم الأخير:<span
                                        class="text-danger">*</span></label><input class="form-control" type="text"
                                    id="lname" placeholder="الاسم الأخير" required="" name="last name">
                                <div class="invalid-feedback">الرجاء إدخال الاسم الأخير</div>
                            </div>
                            <div class="mb-3 col-12 col-md-6"><label class="form-label" for="email">البريد
                                    الإلكتروني:<span class="text-danger">*</span></label><input class="form-control"
                                    type="email" id="email" placeholder="البريد الإلكتروني" required=""
                                    style="direction:rtl">
                                <div class="invalid-feedback">الرجاء إدخال البريد الإلكتروني</div>
                            </div>
                            <div class="mb-3 col-12 col-md-6"><label class="form-label" for="phone">رقم الهاتف:<span
                                        class="text-danger">*</span></label><input class="form-control" type="text"
                                    id="phone" placeholder="رقم الهاتف" required="" name="phone">
                                <div class="invalid-feedback">الرجاء إدخال رقم الهاتف</div>
                            </div>
                            <div class="mb-3 col-12"><label class="text-dark form-label" for="contactReason">سبب
                                    الاتصال:<span class="text-danger">*</span></label><select class="form-select"
                                    id="contactReason" required="">
                                    <option value="">اختيار</option>
                                    <option value="تصميم">تصميم</option>
                                    <option value="تطوير">تطوير</option>
                                    <option value="آخر">آخر</option>
                                </select>
                                <div class="invalid-feedback">الرجاء اختيار سبب الاتصال</div>
                            </div>
                            <div class="mb-3 col-12"><label class="text-dark form-label" for="messages">رسالة:</label>
                                <textarea class="form-control" id="messages" rows="3" placeholder="رسالة"></textarea>
                            </div>
                            <div class="col-12"><button type="submit" class="btn btn-primary w-100">إرسال</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
