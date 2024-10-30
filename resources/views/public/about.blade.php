@extends('layouts.main')



@section('main.content')

<livewire:public.section.slider-about-section />

<section class="py-4 shadow-sm position-relative bg-white" dir="rtl">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12" style="display: flex; justify-content: center;">
                <div class="text-dark fw-semibold lh-1 fs-4 mb-3 mb-lg-0">
                    <span class="icon-shape icon-xs rounded-circle text-center me-2"
                        style="background-color: rgba(247, 109, 173, 0.157);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                            class="bi bi-check" viewBox="0 0 16 16" style="color: rgb(232, 39, 130);">
                            <path
                                d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z">
                            </path>
                        </svg>
                    </span>
                    <span class="align-middle">شهادة قابلة للمشاركة</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12" style="display: flex; justify-content: center;">
                <div class="text-dark fw-semibold lh-1 fs-4 mb-3 mb-lg-0">
                    <span class="icon-shape icon-xs rounded-circle text-center me-2"
                        style="background-color: rgba(247, 109, 173, 0.157);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                            class="bi bi-check" viewBox="0 0 16 16" style="color: rgb(232, 39, 130);">
                            <path
                                d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z">
                            </path>
                        </svg>
                    </span>
                    <span class="align-middle">مواعيد مرنة</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12" style="display: flex; justify-content: center;">
                <div class="text-dark fw-semibold lh-1 fs-4 mb-3 mb-md-0">
                    <span class="icon-shape icon-xs rounded-circle text-center me-2"
                        style="background-color: rgba(247, 109, 173, 0.157);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                            class="bi bi-check" viewBox="0 0 16 16" style="color: rgb(232, 39, 130);">
                            <path
                                d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z">
                            </path>
                        </svg>
                    </span>
                    <span class="align-middle">دورات 100% عبر الإنترنت</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12" style="display: flex; justify-content: center;">
                <div class="text-dark fw-semibold lh-1 fs-4">
                    <span class="icon-shape icon-xs rounded-circle text-center me-2"
                        style="background-color: rgba(247, 109, 173, 0.157);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                            class="bi bi-check" viewBox="0 0 16 16" style="color: rgb(232, 39, 130);">
                            <path
                                d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z">
                            </path>
                        </svg>
                    </span>
                    <span class="align-middle">حوالي 24 ساعة</span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-8" dir="rtl">
    <div class="container my-lg-8">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-12 mb-6">
                <h2 class="display-4 mb-3 tajawal-bold">أهدافنا</h2>
                <p class="lead">هل تبحث عن تجربة تعليمية مميزة تحفزك على تحقيق أهدافك؟ انضم إلينا اليوم واحصل على فرصة
                    لا مثيل لها لاستكشاف عالم التعلم عبر الإنترنت. انطلق في رحلة تعليمية فريدة، حيث تجد الدعم والإلهام
                    والفرص لتطوير مهاراتك واكتساب معرفة جديدة. احجز الآن للانضمام إلى مجتمعنا المثير وابدأ في بناء
                    مستقبلك الأكاديمي بثقة ونجاح!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-12 mb-4">
                <div class="card h-100">
                    <img src="/assets/images/teachers/24.jpeg" class="card-img-top" alt="Image 1">
                    <div class="card-body">
                        <h3 class="card-title">تحقيق تجربة تعليمية مبتكرة وممتعة</h3>
                        <p class="card-text">نحن نسعى جاهدين لتوفير تجربة تعليمية فريدة ومبتكرة تلهم الطلاب وتحفزهم على
                            التعلم بشغف وإبداع. من خلال استخدام أحدث التقنيات وتطبيق أساليب تعليمية ممتعة وتفاعلية، نسعى
                            لجعل رحلة التعلم مثيرة وممتعة للجميع.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 mb-4">
                <div class="card h-100">
                    <img src="/assets/images/teachers/21.jpeg" class="card-img-top" alt="Image 2">
                    <div class="card-body">
                        <h3 class="card-title">توفير تعليم عالي الجودة لكافة التلاميذ بغض النظر عن مكان تواجدهم</h3>
                        <p class="card-text">نحن ملتزمون بتوفير فرص تعليمية متساوية وعالية الجودة لجميع الطلاب، بغض
                            النظر عن مكان تواجدهم أو خلفيتهم الثقافية. نسعى جاهدين لتحقيق الوصول المتساوي إلى التعليم
                            وتقديم تجارب تعلم شاملة تلبي احتياجات الطلاب المختلفة.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 mb-4">
                <div class="card h-100">
                    <img src="/assets/images/teachers/22.jpeg" class="card-img-top" alt="Image 3">
                    <div class="card-body">
                        <h3 class="card-title">المساهمة في تكافؤ الفرص</h3>
                        <p class="card-text">نحن نعمل على المساهمة في تعزيز تكافؤ الفرص التعليمية من خلال توفير بيئة
                            تعليمية شاملة ومتنوعة تتيح للجميع فرصة الوصول إلى التعليم على السواء. نسعى جاهدين لتقديم فرص
                            تعليمية تساعد على تحقيق النجاح لجميع الطلاب بغض النظر عن خلفيتهم الاجتماعية أو الاقتصادية.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-lg-8 py-6 bg-white">
    <div class="container my-lg-8">
        <div class="row" dir="rtl">
            <div class="col-xl-7 offset-xl-3 col-md-12 col-12">
                <div class="text-center mb-lg-8 mb-6">
                    <h1 class="tajawal-bold">
                        <p style="display: inline;">اكتشف</p>
                        <u class="text-warning mx-2">
                            <span class="text-primary">CLIC SCHOOL</span>
                        </u>
                        <p style="display: inline;">من خلال معرض الصور</p>
                    </h1>
                    <p class="lead mb-0">استمتعوا بمشاهدة بيئة التعليم المتميزة الذي يجعل مدرستنا الخيار الأفضل لأبنائكم
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div>
                <div
                    style="display: flex; flex-direction: row; place-content: stretch center; box-sizing: border-box; width: 100%; gap: 20px;">
                    <div
                        style="display: flex; flex-direction: column; place-content: stretch flex-start; flex: 1 1 0%; width: 0px; gap: 20px;">
                        <img src="/assets/images/clic/1.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                        <img src="/assets/images/clic/5.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                        <img src="/assets/images/clic/9.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                        <img src="/assets/images/clic/13.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                        <img src="/assets/images/clic/17.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                        <img src="/assets/images/clic/21.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                    </div>
                    <div
                        style="display: flex; flex-direction: column; place-content: stretch flex-start; flex: 1 1 0%; width: 0px; gap: 20px;">
                        <img src="/assets/images/clic/2.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                        <img src="/assets/images/clic/6.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                        <img src="/assets/images/clic/10.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                        <img src="/assets/images/clic/14.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                        <img src="/assets/images/clic/18.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                        <img src="/assets/images/clic/23.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                    </div>
                    <div
                        style="display: flex; flex-direction: column; place-content: stretch flex-start; flex: 1 1 0%; width: 0px; gap: 20px;">
                        <img src="/assets/images/clic/3.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                        <img src="/assets/images/clic/7.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                        <img src="/assets/images/clic/11.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                        <img src="/assets/images/clic/15.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                        <img src="/assets/images/clic/19.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                        <img src="/assets/images/clic/25.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                    </div>
                    <div
                        style="display: flex; flex-direction: column; place-content: stretch flex-start; flex: 1 1 0%; width: 0px; gap: 20px;">
                        <img src="/assets/images/clic/4.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                        <img src="/assets/images/clic/8.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                        <img src="/assets/images/clic/12.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                        <img src="/assets/images/clic/16.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                        <img src="/assets/images/clic/20.jpg" alt=""
                            style="width: 100%; display: block; cursor: pointer; margin: 5px; border-radius: 10px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-8 bg-gray" dir="rtl">
    <div class="container mt-lg-8">
        <div class="container my-lg-4">
            <div class="row">
                <div class="offset-lg-2 col-lg-8 col-md-12 col-12 mb-8">
                    <h1 class="display-2 tajawal-bold mb-3">انضم إلى مجتمع متعلّمي <span class="text-primary mx-2">CLIC
                            SCHOOL</span>
                    </h1>
                    <p class="h2 mb-3 tajawal-bold">لتُحدِث نقلة نوعية في مسيرتك الدراسية، من خلال البرامج المصمّمة
                        لتزويدك بالمعارف التي تحتاجها للارتقاء في سلم النجاح!</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="mb-6 mb-lg-0 fs-4">
                    <div class="icon-shape icon-lg bg-primary text-light-primary rounded-circle text-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-lightning-fill text-white" viewBox="0 0 16 16">
                            <path
                                d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641l2.5-8.5z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="tajawal-bold">محتوى عالي الجودة</h3>
                    <p>اكتسب المهارات والمعارف المطلوبة للتفوق في دراستك مع نخبة من أفضل الأساتذة.</p>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="mb-6 mb-lg-0 fs-4">
                    <div class="icon-shape icon-lg bg-primary text-light-primary rounded-circle text-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-layers-fill text-white" viewBox="0 0 16 16">
                            <path
                                d="M7.765 1.559a.5.5 0 0 1 .47 0l7.5 4a.5.5 0 0 1 0 .882l-7.5 4a.5.5 0 0 1-.47 0l-7.5-4a.5.5 0 0 1 0-.882l7.5-4z">
                            </path>
                            <path
                                d="m2.125 8.567-1.86.992a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882l-1.86-.992-5.17 2.756a1.5 1.5 0 0 1-1.41 0l-5.17-2.756z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="tajawal-bold">تعلُّم مرن</h3>
                    <p>تعلّم أينما كنت وفي أي وقت، عبر حاسوبك الشخصي أو هاتفك المتنقل مما يمنحك القدرة على تنظيم وقتك
                        والتعلم بأسلوبك الخاص.</p>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="mb-6 mb-lg-0 fs-4">
                    <div class="icon-shape icon-lg bg-primary text-light-primary rounded-circle text-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-phone text-white" viewBox="0 0 16 16">
                            <path
                                d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z">
                            </path>
                            <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"></path>
                        </svg>
                    </div>
                    <h3 class="tajawal-bold">جاهزية للاختبارات</h3>
                    <p>تميز في مدرستك واحصل على أعلى المعدلات بفضل نصائحنا ومنهجياتنا الفعالة في الإجابة على أسئلة
                        المسابقات</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-primary" dir="rtl">
    <div class="container">
        <div class="row align-items-center g-0">
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="py-6 py-lg-0">
                    <h1 class="text-white display-4 fw-bold pe-lg-8">انضم إلى فريقنا وشكّل مستقبل التعليم الإلكتروني
                    </h1>
                    <p class="text-white my-4 lead">إذا كنت متحمسًا وجاهزًا للانخراط، فنحن نرحب بلقائك. نحن ملتزمون بدعم
                        و تطوير رحلتك التعليمية بأحدث الطرق و الوسائل.</p>
                    <a href="/login" class="btn btn-dark">إنضم إلينا</a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 text-lg-end text-center py-6" style="border-radius: 50%;">
                <img alt="صورة البطل" loading="lazy" width="800" height="800" decoding="async" data-nimg="1"
                    class="img-fluid" src="/assets/images/teachers/cta1.jpeg" style="color: transparent;">
            </div>
        </div>
    </div>
</section>
@endsection