@extends('layouts.main')



@section('main.content')
    <section class="text-center bg-white" dir="rtl" style="padding-top: 5rem; padding-bottom: 5rem;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="mb-6 mb-lg-8">
                        <h2 class="tajawal-bold tajawal-bold">ابدأ رحلتك مع<u class="text-warning"><span
                                    class="text-primary mx-2">CLIC SCHOOL</span></u></h2>
                        <h2 class="tajawal-bold tajawal-bold">تواصل معنا لبدء تحقيق أهدافك اليوم</h2>
                        <p class="mb-0 lead">اكتشف الفرص الغير محدودة! اتصل بنا الآن للبدء في تحويل أفكارك إلى واقع، والوصول
                            إلى خبرتنا المتخصصة لمساعدتك في تحقيق أهدافك بكل ثقة ونجاح</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-12 cursor-pointer">
                    <div class="mb-4 card-hover border card"><img alt="writing" loading="lazy" width="500"
                            height="500" decoding="async" data-nimg="1" class="img-fluid rounded-top-3"
                            src="/assets/images/map.avif" style="color: transparent;">
                        <div class="card-body" dir="ltr">
                            <h3 class="mb-3 tajawal-bold">البريد الإلكتروني</h3>clicschoolsba@gmail.com
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12 cursor-pointer">
                    <div class="mb-4 card-hover border card"><img alt="writing" loading="lazy" width="500"
                            height="500" decoding="async" data-nimg="1" class="img-fluid rounded-top-3"
                            src="/assets/images/phone1.avif" style="color: transparent;">
                        <div class="card-body" dir="ltr">
                            <h3 class="mb-3 tajawal-bold">خدمة الواتساب</h3>+213 541 60 24 59
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12 cursor-pointer">
                    <div class="mb-4 card-hover border card"><img alt="writing" loading="lazy" width="500"
                            height="500" decoding="async" data-nimg="1" class="img-fluid rounded-top-3"
                            src="/assets/images/email.avif" style="color: transparent;">
                        <div class="card-body" dir="ltr">
                            <h3 class="mb-3 tajawal-bold">للاتصال والاستفسار</h3>+213 541 60 24 59
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-xl-8 py-6 bg-gray" dir="rtl"
        style="padding-top: 100px; padding-bottom: 100px; display: flex; justify-content: center;">
        <div class="container">
            <div class="align-items-center rounded-md overflow-hidden"
                style="display: flex; justify-content: center; padding: 2rem 1rem; outline: rgba(71, 71, 71, 0.443) solid 1px;">
                <div class="col-xl-5 col-lg-6 col-md-12 col-12">
                    <div class="py-4">
                        <div class="d-flex justify-content-between mb-4 align-items-center">
                            <a href="/home">
                                <img alt="" loading="lazy" width="80" height="80" decoding="async"
                                    data-nimg="1" class="logo-inverse" style="color:transparent"
                                    src="/assets/images/lgg.png">
                            </a>
                            <div class="form-check form-switch theme-switch d-none"><input class="form-check-input"
                                    role="switch" id="flexSwitchCheckDefault" type="checkbox"><label
                                    class="form-check-label" for="flexSwitchCheckDefault"></label></div>
                        </div>
                        <div>
                            <h1 class="display-5 tajawal-bold">تواصل معنا الآن</h1>
                            <p class="lead text-dark">وابدأ رحلة نجاحك وتفوقك</p>
                            <div class="mt-4 fs-5">
                                <p class="mb-3">إذا كنت بحاجة إلى دعم، يرجى زيارة بوابة الدعم قبل التواصل مباشرة.</p>
                                <p><i class="bi bi-telephone text-primary me-2"></i>+ 0123-456-7890</p>
                                <p><i class="bi bi-envelope-open text-primary me-2"></i>mohammed@gmail.com</p>
                                <p class="d-flex"><i class="bi bi-geo-alt text-primary me-2"></i>2652 Kooter Lane Charlotte,
                                    NC
                                    28263</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-6 d-lg-flex align-items-center w-lg-50 position-fixed-lg bg-cover bg-light top-0 right-0">
                    <div class="pr-4 pr-xl-8 mr-xl-8 py-4 py-lg-0">
                        <div>
                            
                            <livewire:public.section.contact-form-section />

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
    <section class="py-xl-8 py-6 bg-gray">
        <div class="container my-lg-8 relative md:pt-20 pt-16 text-center bg-gray">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="mb-6 mb-lg-8">
                        <h2 class="tajawal-bold tajawal-bold">استكشف مواقعنا</h2>
                        <h2 class="tajawal-bold tajawal-bold">اكتشف حيث يتواجد<u class="text-warning"><span
                                    class="text-primary mx-2">الإبداع والتعليم</span></u></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="card my-1 border">
                        <h2 class="text-lg font-semibold my-2 bg-white">سيدي بلعباس، الجزائر<!-- --> </h2>
                    </div>
                    <div class="card mb-4 rounded-md overflow-hidden" style="outline:2px solid #47474771"><iframe
                            title="Google Map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3259.703440861725!2d-0.6207393!3d35.2138552!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd7eff142b7e9fbb%3A0x746e72c8cf5c18ba!2sClic%20school%20SBA!5e0!3m2!1sar!2sma!4v1717084726438!5m2!1sar!2sma"
                            style="border:0;width:100%;height:40vh" allowfullscreen=""></iframe></div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="card my-1 border">
                        <h2 class="text-lg font-semibold my-2 bg-white">Click School Djelfa - كليك سكول الجلفة</h2>
                    </div>
                    <div class="card mb-4 border-light border-gray-300 rounded-md overflow-hidden"
                        style="outline:2px solid #47474771"><iframe title="Google Map"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13125.57060550397!2d3.2493004!3d34.6700383!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1289cfdccedc26c9%3A0x4a9fbba18df6dab!2zQ2xpY2sgU2Nob29sIERqZWxmYSAtINmD2YTZitmDINiz2YPZiNmEINin2YTYrNmE2YHYqQ!5e0!3m2!1sar!2sma!4v1717087082208!5m2!1sar!2sma"
                            style="border:0;width:100%;height:40vh" allowfullscreen=""></iframe></div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="card my-1 border">
                        <h2 class="text-lg font-semibold my-2 bg-white">Click School Alger مدرسة المحمدية الخاصة</h2>
                    </div>
                    <div class="card mb-4 rounded-md overflow-hidden" style="outline:2px solid #47474771"><iframe
                            title="Google Map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3197.5949198422195!2d3.136773424797911!3d36.73228877152585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128e53139082042d%3A0xaaa0a02176fd9740!2zQ2xpY2sgU2Nob29sIEFsZ2VyINmF2K_Ysdiz2Kkg2KfZhNmF2K3Zhdiv2YrYqSDYp9mE2K7Yp9i12Kk!5e0!3m2!1sar!2sma!4v1717087176694!5m2!1sar!2sma"
                            style="border:0;width:100%;height:40vh" allowfullscreen=""></iframe></div>
                </div>
            </div>
        </div>
    </section>
@endsection
