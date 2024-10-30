<div>
    
    <livewire:public.formation.formation-header title="{{$formation->title}}" description="{{$formation->description}}" type="{{$formation->formationType->name}}" teacher="{{$formation->teacher->name.' '.$formation->teacher->name}}" />
    <section class="pb-8" dir="rtl">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 mt-n8 mb-4 mb-lg-0">
                    <div class="card rounded-3">
                        <div class="card-header border-bottom-0 p-0">
                            <div>
                                <ul class="nav nav-lb-tab" id="tab" role="tablist">
                                    <li class="nav-item" role="presentation"><a class="nav-link active" id="table-tab"
                                            data-bs-toggle="pill" href="#" role="tab" aria-controls="table"
                                            aria-selected="true">المحتوى</a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link " id="description-tab"
                                            data-bs-toggle="pill" href="#description" role="tab" aria-controls="description"
                                            aria-selected="false" tabindex="-1">الوصف</a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link " id="review-tab"
                                            data-bs-toggle="pill" href="#review" role="tab" aria-controls="review"
                                            aria-selected="false" tabindex="-1">التعليقات</a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link " id="transcript-tab"
                                            data-bs-toggle="pill" href="#transcript" role="tab"
                                            aria-controls="transcript" aria-selected="false" tabindex="-1">الأجزاء</a>
                                    </li>
                                    <li class="nav-item" role="presentation"><a class="nav-link " id="faq-tab"
                                            data-bs-toggle="pill" href="#faq" role="tab" aria-controls="faq"
                                            aria-selected="false" tabindex="-1">الأسئلة</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="tabContent">
                                <div class="tab-pane fade active show" id="table" role="tabpanel"
                                    aria-labelledby="table-tab">
                                    <div class="accordion" id="courseAccordion">
                                        <div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0"><a
                                                        class="h4 mb-0 d-flex align-items-center active"
                                                        data-bs-toggle="collapse" href="#" aria-expanded="true"
                                                        aria-controls="course-1">
                                                        <div class="me-auto">مقدمة في الرياضيات</div><span
                                                            class="chevron-arrow ms-4"><i
                                                                class="fe fe-chevron-down fs-4"></i></span>
                                                    </a>
                                                    <div class="collapse show" id="course-1"
                                                        data-bs-parent="#courseAccordion">
                                                        <div class="pt-3 pb-2"><a href="course-resume.html"
                                                                class="mb-2 d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate"><span
                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                        <div class="rounded-circle"
                                                                            style="display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center">
                                                                            <svg stroke="currentColor" fill="currentColor"
                                                                                stroke-width="0" viewBox="0 0 24 24"
                                                                                height="10" width="10"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z">
                                                                                </path>
                                                                            </svg></div>
                                                                    </span><span>مقدمة</span></div>
                                                                <div class="text-truncate"><span>1m 7s</span></div>
                                                            </a><a href="course-resume.html"
                                                                class="mb-2 d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate"><span
                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                        <div class="rounded-circle"
                                                                            style="display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center">
                                                                            <svg stroke="currentColor" fill="currentColor"
                                                                                stroke-width="0" viewBox="0 0 24 24"
                                                                                height="10" width="10"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z">
                                                                                </path>
                                                                            </svg></div>
                                                                    </span><span>الدوال الخطية</span></div>
                                                                <div class="text-truncate"><span>3m 11s</span></div>
                                                            </a><a href="course-resume.html"
                                                                class="mb-2 d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate"><span
                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                        <div class="rounded-circle"
                                                                            style="display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center">
                                                                            <svg stroke="currentColor" fill="currentColor"
                                                                                stroke-width="0" viewBox="0 0 24 24"
                                                                                height="10" width="10"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z">
                                                                                </path>
                                                                            </svg></div>
                                                                    </span><span>الأعداد الصحيحة</span></div>
                                                                <div class="text-truncate"><span>2m 45s</span></div>
                                                            </a><a href="course-resume.html"
                                                                class="mb-2 d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate"><span
                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                        <div class="rounded-circle"
                                                                            style="display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center">
                                                                            <svg stroke="currentColor" fill="currentColor"
                                                                                stroke-width="0" viewBox="0 0 24 24"
                                                                                height="10" width="10"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z">
                                                                                </path>
                                                                            </svg></div>
                                                                    </span><span>الجبر</span></div>
                                                                <div class="text-truncate"><span>4m 18s</span></div>
                                                            </a><a href="course-resume.html"
                                                                class="mb-2 d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate"><span
                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                        <div class="rounded-circle"
                                                                            style="display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center">
                                                                            <svg stroke="currentColor" fill="currentColor"
                                                                                stroke-width="0" viewBox="0 0 24 24"
                                                                                height="10" width="10"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z">
                                                                                </path>
                                                                            </svg></div>
                                                                    </span><span>الهندسة الفراغية</span></div>
                                                                <div class="text-truncate"><span>3m 56s</span></div>
                                                            </a></div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0"><a
                                                        class="h4 mb-0 d-flex align-items-center "
                                                        data-bs-toggle="collapse" href="#" aria-expanded="false"
                                                        aria-controls="course-2">
                                                        <div class="me-auto">الرياضيات الأساسية</div><span
                                                            class="chevron-arrow ms-4"><i
                                                                class="fe fe-chevron-down fs-4"></i></span>
                                                    </a>
                                                    <div class="collapse " id="course-2"
                                                        data-bs-parent="#courseAccordion">
                                                        <div class="pt-3 pb-2"><a href="course-resume.html"
                                                                class="mb-2 d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate"><span
                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                        <div class="rounded-circle"
                                                                            style="display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center">
                                                                            <svg stroke="currentColor" fill="currentColor"
                                                                                stroke-width="0" viewBox="0 0 24 24"
                                                                                height="10" width="10"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z">
                                                                                </path>
                                                                            </svg></div>
                                                                    </span><span>مقدمة</span></div>
                                                                <div class="text-truncate"><span>1m 41s</span></div>
                                                            </a><a href="course-resume.html"
                                                                class="mb-2 d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate"><span
                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                        <div class="rounded-circle"
                                                                            style="display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center">
                                                                            <svg stroke="currentColor" fill="currentColor"
                                                                                stroke-width="0" viewBox="0 0 24 24"
                                                                                height="10" width="10"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z">
                                                                                </path>
                                                                            </svg></div>
                                                                    </span><span>الأعداد الكسرية</span></div>
                                                                <div class="text-truncate"><span>3m 39s</span></div>
                                                            </a><a href="course-resume.html"
                                                                class="mb-2 d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate"><span
                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                        <div class="rounded-circle"
                                                                            style="display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center">
                                                                            <svg stroke="currentColor" fill="currentColor"
                                                                                stroke-width="0" viewBox="0 0 24 24"
                                                                                height="10" width="10"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z">
                                                                                </path>
                                                                            </svg></div>
                                                                    </span><span>الأعداد العشرية</span></div>
                                                                <div class="text-truncate"><span>2m 55s</span></div>
                                                            </a></div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0"><a
                                                        class="h4 mb-0 d-flex align-items-center "
                                                        data-bs-toggle="collapse" href="#" aria-expanded="false"
                                                        aria-controls="course-3">
                                                        <div class="me-auto">الجبر والهندسة الإفتراضية</div><span
                                                            class="chevron-arrow ms-4"><i
                                                                class="fe fe-chevron-down fs-4"></i></span>
                                                    </a>
                                                    <div class="collapse " id="course-3"
                                                        data-bs-parent="#courseAccordion">
                                                        <div class="pt-3 pb-2"><a href="course-resume.html"
                                                                class="mb-2 d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate"><span
                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                        <div class="rounded-circle"
                                                                            style="display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center">
                                                                            <svg stroke="currentColor" fill="currentColor"
                                                                                stroke-width="0" viewBox="0 0 24 24"
                                                                                height="10" width="10"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z">
                                                                                </path>
                                                                            </svg></div>
                                                                    </span><span>الجبر الأساسي</span></div>
                                                                <div class="text-truncate"><span>1m 25s</span></div>
                                                            </a><a href="course-resume.html"
                                                                class="mb-2 d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate"><span
                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                        <div class="rounded-circle"
                                                                            style="display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center">
                                                                            <svg stroke="currentColor" fill="currentColor"
                                                                                stroke-width="0" viewBox="0 0 24 24"
                                                                                height="10" width="10"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z">
                                                                                </path>
                                                                            </svg></div>
                                                                    </span><span>الأشكال الهندسية</span></div>
                                                                <div class="text-truncate"><span>3m 12s</span></div>
                                                            </a><a href="course-resume.html"
                                                                class="mb-2 d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate"><span
                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                        <div class="rounded-circle"
                                                                            style="display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center">
                                                                            <svg stroke="currentColor" fill="currentColor"
                                                                                stroke-width="0" viewBox="0 0 24 24"
                                                                                height="10" width="10"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z">
                                                                                </path>
                                                                            </svg></div>
                                                                    </span><span>المعادلات الخطية</span></div>
                                                                <div class="text-truncate"><span>4m 08s</span></div>
                                                            </a></div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0"><a
                                                        class="h4 mb-0 d-flex align-items-center "
                                                        data-bs-toggle="collapse" href="#" aria-expanded="false"
                                                        aria-controls="course-4">
                                                        <div class="me-auto">التفاضل والتكامل</div><span
                                                            class="chevron-arrow ms-4"><i
                                                                class="fe fe-chevron-down fs-4"></i></span>
                                                    </a>
                                                    <div class="collapse " id="course-4"
                                                        data-bs-parent="#courseAccordion">
                                                        <div class="pt-3 pb-2"><a href="course-resume.html"
                                                                class="mb-2 d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate"><span
                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                        <div class="rounded-circle"
                                                                            style="display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center">
                                                                            <svg stroke="currentColor" fill="currentColor"
                                                                                stroke-width="0" viewBox="0 0 24 24"
                                                                                height="10" width="10"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z">
                                                                                </path>
                                                                            </svg></div>
                                                                    </span><span>مقدمة في التفاضل</span></div>
                                                                <div class="text-truncate"><span>2m 14s</span></div>
                                                            </a><a href="course-resume.html"
                                                                class="mb-2 d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate"><span
                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                        <div class="rounded-circle"
                                                                            style="display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center">
                                                                            <svg stroke="currentColor" fill="currentColor"
                                                                                stroke-width="0" viewBox="0 0 24 24"
                                                                                height="10" width="10"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z">
                                                                                </path>
                                                                            </svg></div>
                                                                    </span><span>التكامل الغير محدد</span></div>
                                                                <div class="text-truncate"><span>3m 49s</span></div>
                                                            </a><a href="course-resume.html"
                                                                class="mb-2 d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate"><span
                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                        <div class="rounded-circle"
                                                                            style="display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center">
                                                                            <svg stroke="currentColor" fill="currentColor"
                                                                                stroke-width="0" viewBox="0 0 24 24"
                                                                                height="10" width="10"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z">
                                                                                </path>
                                                                            </svg></div>
                                                                    </span><span>التفاضل العددي</span></div>
                                                                <div class="text-truncate"><span>5m 20s</span></div>
                                                            </a></div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0"><a
                                                        class="h4 mb-0 d-flex align-items-center "
                                                        data-bs-toggle="collapse" href="#" aria-expanded="false"
                                                        aria-controls="course-5">
                                                        <div class="me-auto">الإحصاء والاحتمالات</div><span
                                                            class="chevron-arrow ms-4"><i
                                                                class="fe fe-chevron-down fs-4"></i></span>
                                                    </a>
                                                    <div class="collapse " id="course-5"
                                                        data-bs-parent="#courseAccordion">
                                                        <div class="pt-3 pb-2"><a href="course-resume.html"
                                                                class="mb-2 d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate"><span
                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                        <div class="rounded-circle"
                                                                            style="display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center">
                                                                            <svg stroke="currentColor" fill="currentColor"
                                                                                stroke-width="0" viewBox="0 0 24 24"
                                                                                height="10" width="10"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z">
                                                                                </path>
                                                                            </svg></div>
                                                                    </span><span>الإحصاء الأساسي</span></div>
                                                                <div class="text-truncate"><span>1m 58s</span></div>
                                                            </a><a href="course-resume.html"
                                                                class="mb-2 d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate"><span
                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                        <div class="rounded-circle"
                                                                            style="display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center">
                                                                            <svg stroke="currentColor" fill="currentColor"
                                                                                stroke-width="0" viewBox="0 0 24 24"
                                                                                height="10" width="10"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z">
                                                                                </path>
                                                                            </svg></div>
                                                                    </span><span>الاحتمالات المتقدمة</span></div>
                                                                <div class="text-truncate"><span>4m 05s</span></div>
                                                            </a></div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0"><a
                                                        class="h4 mb-0 d-flex align-items-center "
                                                        data-bs-toggle="collapse" href="#" aria-expanded="false"
                                                        aria-controls="course-6">
                                                        <div class="me-auto">الهندسة التحليلية</div><span
                                                            class="chevron-arrow ms-4"><i
                                                                class="fe fe-chevron-down fs-4"></i></span>
                                                    </a>
                                                    <div class="collapse " id="course-6"
                                                        data-bs-parent="#courseAccordion">
                                                        <div class="pt-3 pb-2"><a href="course-resume.html"
                                                                class="mb-2 d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate"><span
                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                        <div class="rounded-circle"
                                                                            style="display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center">
                                                                            <svg stroke="currentColor" fill="currentColor"
                                                                                stroke-width="0" viewBox="0 0 24 24"
                                                                                height="10" width="10"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z">
                                                                                </path>
                                                                            </svg></div>
                                                                    </span><span>نقاط التقاطع</span></div>
                                                                <div class="text-truncate"><span>2m 37s</span></div>
                                                            </a><a href="course-resume.html"
                                                                class="mb-2 d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate"><span
                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                        <div class="rounded-circle"
                                                                            style="display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center">
                                                                            <svg stroke="currentColor" fill="currentColor"
                                                                                stroke-width="0" viewBox="0 0 24 24"
                                                                                height="10" width="10"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z">
                                                                                </path>
                                                                            </svg></div>
                                                                    </span><span>المستقيمات والأقواس</span></div>
                                                                <div class="text-truncate"><span>3m 18s</span></div>
                                                            </a><a href="course-resume.html"
                                                                class="mb-2 d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate"><span
                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                        <div class="rounded-circle"
                                                                            style="display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center">
                                                                            <svg stroke="currentColor" fill="currentColor"
                                                                                stroke-width="0" viewBox="0 0 24 24"
                                                                                height="10" width="10"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z">
                                                                                </path>
                                                                            </svg></div>
                                                                    </span><span>الدوال اللوغاريتمية</span></div>
                                                                <div class="text-truncate"><span>4m 46s</span></div>
                                                            </a></div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0"><a
                                                        class="h4 mb-0 d-flex align-items-center "
                                                        data-bs-toggle="collapse" href="#" aria-expanded="false"
                                                        aria-controls="course-7">
                                                        <div class="me-auto">الرياضيات التطبيقية</div><span
                                                            class="chevron-arrow ms-4"><i
                                                                class="fe fe-chevron-down fs-4"></i></span>
                                                    </a>
                                                    <div class="collapse " id="course-7"
                                                        data-bs-parent="#courseAccordion">
                                                        <div class="pt-3 pb-2"><a href="course-resume.html"
                                                                class="mb-2 d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate"><span
                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                        <div class="rounded-circle"
                                                                            style="display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center">
                                                                            <svg stroke="currentColor" fill="currentColor"
                                                                                stroke-width="0" viewBox="0 0 24 24"
                                                                                height="10" width="10"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z">
                                                                                </path>
                                                                            </svg></div>
                                                                    </span><span>الرياضيات في الحياة اليومية</span></div>
                                                                <div class="text-truncate"><span>2m 03s</span></div>
                                                            </a><a href="course-resume.html"
                                                                class="mb-2 d-flex justify-content-between align-items-center text-inherit">
                                                                <div class="text-truncate"><span
                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                        <div class="rounded-circle"
                                                                            style="display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center">
                                                                            <svg stroke="currentColor" fill="currentColor"
                                                                                stroke-width="0" viewBox="0 0 24 24"
                                                                                height="10" width="10"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z">
                                                                                </path>
                                                                            </svg></div>
                                                                    </span><span>الرياضيات في التكنولوجيا</span></div>
                                                                <div class="text-truncate"><span>3m 29s</span></div>
                                                            </a></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="description" role="tabpanel"
                                    aria-labelledby="description-tab">
                                    <div class="mb-4">
                                        <h3 class="mb-2">وصف الدورة الرياضية</h3>
                                        <p>إذا كنت تتعلم الرياضيات لأول مرة، أو إذا كنت تأتي من تخصص مختلف، فهذه الدورة،
                                            الرياضيات: البداية، ستمنحك الأساسيات لفهم الرياضيات. ستتعرف أولاً على أنواع
                                            المفاهيم الرياضية التي يمكن فهمها بسهولة، والمجالات التي يمكن أن تفيد من خلالها.
                                        </p>
                                    </div>
                                    <h4 class="mb-3">ما ستتعلمه</h4>
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6">
                                            <ul class="list-unstyled">
                                                <li class="d-flex mb-2"><span class="me-2"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" fill="currentColor"
                                                            class="bi bi-check-circle text-success" viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                                            </path>
                                                            <path
                                                                d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z">
                                                            </path>
                                                        </svg></span><span>التعرف على أهمية فهم المفاهيم الرياضية في حياتنا
                                                        اليومية.</span></li>
                                                <li class="d-flex mb-2"><span class="me-2"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" fill="currentColor"
                                                            class="bi bi-check-circle text-success" viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                                            </path>
                                                            <path
                                                                d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z">
                                                            </path>
                                                        </svg></span><span>تحليل الطرق الرياضية لحل المشكلات وتطبيقها في
                                                        حياتنا اليومية.</span></li>
                                                <li class="d-flex mb-2"><span class="me-2"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" fill="currentColor"
                                                            class="bi bi-check-circle text-success" viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                                            </path>
                                                            <path
                                                                d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z">
                                                            </path>
                                                        </svg></span><span>استكشاف كيفية تطبيق المفاهيم الرياضية في تحليل
                                                        المشكلات المعقدة.</span></li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <ul class="list-unstyled">
                                                <li class="d-flex mb-2"><span class="me-2"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" fill="currentColor"
                                                            class="bi bi-check-circle text-success" viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                                            </path>
                                                            <path
                                                                d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z">
                                                            </path>
                                                        </svg></span><span>استكشاف طرق تطبيق المفاهيم الرياضية في الحياة
                                                        العملية والمهنية.</span></li>
                                                <li class="d-flex mb-2"><span class="me-2"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" fill="currentColor"
                                                            class="bi bi-check-circle text-success" viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                                            </path>
                                                            <path
                                                                d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z">
                                                            </path>
                                                        </svg></span><span>تحليل كيفية استخدام الرياضيات في تحديد وتحليل
                                                        البيانات الكمية والنوعية.</span></li>
                                                <li class="d-flex mb-2"><span class="me-2"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" fill="currentColor"
                                                            class="bi bi-check-circle text-success" viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                                            </path>
                                                            <path
                                                                d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z">
                                                            </path>
                                                        </svg></span><span>تحليل الأساليب الرياضية لتطوير المهارات التحليلية
                                                        والتفكير النقدي.</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <div class="mb-3">
                                        <h3 class="mb-4">أراء و تقييمات التلاميذ</h3>
                                        <div class="row align-items-center">
                                            <div class="col-auto text-center">
                                                <h3 class="display-2 fw-bold">4.5</h3><span class="fs-6"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                        fill="currentColor" class="bi bi-star-fill text-warning"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </path>
                                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                        height="12" fill="currentColor"
                                                        class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </path>
                                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                        height="12" fill="currentColor"
                                                        class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </path>
                                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                        height="12" fill="currentColor"
                                                        class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </path>
                                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                        height="12" fill="currentColor"
                                                        class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                        </path>
                                                    </svg></span>
                                                <p class="mb-0 fs-6">(بناءً على 27 تقييم)</p>
                                            </div>
                                            <div class="col order-3 order-md-2">
                                                <div class="progress mb-3" style="height:6px">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width:90%" aria-valuenow="90" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-3" style="height:6px">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width:80%" aria-valuenow="80" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-3" style="height:6px">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width:70%" aria-valuenow="70" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-3" style="height:6px">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width:60%" aria-valuenow="60" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-0" style="height:6px">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width:50%" aria-valuenow="50" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-auto col-6 order-2 order-md-3">
                                                <div><span class="fs-6"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="12" height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                            </path>
                                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                            </path>
                                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                            </path>
                                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                            </path>
                                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                            </path>
                                                        </svg></span>
                                                    <p class="mb-0 fs-6">جيد جداً</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-start"><img
                                                            src="/assets/images/avatar/avatar-5.jpg"
                                                            class="me-3 rounded-circle" alt="تعليق المستخدم"
                                                            width="48" height="48">
                                                        <div class="flex-grow-1">
                                                            <h5 class="card-title mb-1">محمد علي</h5>
                                                            <p class="card-text"> "تطبيق رائع للتعلم عبر الإنترنت، أفضل
                                                                منصة تعليمية رأيتها! "</p><span class="text-muted fs-6">قبل
                                                                3 أيام</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-start"><img
                                                            src="/assets/images/avatar/avatar-3.jpg"
                                                            class="me-3 rounded-circle" alt="تعليق المستخدم"
                                                            width="48" height="48">
                                                        <div class="flex-grow-1">
                                                            <h5 class="card-title mb-1">سارة أحمد</h5>
                                                            <p class="card-text"> "أنصح به بشدة لمن يبحث عن تعليم ممتاز
                                                                ومحتوى تعليمي ذو جودة عالية "</p><span
                                                                class="text-muted fs-6">قبل 5 أيام</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-start"><img
                                                            src="/assets/images/avatar/avatar-2.jpg"
                                                            class="me-3 rounded-circle" alt="تعليق المستخدم"
                                                            width="48" height="48">
                                                        <div class="flex-grow-1">
                                                            <h5 class="card-title mb-1">أحمد حسن</h5>
                                                            <p class="card-text"> "تجربة رائعة مع محتوى تعليمي ممتاز
                                                                ومدرسين محترفين "</p><span class="text-muted fs-6">قبل 7
                                                                أيام</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center"><button class="btn btn-primary">عرض المزيد</button></div>
                                </div>
                                <div class="tab-pane fade " id="transcript" role="tabpanel"
                                    aria-labelledby="transcript-tab">
                                    <div>
                                        <h3 class="mb-3">النص الكامل من درس مقدمة الدرس في الرياضيات</h3>
                                        <div class="mb-4">
                                            <h4>نظرة عامة على الدرس<a href="#"
                                                    class="text-primary ms-2 h4">[00:00:00]</a></h4>
                                            <p class="mb-0">اسمي جون ديو وأعمل كمدرس في الرياضيات. أعمل على تطوير المناهج
                                                التعليمية وتعليم الطلاب الرياضيات بطرق مبتكرة. كنت سابقاً أعمل كمهندس في
                                                شركة IBM. أنا أعيش في بورتلاند، أوريغون.</p>
                                        </div>
                                        <div class="mb-4">
                                            <h4>نظرة على تطبيق الدرس العملي<a href="#"
                                                    class="text-primary ms-2 h4">[00:00:54]</a></h4>
                                            <p>سنقوم بالتعمق في المفاهيم الأساسية للرياضيات. سنركز على الأجزاء الضرورية التي
                                                نحتاجها لفهم الدروس القادمة بشكل أفضل. لن نقوم بالتعمق في كل تفاصيل
                                                الرياضيات، ولكننا سنتعرف على الأساسيات اللازمة لفهم الدروس القادمة بشكل
                                                أفضل.</p>
                                            <p>سنقوم بالتعمق في المفاهيم الأساسية للرياضيات. سنركز على الأجزاء الضرورية التي
                                                نحتاجها لفهم الدروس القادمة بشكل أفضل. لن نقوم بالتعمق في كل تفاصيل
                                                الرياضيات، ولكننا سنتعرف على الأساسيات اللازمة لفهم الدروس القادمة بشكل
                                                أفضل.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="faq" role="tabpanel" aria-labelledby="faq-tab">
                                    <div>
                                        <h3 class="mb-3">الدرس - الأسئلة الشائعة</h3>
                                        <div class="mb-4">
                                            <h4>كيف يساعدني هذا الدرس في فهم الرياضيات بشكل أفضل؟</h4>
                                            <p>اسمي جيسون وو وأعمل كمدرس في الرياضيات. أعمل على تطوير المناهج التعليمية
                                                وتعليم الطلاب الرياضيات بطرق مبتكرة. كنت سابقاً أعمل كمهندس في شركة IBM. أنا
                                                أعيش في بورتلاند، أوريغون.</p>
                                        </div>
                                        <div class="mb-4">
                                            <h4>ما أهمية هذا الدرس؟</h4>
                                            <p>سنقوم بالتعمق في المفاهيم الأساسية للرياضيات. سنركز على الأجزاء الضرورية التي
                                                نحتاجها لفهم الدروس القادمة بشكل أفضل. لن نقوم بالتعمق في كل تفاصيل
                                                الرياضيات، ولكننا سنتعرف على الأساسيات اللازمة لفهم الدروس القادمة بشكل
                                                أفضل.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 mt-lg-n8">
                    <div class="card mb-3 mb-4">
                        <div class="p-1">
                            <div
                                class="d-flex justify-content-center align-items-center rounded border-white border rounded-3 bg-cover">
                                <img src="/storage/{{$formation->image}}" alt="" srcset=""
                                    class="card-img-top"></div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3"><span class="text-dark fw-bold h2">600$</span><del
                                    class="fs-4">750$</del></div>
                            <div class="d-grid"><a href="#" class="btn btn-primary mb-2">ابدأ شهر مجاني</a><a
                                    href="#" class="btn btn-outline-primary">احصل على وصول كامل</a></div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div>
                            <div class="card-header">
                                <h4 class="mb-0">ماذا تتضمن</h4>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-transparent"><i
                                        class="fe fe-play-circle align-middle ms-2 text-primary"></i>12 ساعة فيديو</li>
                                <li class="list-group-item bg-transparent"><i
                                        class="fe fe-award me-2 align-middle text-success"></i>شهادة</li>
                                <li class="list-group-item bg-transparent"><i
                                        class="fe fe-calendar align-middle ms-2 text-info"></i>12 مقال</li>
                                <li class="list-group-item bg-transparent"><i
                                        class="fe fe-video align-middle ms-2 text-secondary"></i>مشاهدة دون اتصال</li>
                                <li class="list-group-item bg-transparent border-bottom-0"><i
                                        class="fe fe-clock align-middle ms-2 text-warning"></i>وصول مدى الحياة</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="position-relative"><img src="/assets/images/avatar/avatar-2.jpg"
                                        alt="avatar" class="rounded-circle avatar-xl"><a href="#"
                                        class="position-absolute mt-2 ms-n3" data-bs-toggle="tooltip"
                                        data-placement="top" aria-label="تم التحقق"
                                        data-bs-original-title="تم التحقق"><img
                                            src="/assets/images/svg/checked-mark.svg" alt="checked-mark" height="30"
                                            width="30"></a></div>
                                <div class="ms-4">
                                    <h4 class="mb-0">جيني ويلسون</h4>
                                    <p class="mb-1 fs-6">مطورة أمامية، مصممة</p>
                                    <p class="fs-6 mb-1 d-flex align-items-center"><span
                                            class="text-warning">4.5</span><span class="mx-1"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                fill="currentColor" class="bi bi-star-fill text-warning"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                </path>
                                            </svg></span>تقييم المدرب</p>
                                </div>
                            </div>
                            <div class="border-top row mt-3 border-bottom mb-3 g-0">
                                <div class="col">
                                    <div class="pe-1 ps-2 py-3">
                                        <h5 class="mb-0">11,604</h5><span>طالب</span>
                                    </div>
                                </div>
                                <div class="col border-start">
                                    <div class="pe-1 ps-3 py-3">
                                        <h5 class="mb-0">32</h5><span>دورات</span>
                                    </div>
                                </div>
                                <div class="col border-start">
                                    <div class="pe-1 ps-3 py-3">
                                        <h5 class="mb-0">12,230</h5><span>مراجعات</span>
                                    </div>
                                </div>
                            </div>
                            <p>أنا مصممة مبتكرة متخصصة في تجربة المستخدم/واجهة المستخدم مقرها في برلين. كمقيم إبداعي في
                                Figma استكشفت مدينة المستقبل وكيفية استخدام التكنولوجيا الجديدة.</p><a href="#"
                                class="btn btn-outline-secondary btn-sm">عرض التفاصيل</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-8 pb-3">
                <div class="row d-md-flex align-items-center mb-4">
                    <div class="col-12">
                        <h2 class="mb-0">الدورات ذات الصلة</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card mb-4 card-hover"><a href="#"><img src="/assets/images/teachers/27.jpg"
                                    alt="course" class="card-img-top"></a>
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2"><a href="#" class="text-inherit">كيفية إنشاء
                                        موقع ويب بسهولة باستخدام ريأكت</a></h4>
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><span><svg xmlns="http://www.w3.org/2000/svg"
                                                width="12" height="12" fill="currentColor"
                                                class="bi bi-clock align-baseline" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z">
                                                </path>
                                                <path
                                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z">
                                                </path>
                                            </svg></span><span>3 ساعات 56 دقيقة</span></li>
                                    <li class="list-inline-item"><svg class="me-1 mt-n1" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="3" y="8" width="2" height="6" rx="1"
                                                fill="#754FFE"></rect>
                                            <rect x="7" y="5" width="2" height="9" rx="1"
                                                fill="#DBD8E9"></rect>
                                            <rect x="11" y="2" width="2" height="12" rx="1"
                                                fill="#DBD8E9"></rect>
                                        </svg>مبتدئ</li>
                                </ul>
                                <div class="mt-3 d-flex align-baseline lh-1"><span class="fs-6"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                            </path>
                                        </svg></span><span class="text-warning mx-1">4.5</span><span
                                        class="fs-6">(7,700)</span></div>
                            </div>
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto"><img src="/assets/images/avatar/avatar-1.jpg"
                                            class="rounded-circle avatar-xs" alt="avatar"></div>
                                    <div class="col ms-2"><span>Morris Mccoy</span></div>
                                    <div class="col-auto"><a href="#" class="text-reset bookmark"><i
                                                class="fe fe-bookmark fs-4"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card mb-4 card-hover"><a href="#"><img src="/assets/images/teachers/28.jpg"
                                    alt="course" class="card-img-top"></a>
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2"><a href="#" class="text-inherit">GraphQL:
                                        مقدمة شاملة للمطورين والمصممين</a></h4>
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><span><svg xmlns="http://www.w3.org/2000/svg"
                                                width="12" height="12" fill="currentColor"
                                                class="bi bi-clock align-baseline" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z">
                                                </path>
                                                <path
                                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z">
                                                </path>
                                            </svg></span><span>5 ساعات 30 دقيقة</span></li>
                                    <li class="list-inline-item"><svg class="me-1 mt-n1" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="3" y="8" width="2" height="6" rx="1"
                                                fill="#754FFE"></rect>
                                            <rect x="7" y="5" width="2" height="9" rx="1"
                                                fill="#DBD8E9"></rect>
                                            <rect x="11" y="2" width="2" height="12" rx="1"
                                                fill="#DBD8E9"></rect>
                                        </svg>متوسط</li>
                                </ul>
                                <div class="mt-3 d-flex align-baseline lh-1"><span class="fs-6"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                            </path>
                                        </svg></span><span class="text-warning mx-1">4.8</span><span
                                        class="fs-6">(3,800)</span></div>
                            </div>
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto"><img src="/assets/images/avatar/avatar-2.jpg"
                                            class="rounded-circle avatar-xs" alt="avatar"></div>
                                    <div class="col ms-2"><span>Effie Hansen</span></div>
                                    <div class="col-auto"><a href="#" class="text-reset bookmark"><i
                                                class="fe fe-bookmark fs-4"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card mb-4 card-hover"><a href="#"><img src="/assets/images/teachers/29.jpg"
                                    alt="course" class="card-img-top"></a>
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2"><a href="#" class="text-inherit">Angular:
                                        إنشاء تطبيقات ويب ديناميكية وقوية</a></h4>
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><span><svg xmlns="http://www.w3.org/2000/svg"
                                                width="12" height="12" fill="currentColor"
                                                class="bi bi-clock align-baseline" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z">
                                                </path>
                                                <path
                                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z">
                                                </path>
                                            </svg></span><span>4 ساعات 10 دقائق</span></li>
                                    <li class="list-inline-item"><svg class="me-1 mt-n1" width="16"
                                            height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect x="3" y="8" width="2" height="6" rx="1"
                                                fill="#754FFE"></rect>
                                            <rect x="7" y="5" width="2" height="9" rx="1"
                                                fill="#DBD8E9"></rect>
                                            <rect x="11" y="2" width="2" height="12" rx="1"
                                                fill="#DBD8E9"></rect>
                                        </svg>متوسط</li>
                                </ul>
                                <div class="mt-3 d-flex align-baseline lh-1"><span class="fs-6"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            fill="currentColor" class="bi bi-star-fill text-warning"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            fill="currentColor" class="bi bi-star-fill text-warning"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            fill="currentColor" class="bi bi-star-fill text-warning"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            fill="currentColor" class="bi bi-star-fill text-warning"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                            </path>
                                        </svg></span><span class="text-warning mx-1">4.8</span><span
                                        class="fs-6">(4,200)</span></div>
                            </div>
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto"><img src="/assets/images/avatar/avatar-3.jpg"
                                            class="rounded-circle avatar-xs" alt="avatar"></div>
                                    <div class="col ms-2"><span>Sue Wood</span></div>
                                    <div class="col-auto"><a href="#" class="text-reset bookmark"><i
                                                class="fe fe-bookmark fs-4"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card mb-4 card-hover"><a href="#"><img
                                    src="/assets/images/teachers/30.jpg" alt="course" class="card-img-top"></a>
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2"><a href="#"
                                        class="text-inherit">JavaScript: دليل مبتدئين للمطورين الجدد</a></h4>
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><span><svg xmlns="http://www.w3.org/2000/svg"
                                                width="12" height="12" fill="currentColor"
                                                class="bi bi-clock align-baseline" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z">
                                                </path>
                                                <path
                                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z">
                                                </path>
                                            </svg></span><span>3 ساعات 50 دقيقة</span></li>
                                    <li class="list-inline-item"><svg class="me-1 mt-n1" width="16"
                                            height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect x="3" y="8" width="2" height="6" rx="1"
                                                fill="#754FFE"></rect>
                                            <rect x="7" y="5" width="2" height="9" rx="1"
                                                fill="#DBD8E9"></rect>
                                            <rect x="11" y="2" width="2" height="12" rx="1"
                                                fill="#DBD8E9"></rect>
                                        </svg>متوسط</li>
                                </ul>
                                <div class="mt-3 d-flex align-baseline lh-1"><span class="fs-6"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            fill="currentColor" class="bi bi-star-fill text-warning"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            fill="currentColor" class="bi bi-star-fill text-warning"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            fill="currentColor" class="bi bi-star-fill text-warning"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                            </path>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            fill="currentColor" class="bi bi-star-fill text-warning"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                            </path>
                                        </svg></span><span class="text-warning mx-1">4.8</span><span
                                        class="fs-6">(5,200)</span></div>
                            </div>
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto"><img src="/assets/images/avatar/avatar-4.jpg"
                                            class="rounded-circle avatar-xs" alt="avatar"></div>
                                    <div class="col ms-2"><span>Cheryl Beck</span></div>
                                    <div class="col-auto"><a href="#" class="text-reset bookmark"><i
                                                class="fe fe-bookmark fs-4"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>