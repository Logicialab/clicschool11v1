@section('title', 'Home tetcher')

@extends('layouts.student')



@section('student.content')
<!-- Card -->
<div class="card">
    <!-- Card header -->
    <div class="card-header">
        <h3 class="mb-0">إعدادات خصوصية الملف الشخصي</h3>
        <p class="mb-0">جعل ملفك الشخصي عامًا يسمح للمستخدمين الآخرين برؤية ما كنت تتعلمه على Geeks.</p>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <div class="row d-lg-flex justify-content-between">
            <div class="col-lg-9 col-md-7 col-12 mb-3 mb-lg-0">
                <h4 class="mb-0">مستويات الخصوصية</h4>
                <p class="mb-0">عرض ملفك الشخصي بشكل عام وخاص.</p>
            </div>
            <div class="col-lg-3 col-md-5 col-12">
                <select class="form-select">
                    <option value="">اختر</option>
                    <option value="public">عام</option>
                    <option value="private">خاص</option>
                </select>
            </div>
        </div>
        <hr class="my-5">
        <div>
            <h4 class="mb-0">إعدادات الملف الشخصي</h4>
            <p class="mb-5">تتيح لك هذه الضوابط تخصيص ما يمكن للآخرين رؤيته من ملفك الشخصي.</p>
            <!-- List group -->
            <ul class="list-group list-group-flush">
                <!-- List group item -->
                <li class="list-group-item d-flex align-items-center justify-content-between px-0 py-2">
                    <div>عرض ملفك الشخصي على محركات البحث</div>
                    <div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="swicthOne" checked="">
                            <label class="form-check-label" for="swicthOne"></label>
                        </div>
                    </div>
                </li>
                <!-- List group item -->
                <li class="list-group-item d-flex align-items-center justify-content-between px-0 py-2">
                    <div>عرض الدورات التي تشارك فيها على صفحة ملفك الشخصي</div>
                    <div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="switchTwo">
                            <label class="form-check-label" for="switchTwo"></label>
                        </div>
                    </div>
                </li>
                <!-- List group item -->
                <li class="list-group-item d-flex align-items-center justify-content-between px-0 py-2">
                    <div>عرض ملفك الشخصي بشكل عام</div>
                    <div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="switchThree" checked="">
                            <label class="form-check-label" for="switchThree"></label>
                        </div>
                    </div>
                </li>
                <!-- List group item -->
                <li class="list-group-item d-flex align-items-center justify-content-between px-0 py-2">
                    <div>حاليًا تتعلم</div>
                    <div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="switchFour" checked="">
                            <label class="form-check-label" for="switchFour"></label>
                        </div>
                    </div>
                </li>
                <!-- List group item -->
                <li class="list-group-item d-flex align-items-center justify-content-between px-0 py-2">
                    <div>الدورات المكتملة</div>
                    <div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="switchFive" checked="">
                            <label class="form-check-label" for="switchFive"></label>
                        </div>
                    </div>
                </li>
                <!-- List group item -->
                <li class="list-group-item d-flex align-items-center justify-content-between px-0 py-2">
                    <div>اهتماماتك</div>
                    <div>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="switchSix" checked="">
                            <label class="form-check-label" for="switchSix"></label>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

@endsection