<section class="py-lg-8 py-6  bg-white" dir="rtl">
  <div class="container my-lg-8">
    <div class="row">
      <div class="col-xl-12 col-md-12 col-12">
        <div class="mb-6 mb-lg-8">
          <h2 class="h1 fw-bold">
            <p class="mr-2" style="display:inline">اكتشف</p>
            <u class="text-warning">
              <span class="text-primary mx-2">دورات المهارات</span>
            </u>
          </h2>
          <p class="mb-0 lead">دورات فيديو عبر الإنترنت مع إضافات جديدة تُنشر كل شهر.</p>
        </div>
      </div>
    </div>
    <div class="row">

    @foreach($courses as $course)
      <div class="col-xl-3 col-md-6 col-12 mt-3 d-flex" dir="rtl">
        <div class="card mb-4 card-hover border w-100 d-flex flex-column">
          <a href="#!">
            <img src="/storage/{{$course->image}}" alt="{{$course->title}}" class="img-fluid w-100 rounded-top-3">
          </a>
          <div class="card-body d-flex flex-column flex-grow-1">
            <h4 class="mb-3">
              <a href="#!" class="text-inherit">{{$course->title}}</a>
            </h4>
            <p>
                {{$course->description}}
            </p>
            <div class="d-flex align-items-center mb-5 lh-1 flex-grow-1">
              @if ($course->teacher)
                
              <span class="badge bg-success me-2">{{$course->teacher->name}}</span>
              @endif
              <!-- <div>
                <span class="text-inherit fw-semibold">4.9</span>
                <span class="ms-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="var(--gk-success)" class="bi bi-star-fill align-baseline" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                  </svg>(23)
                </span>
              </div> -->
              <div class="mx-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--gk-gray-400)" class="bi bi-dot" viewBox="0 0 16 16">
                  <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                </svg>
              </div>
              <div>
                @if ($course->unitCourse)
                  
                          <span class="text-inherit fw-semibold me-1"></span>{{$course->unitCourse->title}}
                @endif
         
              </div>
            </div>
            <a href="/course/{{ $course->slug }}" class="mt-auto">اشترك اليوم <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="mx-1" style="margin-top:1.5px" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    @endforeach

    
      <!-- <div class="col-xl-3 col-md-6 col-12 mt-3 d-flex" dir="rtl">
        <div class="card mb-4 card-hover border w-100 d-flex flex-column">
          <a href="#!">
            <img src="/assets/images/teachers/14.jpg" alt=" نادي الرسم و الأشغال اليدوية" class="img-fluid w-100 rounded-top-3">
          </a>
          <div class="card-body d-flex flex-column flex-grow-1">
            <h4 class="mb-3">
              <a href="#!" class="text-inherit"> نادي الرسم و الأشغال اليدوية</a>
            </h4>
            <div class="d-flex align-items-center mb-5 lh-1 flex-grow-1">
              <div>
                <span class="text-inherit fw-semibold">5</span>
                <span class="ms-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="var(--gk-success)" class="bi bi-star-fill align-baseline" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                  </svg>(32)
                </span>
              </div>
              <div class="mx-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--gk-gray-400)" class="bi bi-dot" viewBox="0 0 16 16">
                  <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                </svg>
              </div>
              <div>
                <span class="text-inherit fw-semibold me-1">10</span>ساعات
              </div>
            </div>
            <a href="/login" class="mt-auto">اشترك اليوم <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="mx-1" style="margin-top:1.5px" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 col-12 mt-3 d-flex" dir="rtl">
        <div class="card mb-4 card-hover border w-100 d-flex flex-column">
          <a href="#!">
            <img src="/assets/images/teachers/15.jpg" alt="  الألعاب الفكرية و نشاطات التركيز" class="img-fluid w-100 rounded-top-3">
          </a>
          <div class="card-body d-flex flex-column flex-grow-1">
            <h4 class="mb-3">
              <a href="#!" class="text-inherit"> الألعاب الفكرية و نشاطات التركيز</a>
            </h4>
            <div class="d-flex align-items-center mb-5 lh-1 flex-grow-1">
              <div>
                <span class="text-inherit fw-semibold">4.7</span>
                <span class="ms-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="var(--gk-success)" class="bi bi-star-fill align-baseline" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                  </svg>(45)
                </span>
              </div>
              <div class="mx-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--gk-gray-400)" class="bi bi-dot" viewBox="0 0 16 16">
                  <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                </svg>
              </div>
              <div>
                <span class="text-inherit fw-semibold me-1">9</span>ساعات
              </div>
            </div>
            <a href="/login" class="mt-auto">اشترك اليوم <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="mx-1" style="margin-top:1.5px" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 col-12 mt-3 d-flex" dir="rtl">
        <div class="card mb-4 card-hover border w-100 d-flex flex-column">
          <a href="#!">
            <img src="/assets/images/teachers/16.jpg" alt=" تحسين الخط و الكتابة" class="img-fluid w-100 rounded-top-3">
          </a>
          <div class="card-body d-flex flex-column flex-grow-1">
            <h4 class="mb-3">
              <a href="#!" class="text-inherit"> تحسين الخط و الكتابة</a>
            </h4>
            <div class="d-flex align-items-center mb-5 lh-1 flex-grow-1">
              <div>
                <span class="text-inherit fw-semibold">4.8</span>
                <span class="ms-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="var(--gk-success)" class="bi bi-star-fill align-baseline" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                  </svg>(27)
                </span>
              </div>
              <div class="mx-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--gk-gray-400)" class="bi bi-dot" viewBox="0 0 16 16">
                  <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                </svg>
              </div>
              <div>
                <span class="text-inherit fw-semibold me-1">11</span>ساعات
              </div>
            </div>
            <a href="/login" class="mt-auto">اشترك اليوم <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="mx-1" style="margin-top:1.5px" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 col-12 mt-3 d-flex" dir="rtl">
        <div class="card mb-4 card-hover border w-100 d-flex flex-column">
          <a href="#!">
            <img src="/assets/images/teachers/17.jpg" alt="تعليم الفرنسية و الإنجليزية " class="img-fluid w-100 rounded-top-3">
          </a>
          <div class="card-body d-flex flex-column flex-grow-1">
            <h4 class="mb-3">
              <a href="#!" class="text-inherit">تعليم الفرنسية و الإنجليزية </a>
            </h4>
            <div class="d-flex align-items-center mb-5 lh-1 flex-grow-1">
              <div>
                <span class="text-inherit fw-semibold">4.6</span>
                <span class="ms-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="var(--gk-success)" class="bi bi-star-fill align-baseline" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                  </svg>(22)
                </span>
              </div>
              <div class="mx-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--gk-gray-400)" class="bi bi-dot" viewBox="0 0 16 16">
                  <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                </svg>
              </div>
              <div>
                <span class="text-inherit fw-semibold me-1">7</span>ساعات
              </div>
            </div>
            <a href="/login" class="mt-auto">اشترك اليوم <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="mx-1" style="margin-top:1.5px" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 col-12 mt-3 d-flex" dir="rtl">
        <div class="card mb-4 card-hover border w-100 d-flex flex-column">
          <a href="#!">
            <img src="/assets/images/teachers/18.jpg" alt=" تحفيظ القران الكريم" class="img-fluid w-100 rounded-top-3">
          </a>
          <div class="card-body d-flex flex-column flex-grow-1">
            <h4 class="mb-3">
              <a href="#!" class="text-inherit"> تحفيظ القران الكريم</a>
            </h4>
            <div class="d-flex align-items-center mb-5 lh-1 flex-grow-1">
              <div>
                <span class="text-inherit fw-semibold">4.9</span>
                <span class="ms-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="var(--gk-success)" class="bi bi-star-fill align-baseline" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                  </svg>(35)
                </span>
              </div>
              <div class="mx-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--gk-gray-400)" class="bi bi-dot" viewBox="0 0 16 16">
                  <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                </svg>
              </div>
              <div>
                <span class="text-inherit fw-semibold me-1">14</span>ساعات
              </div>
            </div>
            <a href="/login" class="mt-auto">اشترك اليوم <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="mx-1" style="margin-top:1.5px" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 col-12 mt-3 d-flex" dir="rtl">
        <div class="card mb-4 card-hover border w-100 d-flex flex-column">
          <a href="#!">
            <img src="/assets/images/teachers/19.jpg" alt=" SUMMER SCHOOL" class="img-fluid w-100 rounded-top-3">
          </a>
          <div class="card-body d-flex flex-column flex-grow-1">
            <h4 class="mb-3">
              <a href="#!" class="text-inherit"> SUMMER SCHOOL</a>
            </h4>
            <div class="d-flex align-items-center mb-5 lh-1 flex-grow-1">
              <div>
                <span class="text-inherit fw-semibold">4.7</span>
                <span class="ms-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="var(--gk-success)" class="bi bi-star-fill align-baseline" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                  </svg>(29)
                </span>
              </div>
              <div class="mx-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--gk-gray-400)" class="bi bi-dot" viewBox="0 0 16 16">
                  <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                </svg>
              </div>
              <div>
                <span class="text-inherit fw-semibold me-1">13</span>ساعات
              </div>
            </div>
            <a href="/login" class="mt-auto">اشترك اليوم <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="mx-1" style="margin-top:1.5px" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
      <div class="col-xl-12 col-md-12 col-12">
        <div class="mt-4">
          <a href="/formations" class="btn btn-light-primary text-primary">إكتشف المزيد من الدورات</a>
        </div>
      </div> 
      -->
    </div>
  </div>
</section>