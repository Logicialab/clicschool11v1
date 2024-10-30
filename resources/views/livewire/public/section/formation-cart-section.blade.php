<div class="row g-4" style="margin-top: 4rem;">
        @foreach($formations as $formation)
          <div class="col-md-6 col-lg-12">
            <div class="row border rounded-3 g-0 mb-3">
              <div class="col-xxl-9 col-xl-8 col-12">
                <div class="row p-lg-5 p-4 gy-5">
                  <div class="col-xl-3 col-md-3">
                    <div>
                      <a href="{{ route('formation.show', $formation->slug) }}">
                        <img src="/storage/{{$formation->image}}" alt="{{$formation->title}}" class="img-fluid w-100 rounded-3">
                      </a>
                    </div>
                    <div class="mt-4">
                      <div class="d-flex flex-row align-items-center gap-2">
                        <h3 class="mb-0 h2">
                          <a href="{{ route('formation.show', $formation->slug) }}" class="text-reset">{{$formation->teacher->name.' '.$formation->teacher->name}}</a>
                        </h3>
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708"></path>
                          </svg>
                        </span>
                      </div>
                      <span class="fw-medium">{{$formation->teacher->specialite}}</span>
                    </div>
                    <div>
                      <span>{{$formation->teacher->school_name}}</span>
                      <div class="vr mx-2 text-gray-200"></div>
                      <span>5 سنوات خبرة</span>
                    </div>
                  </div>
                  <div class="col-xl-9 col-md-9">
                    <div class="d-flex flex-column gap-4">
                      <div class="">
                        <h3 class="mb-0 h2">
                          <a href="{{ route('formation.show', $formation->slug) }}">{{$formation->title}}</a> 
                        </h3>
                        <span class="fw-medium">السنة الرابعة متوسط</span>
                      </div>
                      <div class="d-none d-md-block">
                        <p class="mb-0 pr-xl-5 pr-xxl-8">
                            {{$formation->description}}
                        </p>
                      </div>
                      <div class="gap-2 d-flex flex-wrap">
                        <a href="#" class="btn btn-tag btn-sm">تطوير الواجهة الأمامية</a>
                        <a href="#" class="btn btn-tag btn-sm">Devops</a>
                        <a href="#" class="btn btn-tag btn-sm">مصمم UI/UX</a>
                        <a href="#" class="btn btn-tag btn-sm">علوم البيانات</a>
                        <a href="#" class="btn btn-tag btn-sm">Full Stack</a>
                        <a href="#" class="btn btn-tag btn-sm">الواجهة الخلفية</a>
                        <a href="#" class="btn btn-tag btn-sm">محلل بيانات</a>
                      </div>
                      <div class="d-flex flex-row align-items-center gap-4">
                        <div class="d-flex flex-row gap-2 lh-1 align-items-center">
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-star-fill text-warning align-baseline" viewBox="0 0 16 16">
                              <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                            </svg>
                          </span>
                          <span>
                            <span class="text-dark fw-bold">5&nbsp;</span>(16&nbsp;مراجعة) </span>
                        </div>
                        <div class="d-flex flex-row gap-2 lh-1 align-items-center">
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-people-fill text-primary align-baseline" viewBox="0 0 16 16">
                              <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"></path>
                            </svg>
                          </span>
                          <span>
                            <span class="text-dark fw-bold">40&nbsp;</span>طالب </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-3 col-xl-4 col-12">
                <div class="p-lg-5 p-4 bg-light d-flex flex-column gap-3 rounded-end-xl-3 rounded-bottom-xl-0 rounded-bottom-md-3 h-100">
                  <div class="d-flex flex-column gap-3">
                    <div class="d-flex flex-column gap-1">
                      <span>إبتداءً من</span>
                      <div class="d-flex flex-row align-items-center gap-1">
                        <h3 class="mb-0 h2">$125</h3>
                        <small>/ ساعة</small>
                      </div>
                    </div>
                    <div class="d-flex d-xl-grid gap-2">
                      <a href="{{ route('formation.show', $formation->slug) }}" class="btn btn-outline-primary w-50 w-xl-100">عرض تفاصيل الدورة</a>
                      <a href="{{ route('teacher.show_slug', $formation->teacher->slug) }}" class="btn btn-outline-secondary w-50 w-xl-100">عرض الملف الشخصي للمعلم</a>
                    </div>
                    <div>
                      <span class="text-success fw-medium">المتاحة التالية:&nbsp;الثلاثاء 5 يونيو 2025</span>
                    </div>
                  </div>
                  <div class="d-flex flex-column gap-2">
                    <div>
                      <h4 class="mb-0">كل شهر من الإرشاد</h4>
                    </div>
                    <ul class="list-unstyled mb-0 d-flex flex-column gap-2">
                      <li class="d-flex flex-row gap-2 lh-1 align-items-center">
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-video" viewBox="0 0 16 16">
                            <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"></path>
                            <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm10.798 11c-.453-1.27-1.76-3-4.798-3-3.037 0-4.345 1.73-4.798 3H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1z"></path>
                          </svg>
                        </span>
                        <span>جلسة واحدة / الأسبوع (جلسات 1:1)</span>
                      </li>
                      <li class="d-flex flex-row gap-2 lh-1 align-items-center">
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-dots-fill" viewBox="0 0 16 16">
                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"></path>
                          </svg>
                        </span>
                        <span>في غضون 12 ساعة (دعم الدردشة)</span>
                      </li>
                      <li class="d-flex flex-row gap-2 lh-1 align-items-center">
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-task" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5zM3 3H2v1h1z"></path>
                            <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1z"></path>
                            <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5zM2 7h1v1H2zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm1 .5H2v1h1z"></path>
                          </svg>
                        </span>
                        <span>كل يوم (مهام ومتابعة)</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
          
</div>