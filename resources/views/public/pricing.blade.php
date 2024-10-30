@extends('layouts.main')



@section('main.content')
    <section class="hero-sec bg-white" dir="rtl">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-12 offset-xl-2 offset-lg-2">
                    <div class="text-center mb-8">
                        <h1 class="display-3 mb-3 fw-bold">أسعار الخطط للطلاب</h1>
                        <p class="lead px-md-14">نقدم لك معلومات حول الأسعار، بالإضافة إلى خدمة التعليم والتكوين على
                            الإنترنت.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="mb-3 border shadow-none border-top-0 card">
                        <div class="border-6 rounded-3" style="border-top: 6px solid rgb(0, 162, 218);">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="fw-bold">الخطة الأساسية</h3>
                                    <p class="mb-0">أفضل خيار للطلاب الجدد</p>
                                    <h1 class="mb-3 fw-bold mt-5">0 دينار/شهر</h1><a class="btn btn-outline-primary"
                                        href="{{ route('create-account-student') }}">اشترك الآن</a>
                                </div>
                                <hr class="m-0">
                                <div class="mt-5">
                                    <h4 class="fw-bold mb-4">الفوائد:</h4>
                                    <div class="list-unstyled">
                                        <div class="mb-1 list-item"><span class="me-2"
                                                style="color: rgb(232, 39, 130);"><i
                                                    class="bi bi-check-circle"></i></span><span>وصول غير محدود إلى
                                                الدروس</span></div>
                                        <div class="mb-1 list-item"><span class="me-2"
                                                style="color: rgb(232, 39, 130);"><i
                                                    class="bi bi-check-circle"></i></span><span>دعم فني عبر البريد
                                                الإلكتروني</span></div>
                                        <div class="mb-1 list-item"><span class="me-2"
                                                style="color: rgb(232, 39, 130);"><i
                                                    class="bi bi-check-circle"></i></span><span>مواد تعليمية قابلة
                                                للتنزيل</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="mb-3 border shadow-none border-top-0 card">
                        <div class="border-6 rounded-3" style="border-top: 6px solid rgb(232, 39, 130);">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="fw-bold">الخطة المتقدمة</h3>
                                    <p class="mb-0">مثالية للطلاب الذين يرغبون في تحسين مهاراتهم</p>
                                    <h1 class="mb-3 fw-bold mt-5">200 دينار/شهر</h1><a class="btn btn-primary"
                                        href="{{ route('create-account-student') }}">اشترك الآن</a>
                                </div>
                                <hr class="m-0">
                                <div class="mt-5">
                                    <h4 class="fw-bold mb-4">الفوائد:</h4>
                                    <div class="list-unstyled">
                                        <div class="mb-1 list-item"><span class="me-2"
                                                style="color: rgb(232, 39, 130);"><i
                                                    class="bi bi-check-circle"></i></span><span>كل ميزات الخطة
                                                الأساسية</span></div>
                                        <div class="mb-1 list-item"><span class="me-2"
                                                style="color: rgb(232, 39, 130);"><i
                                                    class="bi bi-check-circle"></i></span><span>دروس مباشرة مع
                                                المعلمين</span></div>
                                        <div class="mb-1 list-item"><span class="me-2"
                                                style="color: rgb(232, 39, 130);"><i
                                                    class="bi bi-check-circle"></i></span><span>مشورات شخصية</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="mb-3 border shadow-none border-top-0 card">
                        <div class="border-6 rounded-3" style="border-top: 6px solid rgb(254, 239, 16);">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="fw-bold">الخطة الممتازة</h3>
                                    <p class="mb-0">للطلاب الذين يسعون لتحقيق التفوق</p>
                                    <h1 class="mb-3 fw-bold mt-5">300 دينار/شهر</h1><a class="btn btn-outline-primary"
                                        href="{{ route('create-account-student') }}">اشترك الآن</a>
                                </div>
                                <hr class="m-0">
                                <div class="mt-5">
                                    <h4 class="fw-bold mb-4">الفوائد:</h4>
                                    <div class="list-unstyled">
                                        <div class="mb-1 list-item"><span class="me-2"
                                                style="color: rgb(232, 39, 130);"><i
                                                    class="bi bi-check-circle"></i></span><span>كل ميزات الخطة
                                                المتقدمة</span></div>
                                        <div class="mb-1 list-item"><span class="me-2"
                                                style="color: rgb(232, 39, 130);"><i
                                                    class="bi bi-check-circle"></i></span><span>وصول حصري إلى الندوات</span>
                                        </div>
                                        <div class="mb-1 list-item"><span class="me-2"
                                                style="color: rgb(232, 39, 130);"><i
                                                    class="bi bi-check-circle"></i></span><span>دعم فني على مدار
                                                الساعة</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="hero-sec bg-white" dir="rtl">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-12 offset-xl-2 offset-lg-2">
                    <div class="text-center mb-8">
                        <h1 class="display-3 mb-3 fw-bold">أسعار الخطط لولي الأمر</h1>
                        <p class="lead px-md-14">اختر الخطة التي تناسب تطلعاتك لتعليم طفلك مع مدرستنا عبر الإنترنت.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="mb-3 border shadow-none border-top-0 card">
                        <div class="border-6 rounded-3" style="border-top: 6px solid rgb(0, 162, 218);">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="fw-bold">الأساسي</h3>
                                    <p class="mb-0">لبدء مساعدة طفلك في التعلم، سيحصلون على الوصول إلى الدورات الأساسية
                                        فقط.<span class="text-dark fw-medium">الدورات الأساسية فقط.</span>سجّل طفلك اليوم
                                        ليبدأ رحلته التعليمية معنا</p>
                                    <h1 class="mb-3 fw-bold mt-5">مجاني</h1><a class="btn btn-outline-primary"
                                        href="/account/parent">ابدأ مجاناً</a>
                                </div>
                                <hr class="m-0">
                                <div class="mt-5">
                                    <h4 class="fw-bold mb-4">الميزات الأساسية:</h4>
                                    <div class="list-unstyled">
                                        <div class="mb-1 list-item"><span class="me-2"
                                                style="color: rgb(232, 39, 130);"><i
                                                    class="bi bi-check-circle"></i></span><span>الدورات الأساسية فقط</span>
                                        </div>
                                        <div class="mb-1 list-item"><span class="me-2"
                                                style="color: rgb(232, 39, 130);"><i
                                                    class="bi bi-check-circle"></i></span><span>مساحة تخزين 1
                                                جيجابايت</span></div>
                                        <div class="mb-1 list-item"><span class="me-2"
                                                style="color: rgb(232, 39, 130);"><i
                                                    class="bi bi-check-circle"></i></span><span>تحليلات بسيطة</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="mb-3 border shadow-none border-top-0 card">
                        <div class="border-6 rounded-3" style="border-top: 6px solid rgb(232, 39, 130);">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="fw-bold">المتقدم</h3>
                                    <p class="mb-0">تساعد طفلك على الارتقاء بمهاراتهم التعليمية مع الوصول إلى<span
                                            class="text-dark fw-medium">الدورات البريميوم وورش العمل والتطبيقات
                                            المحمولة.</span>التجديد شهرياً.</p>
                                    <h1 class="mb-3 fw-bold mt-5">$49 <span
                                            class="fs-5 text-muted fw-normal">/شهرياً</span></h1><a
                                        class="btn btn-outline-primary" href="/account/parent">ابدأ اليوم</a>
                                </div>
                                <hr class="m-0">
                                <div class="mt-5">
                                    <h4 class="fw-bold mb-4">كل شيء في الأساسي، بالإضافة إلى:</h4>
                                    <div class="list-unstyled">
                                        <div class="mb-1 list-item"><span class="me-2"
                                                style="color: rgb(232, 39, 130);"><i
                                                    class="bi bi-check-circle"></i></span><span>الدورات البريميوم وورش
                                                العمل</span></div>
                                        <div class="mb-1 list-item"><span class="me-2"
                                                style="color: rgb(232, 39, 130);"><i
                                                    class="bi bi-check-circle"></i></span><span><span
                                                    class="fw-bold text-dark">مساحة تخزين </span>غير محدودة</span></div>
                                        <div class="mb-1 list-item"><span class="me-2"
                                                style="color: rgb(232, 39, 130);"><i
                                                    class="bi bi-check-circle"></i></span><span>تحليلات متقدمة</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-8" dir="rtl">
        <div class="container my-lg-8">
            <div class="row">
                <div class="mb-4 mt-6">
                    <h2 class="mb-0 fw-semi-bold">الاستفسارات العامة</h2>
                </div>


                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            هل هناك فترة تجريبية لمدة 14 يومًا؟
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            يتساءل العديد من المستخدمين عن وجود فترة تجريبية لمدة 14 يومًا للتعرف
                                على مميزات التطبيق قبل الاشتراك النهائي
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            ما هي فوائد العضوية المميزة؟
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            تقدم العضوية المميزة فوائد عديدة مثل الوصول إلى محتوى حصري وخدمات إضافية
                                تجعل تجربة المستخدم أكثر تميزًا وفعالية
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            كم من الوقت سأحتاج لتعلم هذا التطبيق؟
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            يتساءل الكثيرون عن الوقت الذي سيحتاجونه لاحتراف استخدام التطبيق واكتساب
                                المهارات اللازمة للاستفادة الكاملة من جميع ميزاته
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFoor">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFoor" aria-expanded="false" aria-controls="collapseFoor">
                            هل هناك دروس مجانية متاحة؟
                        </button>
                        </h2>
                        <div id="collapseFoor" class="accordion-collapse collapse" aria-labelledby="headingFoor" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            تتوفر دروس مجانية للمستخدمين الجدد لتسهيل عملية التعلم وفهم كيفية
                                استخدام التطبيق بشكل صحيح وفعال
                        </div>
                        </div>
                      </div>
                  </div>


            </div>
        </div>
    </section>
@endsection
