<section class="py-lg-8 py-6 bg-white">
    <div class="container my-lg-8">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-md-12 col-12">
                <div class="text-center mb-lg-8 mb-6">
                    <h2 class="fw-bold h2-building-strong">
                        أكثر من 1600 أستاذ على بعد في جلسة تجريبية
                        <u class="text-warning"><span class="text-primary">مجانية</span></u>
                    </h2>
                    <p class="mb-0">اختر الأستاذ المثالي وابدأ بجلسة تجريبية مجانية</p>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="d-flex flex-md-row gap-2 flex-column justify-content-between">
                <form><label for="mentorInputSearch" class="form-label visually-hidden">بحث</label><input type="search"
                        class="form-control" id="mentorInputSearch" placeholder="البحث عن أستاذ" dir="rtl"></form>
                <div class="d-grid d-md-flex"><a href="#" class="btn btn-primary">استكشاف جميع الأساتذة</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($teachers as $teacher)
            <div class="col-xl-3 col-md-6 col-12 mt-3">
                <div class="card mb-4 card-hover border">
                    <a href="#!">
                        <img src="{{ $teacher->image ? \Storage::url($teacher->image) : '' }}"
                            alt="{{$teacher->name}} {{$teacher->name}}"
                            class="img-fluid w-100 img-teachers" />
                    </a>
                    <div class="card-body pt-0">
                        <div class="d-flex align-items-center gap-2">
                            <h4 class="m-0">
                                <a href="#!" class="text-inherit">{{$teacher->name}} {{$teacher->name}}</a>
                            </h4>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
                                    <path
                                        d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708">
                                    </path>
                                </svg>
                            </span>
                        </div>
                        <span class="">{{$teacher->bio}}</span>
                        <div class="d-flex align-items-center justify-content-between mb-4 mt-3 lh-1">
                            <div class="d-flex gap-1 align-items-center">
                                <span class="span-size">@ {{$teacher->specialite}}</span>
                                <div class="vr mx-2 text-gray-200"></div>
                                <span class="span-size">{{$teacher->school_name}}</span>
                            </div>
                            <!-- <div class="d-flex gap-1 align-items-center lh-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                            fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                            </path>
                        </svg>
                        <span class="fw-bold text-dark span-size">5.0</span>
                        <span class="span-size">(12 مراجعة)</span>
                    </div> -->
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="">
                                <span>تبدأ من</span>
                                <div class="d-flex flex-row gap-1 align-items-center">
                                    <h4 class="mb-0 h4-size">{{$teacher->hourly_rate}}</h4>
                                    <span class="fs-6">/ شهر</span>
                                </div>
                            </div>
                            <div class="">
                                <a href="/formations-single/{{$teacher->slug}}"
                                    class="btn btn-outline-primary span-size span-size">حجز جلسة تجريبية</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach




            {{-- <div class="col-xl-3 col-md-6 col-12 mt-3">
        <div class="card mb-4 card-hover border">
            <a href="#!">
                <img src="/assets/images//teachers/2.jpg" alt="design"
                    class="img-fluid w-100 img-teachers" />
            </a>
            <div class="card-body pt-0">
                <div class="d-flex align-items-center gap-2">
                    <h4 class="m-0">
                        <a href="#!" class="text-inherit">العربي بن مهيدي </a>
                    </h4>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-patch-check-fill text-success"
                            viewBox="0 0 16 16">
                            <path
                                d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708">
                            </path>
                        </svg>
                    </span>
                </div>
                <span class="">مهندس برمجيات</span>
                <div class="d-flex align-items-center justify-content-between mb-4 mt-3 lh-1">
                    <div class="d-flex gap-1 align-items-center">
                        <span class="span-size">@ أبل</span>
                        <div class="vr mx-2 text-gray-200"></div>
                        <span class="span-size">5 سنوات خبرة</span>
                    </div>
                    <div class="d-flex gap-1 align-items-center lh-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                            fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                            </path>
                        </svg>
                        <span class="fw-bold text-dark span-size">5.0</span>
                        <span class="span-size">(12 مراجعة)</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <span>تبدأ من</span>
                        <div class="d-flex flex-row gap-1 align-items-center">
                            <h4 class="mb-0 h4-size"> دينار 25.00</h4>
                            <span class="fs-6">/ شهر</span>
                        </div>
                    </div>
                    <div class="">
                        <a href="/formations-single"
                            class="btn btn-outline-primary span-size span-size">حجز جلسة تجريبية</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12 mt-3">
        <div class="card mb-4 card-hover border">
            <a href="#!">
                <img src="/assets/images/teachers/1.jpg" alt="development"
                    class="img-fluid w-100 img-teachers" />
            </a>
            <div class="card-body pt-0">
                <div class="d-flex align-items-center gap-2">
                    <h4 class="m-0">
                        <a href="#!" class="text-inherit">العربي بن مهيدي </a>
                    </h4>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-patch-check-fill text-success"
                            viewBox="0 0 16 16">
                            <path
                                d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708">
                            </path>
                        </svg>
                    </span>
                </div>
                <span class="">مهندس برمجيات</span>
                <div class="d-flex align-items-center justify-content-between mb-4 mt-3 lh-1">
                    <div class="d-flex gap-1 align-items-center">
                        <span class="span-size">@ جوجل</span>
                        <div class="vr mx-2 text-gray-200"></div>
                        <span class="span-size">5 سنوات خبرة</span>
                    </div>
                    <div class="d-flex gap-1 align-items-center lh-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                            fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                            </path>
                        </svg>
                        <span class="fw-bold text-dark span-size">5.0</span>
                        <span class="span-size">(12 مراجعة)</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <span>تبدأ من</span>
                        <div class="d-flex flex-row gap-1 align-items-center">
                            <h4 class="mb-0 h4-size"> دينار 25.00</h4>
                            <span class="fs-6">/ شهر</span>
                        </div>
                    </div>
                    <div class="">
                        <a href="/formations-single"
                            class="btn btn-outline-primary span-size span-size">حجز جلسة تجريبية</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12 mt-3">
        <div class="card mb-4 card-hover border">
            <a href="#!">
                <img src="/assets/images/teachers/3.jpg" alt="photography"
                    class="img-fluid w-100 img-teachers" />
            </a>
            <div class="card-body pt-0">
                <div class="d-flex align-items-center gap-2">
                    <h4 class="m-0">
                        <a href="#!" class="text-inherit">العربي بن مهيدي </a>
                    </h4>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-patch-check-fill text-success"
                            viewBox="0 0 16 16">
                            <path
                                d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708">
                            </path>
                        </svg>
                    </span>
                </div>
                <span class="">مهندس برمجيات</span>
                <div class="d-flex align-items-center justify-content-between mb-4 mt-3 lh-1">
                    <div class="d-flex gap-1 align-items-center">
                        <span class="span-size">@ أمازون</span>
                        <div class="vr mx-2 text-gray-200"></div>
                        <span class="span-size">5 سنوات خبرة</span>
                    </div>
                    <div class="d-flex gap-1 align-items-center lh-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                            fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                            </path>
                        </svg>
                        <span class="fw-bold text-dark span-size">5.0</span>
                        <span class="span-size">(12 مراجعة)</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <span>تبدأ من</span>
                        <div class="d-flex flex-row gap-1 align-items-center">
                            <h4 class="mb-0 h4-size"> دينار 25.00</h4>
                            <span class="fs-6">/ شهر</span>
                        </div>
                    </div>
                    <div class="">
                        <a href="/formations-single"
                            class="btn btn-outline-primary span-size span-size">حجز جلسة تجريبية</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12 mt-3">
        <div class="card mb-4 card-hover border">
            <a href="#!">
                <img src="/assets/images/teachers/4.jpg" alt="financial"
                    class="img-fluid w-100 img-teachers" />
            </a>
            <div class="card-body pt-0">
                <div class="d-flex align-items-center gap-2">
                    <h4 class="m-0">
                        <a href="#!" class="text-inherit">العربي بن مهيدي </a>
                    </h4>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-patch-check-fill text-success"
                            viewBox="0 0 16 16">
                            <path
                                d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708">
                            </path>
                        </svg>
                    </span>
                </div>
                <span class="">مهندس برمجيات</span>
                <div class="d-flex align-items-center justify-content-between mb-4 mt-3 lh-1">
                    <div class="d-flex gap-1 align-items-center">
                        <span class="span-size">@ مايكروسوفت</span>
                        <div class="vr mx-2 text-gray-200"></div>
                        <span class="span-size">5 سنوات خبرة</span>
                    </div>
                    <div class="d-flex gap-1 align-items-center lh-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                            fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                            </path>
                        </svg>
                        <span class="fw-bold text-dark span-size">5.0</span>
                        <span class="span-size">(12 مراجعة)</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <span>تبدأ من</span>
                        <div class="d-flex flex-row gap-1 align-items-center">
                            <h4 class="mb-0 h4-size"> دينار 25.00</h4>
                            <span class="fs-6">/ شهر</span>
                        </div>
                    </div>
                    <div class="">
                        <a href="/formations-single"
                            class="btn btn-outline-primary span-size span-size">حجز جلسة تجريبية</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12 mt-3">
        <div class="card mb-4 card-hover border">
            <a href="#!">
                <img src="/assets/images/teachers/5.jpg" alt="marketing"
                    class="img-fluid w-100 img-teachers" />
            </a>
            <div class="card-body pt-0">
                <div class="d-flex align-items-center gap-2">
                    <h4 class="m-0">
                        <a href="#!" class="text-inherit">العربي بن مهيدي </a>
                    </h4>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-patch-check-fill text-success"
                            viewBox="0 0 16 16">
                            <path
                                d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708">
                            </path>
                        </svg>
                    </span>
                </div>
                <span class="">مهندس برمجيات</span>
                <div class="d-flex align-items-center justify-content-between mb-4 mt-3 lh-1">
                    <div class="d-flex gap-1 align-items-center">
                        <span class="span-size">@ جوجل</span>
                        <div class="vr mx-2 text-gray-200"></div>
                        <span class="span-size">5 سنوات خبرة</span>
                    </div>
                    <div class="d-flex gap-1 align-items-center lh-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                            fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                            </path>
                        </svg>
                        <span class="fw-bold text-dark span-size">5.0</span>
                        <span class="span-size">(12 مراجعة)</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <span>تبدأ من</span>
                        <div class="d-flex flex-row gap-1 align-items-center">
                            <h4 class="mb-0 h4-size"> دينار 25.00</h4>
                            <span class="fs-6">/ شهر</span>
                        </div>
                    </div>
                    <div class="">
                        <a href="/formations-single"
                            class="btn btn-outline-primary span-size span-size">حجز جلسة تجريبية</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12 mt-3">
        <div class="card mb-4 card-hover border">
            <a href="#!">
                <img src="/assets/images/teachers/6.jpg" alt="language"
                    class="img-fluid w-100 img-teachers" />
            </a>
            <div class="card-body pt-0">
                <div class="d-flex align-items-center gap-2">
                    <h4 class="m-0">
                        <a href="#!" class="text-inherit">العربي بن مهيدي </a>
                    </h4>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-patch-check-fill text-success"
                            viewBox="0 0 16 16">
                            <path
                                d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708">
                            </path>
                        </svg>
                    </span>
                </div>
                <span class="">مهندس برمجيات</span>
                <div class="d-flex align-items-center justify-content-between mb-4 mt-3 lh-1">
                    <div class="d-flex gap-1 align-items-center">
                        <span class="span-size">@ جوجل</span>
                        <div class="vr mx-2 text-gray-200"></div>
                        <span class="span-size">5 سنوات خبرة</span>
                    </div>
                    <div class="d-flex gap-1 align-items-center lh-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                            fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                            </path>
                        </svg>
                        <span class="fw-bold text-dark span-size">5.0</span>
                        <span class="span-size">(12 مراجعة)</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <span>تبدأ من</span>
                        <div class="d-flex flex-row gap-1 align-items-center">
                            <h4 class="mb-0 h4-size"> دينار 25.00</h4>
                            <span class="fs-6">/ شهر</span>
                        </div>
                    </div>
                    <div class="">
                        <a href="/formations-single"
                            class="btn btn-outline-primary span-size span-size">حجز جلسة تجريبية</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12 mt-3">
        <div class="card mb-4 card-hover border">
            <a href="#!">
                <img src="/assets/images/teachers/7.jpg" alt="health"
                    class="img-fluid w-100 img-teachers" />
            </a>
            <div class="card-body pt-0">
                <div class="d-flex align-items-center gap-2">
                    <h4 class="m-0">
                        <a href="#!" class="text-inherit">العربي بن مهيدي </a>
                    </h4>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-patch-check-fill text-success"
                            viewBox="0 0 16 16">
                            <path
                                d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708">
                            </path>
                        </svg>
                    </span>
                </div>
                <span class="">مهندس برمجيات</span>
                <div class="d-flex align-items-center justify-content-between mb-4 mt-3 lh-1">
                    <div class="d-flex gap-1 align-items-center">
                        <span class="span-size">@ مايكروسوفت</span>
                        <div class="vr mx-2 text-gray-200"></div>
                        <span class="span-size">5 سنوات خبرة</span>
                    </div>
                    <div class="d-flex gap-1 align-items-center lh-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                            fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                            </path>
                        </svg>
                        <span class="fw-bold text-dark span-size">5.0</span>
                        <span class="span-size">(12 مراجعة)</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <span>تبدأ من</span>
                        <div class="d-flex flex-row gap-1 align-items-center">
                            <h4 class="mb-0 h4-size"> دينار 25.00</h4>
                            <span class="fs-6">/ شهر</span>
                        </div>
                    </div>
                    <div class="">
                        <a href="/formations-single"
                            class="btn btn-outline-primary span-size span-size">حجز جلسة تجريبية</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
     --}}


        </div>


    </div>
</section>