@section('title', 'Home tetcher')

@extends('layouts.student')



@section('student.content')
<!-- Card -->
<div class="card">
    <!-- Card header -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <!-- Notification -->
            <h3 class="mb-0">الإشعارات</h3>
            <p class="mb-0">ستتلقى فقط الإشعارات التي تم تفعيلها.</p>
        </div>
        <div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="checkAll" checked="">
                <label class="form-check-label" for="checkAll"></label>
            </div>
        </div>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <div class="mb-5">
            <h4 class="mb-0">تنبيهات الأمان</h4>
            <p>ستتلقى فقط الإشعارات عبر البريد الإلكتروني التي تريدها.</p>
            <!-- List group -->
            <ul class="list-group list-group-flush">
                <!-- List group item -->
                <li class="list-group-item d-flex align-items-center justify-content-between px-0 py-2">
                    <div>إرسال بريد إلكتروني عند مواجهة نشاط غير عادي</div>
                    <div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="switchOne" checked="">
                            <label class="form-check-label" for="switchOne"></label>
                        </div>
                    </div>
                </li>
                <!-- List group item -->
                <li class="list-group-item d-flex align-items-center justify-content-between px-0 py-2">
                    <div>إرسال بريد إلكتروني إذا تم استخدام متصفح جديد لتسجيل الدخول</div>
                    <div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="switchTwo">
                            <label class="form-check-label" for="switchTwo"></label>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="mb-5">
            <h4 class="mb-0">الأخبار</h4>
            <p>ستتلقى فقط الإشعارات عبر البريد الإلكتروني التي تريدها.</p>
            <!-- List group-->
            <ul class="list-group list-group-flush">
                <!-- List group item -->
                <li class="list-group-item d-flex align-items-center justify-content-between px-0 py-2">
                    <div>إعلامي عبر البريد الإلكتروني حول المبيعات والأخبار الحديثة</div>
                    <div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="switchThree" checked="">
                            <label class="form-check-label" for="switchThree"></label>
                        </div>
                    </div>
                </li>
                <!-- List group item -->
                <li class="list-group-item d-flex align-items-center justify-content-between px-0 py-2">
                    <div>إرسال بريد إلكتروني حول الميزات والتحديثات الجديدة</div>
                    <div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="switchFour">
                            <label class="form-check-label" for="switchFour"></label>
                        </div>
                    </div>
                </li>
                <!-- List group item -->
                <li class="list-group-item d-flex align-items-center justify-content-between px-0 py-2">
                    <div>إرسال بريد إلكتروني حول نصائح استخدام الحساب</div>
                    <div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="switchFive" checked="">
                            <label class="form-check-label" for="switchFive"></label>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div>
            <!-- Content -->
            <h4 class="mb-0">الدورات</h4>
            <p>ستتلقى فقط الإشعارات عبر البريد الإلكتروني التي تريدها.</p>
            <!-- List group -->
            <ul class="list-group list-group-flush mb-4">
                <!-- List group item -->
                <li class="list-group-item d-flex justify-content-between px-0">
                    <div>
                        <h5 class="mb-0">تحديثات من الدورات التي تأخذها</h5>
                        <span class="text-body">إعلانات، أحداث، ونصائح وحيل.</span>
                    </div>
                    <div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="switchSix" checked="">
                            <label class="form-check-label" for="switchSix"></label>
                        </div>
                    </div>
                </li>
                <!-- List group item -->
                <li class="list-group-item d-flex justify-content-between px-0">
                    <div>
                        <h5 class="mb-0">تحديثات من مناقشات المعلمين</h5>
                        <span class="text-body">المناقشات العامة خارج الفصل التي يشاركها المعلمون مع جميع متابعيهم.</span>
                    </div>
                    <div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="switchSeven">
                            <label class="form-check-label" for="switchSeven"></label>
                        </div>
                    </div>
                </li>
                <!-- List group item -->
                <li class="list-group-item d-flex justify-content-between px-0">
                    <div>
                        <h5 class="mb-0">توصيات الدورات المخصصة</h5>
                        <span class="text-body">توصيات أسبوعية مخصصة لاهتماماتك.</span>
                    </div>
                    <div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="switchEight">
                            <label class="form-check-label" for="switchEight"></label>
                        </div>
                    </div>
                </li>
                <!-- List group item -->
                <li class="list-group-item d-flex justify-content-between px-0">
                    <div>
                        <h5 class="mb-0">المحتوى المميز</h5>
                        <p class="mb-0 text-body">نصائح حول استخدام الدورات ولوحة التحكم، وورش العمل، والكتب، والدروس، والعديد من المقالات المفيدة.</p>
                    </div>
                    <div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="switchNine">
                            <label class="form-check-label" for="switchNine"></label>
                        </div>
                    </div>
                </li>
                <!-- List group item -->
                <li class="list-group-item d-flex justify-content-between px-0">
                    <div>
                        <h5 class="mb-0">تحديثات المنتج</h5>
                        <p class="mb-0 text-body">سنرسل لك نشرة إخبارية تعلن عن تحديثات المنتج الأساسية في CoursesUI.</p>
                    </div>
                    <div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="switchTen">
                            <label class="form-check-label" for="switchTen"></label>
                        </div>
                    </div>
                </li>
                <!-- List group item -->
                <li class="list-group-item d-flex justify-content-between px-0">
                    <div>
                        <h5 class="mb-0">الأحداث والعروض</h5>
                        <p class="mb-0 text-body">إعلان عن العروض الترويجية والأحداث القادمة، مثل جلسات اسألني أي شيء والندوات عبر الإنترنت.</p>
                    </div>
                    <div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="switchEleven">
                            <label class="form-check-label" for="switchEleven"></label>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- Short note -->
            <a href="#" class="text-danger mb-2 d-block">
                <u>إلغاء الاشتراك في جميع ما سبق</u>
            </a>
            <p class="mb-0">يرجى ملاحظة: ستظل تتلقى رسائل بريد إلكتروني إدارية مهمة، مثل إعادة تعيين كلمة المرور.</p>
        </div>
    </div>
</div>
@endsection