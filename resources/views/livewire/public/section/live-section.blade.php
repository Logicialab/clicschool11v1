<!--column-->
<section class="py-lg-8 py-6  bg-gray" dir="rtl">
  <div class="container my-lg-8">
    <div class="row">
      <div class="col-xl-6 col-md-12 col-12">
        <div class="mb-lg-8 mb-6">
          <h1 class="tajawal-bold">
            <u class="text-warning">
              <span class="text-primary">البثوث المباشرة التعليمية القادمة</span>
            </u>
          </h1>
          <p class="lead mb-0">لا تفوتوا فرص حضور البثوث المباشرة التعليمية القادمة للاستفادة من أحدث المعلومات والتفاعل مع الخبراء مباشرة.</p>
        </div>
      </div>
    </div>
    <div class="table-responsive-xl pb-6">
      <div class="row row-cols-lg-3 row-cols-1 flex-nowrap">
        @foreach($lives as $live)
        <div class="col">
          <div class="card mb-4 mb-xl-0 card-hover border rounded-3">
            <div class="p-3">
              <a href="#!">
                <img src="/storage/{{$live->image}}" alt="{{$live->title}}" class="img-fluid w-100 rounded-3">
              </a>
            </div>
            <div class="card-body">
              <h3 class="mb-4 text-truncate">
                <a href="#!" class="text-inherit">{{$live->title}}</a>
              </h3>
              <div class="mb-4">
                <div class="mb-3 lh-1">
                  <span class="me-1">
                    <i class="bi bi-calendar-check"></i>
                  </span>
                  <span>26 يونيو 2023</span>
                </div>
                <div class="lh-1">
                  <span class="align-text-top me-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                      <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"></path>
                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"></path>
                    </svg>
                  </span>
                  <span>{{$live->teacher->name}}</span>                </div>
              </div>
              <a href="/live/{{$live->slug}}" class="btn btn-light-primary text-primary">سجل الآن</a>
            </div>
          </div>
        </div>
        @endforeach
        <!-- <div class="col">
          <div class="card card-hover border rounded-3">
            <div class="p-3">
              <a href="#!">
                <img src="/assets/images/teachers/11.jpg" alt="webinar-3" class="img-fluid w-100 rounded-3">
              </a>
            </div>
            <div class="card-body">
              <h3 class="mb-4 text-truncate">
                <a href="#!" class="text-inherit">زيادة مهارات القراءة واللغة</a>
              </h3>
              <div class="mb-4">
                <div class="mb-3 lh-1">
                  <span class="me-1">
                    <i class="bi bi-calendar-check"></i>
                  </span>
                  <span>10 نوفمبر 2023</span>
                </div>
                <div class="lh-1">
                  <span class="align-text-top me-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                      <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"></path>
                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"></path>
                    </svg>
                  </span>
                  <span>10:00 مساءً بتوقيت الهند القياسي</span>
                </div>
              </div>
              <a href="formations" class="btn btn-light-primary text-primary">سجل الآن</a>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</section>