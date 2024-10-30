@extends('layouts.main')



@section('main.content')
<section class="py-4 py-lg-6 bg-primary">
    <div class="container">
        <div class="row">
            <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                <div class="d-lg-flex align-items-center justify-content-between">
                    <!-- Content -->
                    <div class="mb-4 mb-lg-0">
                        <h1 class="text-white mb-1">قم بإنشاء حسابك</h1>
                    </div>
                    <div>
                        <a href="/pricing" class="btn btn-white">العودة إلى الأسعار</a>
                        {{-- <a href="#" class="btn btn-dark">حفظ</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pb-8">
    <div class="container">
        <div id="courseForm" class="bs-stepper">
            <div class="row">
                <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                    <!-- Stepper Button -->
                    <div class="bs-stepper-header shadow-sm" role="tablist">
                        <div class="step" data-target="#test-l-1">
                            <button type="button" class="step-trigger" role="tab" id="courseFormtrigger1"
                                aria-controls="test-l-1">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label">معلومات شخصية</span>
                            </button>
                        </div>
                        <div class="bs-stepper-line"></div>
                        <div class="step" data-target="#test-l-2">
                            <button type="button" class="step-trigger" role="tab" id="courseFormtrigger2"
                                aria-controls="test-l-2">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">معلومات التلميذ</span>
                            </button>
                        </div>
                        <div class="bs-stepper-line"></div>
                        <div class="step" data-target="#test-l-4">
                            <button type="button" class="step-trigger" role="tab" id="courseFormtrigger4"
                                aria-controls="test-l-4">
                                <span class="bs-stepper-circle">3</span>
                                <span class="bs-stepper-label">معلومات الدفع</span>
                            </button>
                        </div>
                    </div>
                    <!-- Stepper content -->
                    



                    <div class="bs-stepper-content mt-5">
                        <form action="{{ route('account.store') }}" method="POST" onsubmit="return validateForm()">
                            @csrf

                            <!-- Content one -->
                            <div id="test-l-1" role="tabpanel" class="bs-stepper-pane fade"
                                aria-labelledby="courseFormtrigger1">
                                <!-- Card -->
                                <div class="card mb-3">
                                    <div class="card-header border-bottom px-4 py-3">
                                        <h4 class="mb-0">معلومات شخصية</h4>
                                    </div>
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="d-flex row mb-3">
                                            <div class="col-md-4">
                                                <label for="name" class="form-label">الإسم</label>
                                                <input id="name" name="name" class="form-control" type="text"
                                                    placeholder="الإسم" required />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="nickname" class="form-label">لقب التلميذ/ة</label>
                                                <input id="nickname" name="nickname" class="form-control" type="text"
                                                    placeholder="لقب التلميذ/ة" style="direction: rtl" />
                                            </div>
                                        </div>
                                        <div class="d-flex row mb-3">
                                            <div class="col-md-12">
                                                <label for="address" class="form-label">العنوان</label>
                                                <input id="address" name="address" class="form-control" type="text"
                                                    placeholder="العنوان" style="direction: rtl" required />
                                            </div>
                                        </div>
                                        <div class="d-flex row mb-3">
                                            <div class="col-md-4">
                                                <label for="street" class="form-label">الشارع</label>
                                                <input id="street" name="street" class="form-control" type="text"
                                                    placeholder="الشارع" style="direction: rtl" required />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="neighborhood" class="form-label">الحي</label>
                                                <input id="neighborhood" name="neighborhood" class="form-control"
                                                    type="text" placeholder="الحي" style="direction: rtl" required />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="city" class="form-label">المدينة</label>
                                                <input id="city" name="city" class="form-control" type="text"
                                                    placeholder="المدينة" style="direction: rtl" required />
                                            </div>
                                        </div>
                                        <div class="d-flex row mb-3">
                                            <div class="col-md-4">
                                                <label for="email" class="form-label">البريد الإلكتروني</label>
                                                <input id="email" name="email" class="form-control" type="email"
                                                    placeholder="البريد الإلكتروني" style="direction: rtl" required />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="password" class="form-label">كلمة المرور</label>
                                                <input id="password" name="password" class="form-control"
                                                    type="password" placeholder="***********" style="direction: rtl"
                                                    required />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="password_confirm" class="form-label">تأكيد كلمة
                                                    المرور</label>
                                                <input id="password_confirm" name="password_confirm"
                                                    class="form-control" type="password" placeholder="تأكيد كلمة المرور"
                                                    style="direction: rtl" required />
                                            </div>
                                        </div>
                                        <div class="d-flex row mb-3">
                                            <div class="col-md-4">
                                                <label for="sexe" class="form-label">الجنس</label>
                                                <select id="sexe" name="sexe" class="form-control" required>
                                                    <option value="" selected>اختر الجنس</option>
                                                    <option value="ذكر">ذكر</option>
                                                    <option value="أنثى">أنثى</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="date_birth" class="form-label">تاريخ ميلاد التلميذ/ة</label>
                                                <input id="date_birth" name="date_birth" class="form-control flatpickr"
                                                    type="text" placeholder="حدد تاريخ"
                                                    aria-describedby="basic-addon2"  required/>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="phone" class="form-label">رقم الهاتف الأول لولي
                                                    الأمر</label>
                                                <input id="phone" name="phone" class="form-control" type="text"
                                                    placeholder="رقم الهاتف الأول لولي الأمر" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="btn btn-primary" onclick="courseForm.next()">التالي</div>
                            </div>

                            <!-- Content two -->
                            <div id="test-l-2" role="tabpanel" class="bs-stepper-pane fade"
                                aria-labelledby="courseFormtrigger2">
                                <!-- Card -->
                                <div class="card mb-3 border-0">
                                    <div class="card-header border-bottom px-4 py-3">
                                        <h4 class="mb-0">معلومات التلميذ</h4>
                                    </div>
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="d-flex row mb-3">
                                            <div class="col-md-4">
                                                <label for="student_level" class="form-label">المستوى الحالي
                                                    للتلميذ:</label>
                                                <select id="student_level" name="student_level" class="form-select" required>
                                                    <option value="" selected>تحديد مستوى الطالب</option>
                                                    <option value="لا يدرس">لا يدرس</option>
                                                    <option value="روضة">روضة</option>
                                                    <option value="تحضيري">تحضيري</option>
                                                    <option value="أولى ابتدائي">أولى ابتدائي</option>
                                                    <option value="ثانية ابتدائي">ثانية ابتدائي</option>
                                                    <option value="ثالثة ابتدائي">ثالثة ابتدائي</option>
                                                    <option value="رابعة ابتدائي">رابعة ابتدائي</option>
                                                    <option value="خامسة ابتدائي">خامسة ابتدائي</option>
                                                    <option value="أولى متوسط">أولى متوسط</option>
                                                    <option value="ثانية متوسط">ثانية متوسط</option>
                                                    <option value="ثالثة متوسط">ثالثة متوسط</option>
                                                    <option value="رابعة متوسط">رابعة متوسط</option>
                                                    <option value="أولى ثانوي علمي">أولى ثانوي علمي</option>
                                                    <option value="ثانية ثانوي علمي">ثانية ثانوي علمي</option>
                                                    <option value="ثانية ثانوي رياضي">ثانية ثانوي رياضي</option>
                                                    <option value="ثالثة ثانوي علمي">ثالثة ثانوي علمي</option>
                                                    <option value="ثالثة ثانوي رياضي">ثالثة ثانوي رياضي</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="school_name" class="form-label">اسم المدرسة الحالية:</label>
                                                <input id="school_name" name="school_name" class="form-control"
                                                    type="text" placeholder="اسم المدرسة الحالية:" required/>
                                            </div>
                                        </div>
                                        <div class="d-flex row mb-3">
                                            <div class="col-md-4">
                                                <label for="name_guardian" class="form-label">اسم ولي الأمر:</label>
                                                <input id="name_guardian" name="name_guardian" class="form-control"
                                                    type="text" placeholder="اسم ولي الأمر" required/>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="Profession" class="form-label">المسمى الوظيفي لولي الأمر
                                                    (المهنة)</label>
                                                <input id="Profession" name="Profession" class="form-control"
                                                    type="text" placeholder="المهنة" required />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="etablissement_travail" class="form-label">مؤسسة
                                                    العمل</label>
                                                <input id="etablissement_travail" name="etablissement_travail"
                                                    class="form-control" type="text" placeholder="مؤسسة العمل" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Buttons -->
                                <div class="d-flex justify-content-between">
                                    <div class="btn btn-secondary" onclick="courseForm.previous()">السابق</div>
                                    <div class="btn btn-primary" onclick="courseForm.next()">التالي</div>
                                </div>
                            </div>

                            <!-- Content four -->
                            <div id="test-l-4" role="tabpanel" class="bs-stepper-pane fade"
                                aria-labelledby="courseFormtrigger4">
                                <!-- Card -->
                                <div class="card mb-3 border-0">
                                    <div class="card-header border-bottom px-4 py-3">
                                        <h4 class="mb-0">الدفع</h4>
                                    </div>
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="card mb-3 mb-lg-0">

                                            <!-- Card body -->
                                            <div class="card-body">
                                                <div class="m-auto col-md-8 mb-4">
                                                    <!-- card -->
                                                    <div class="card h-100">
                                                        <!-- card header -->
                                                        <div class="card-header">
                                                            <h4 class="mb-0">معلومات الدفع</h4>
                                                        </div>

                                                        <!-- table -->
                                                        <table class="table mb-0 table-hover table-centered">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <i
                                                                            class="fa-solid fa-location-dot icon-location ml-3"></i>
                                                                        <span class="align-middle">عنوان المؤسسة</span>
                                                                    </td>
                                                                    <td style="font-weight: bold">12 شارع باقي محمد،
                                                                        سيدي الجيلالي / سيدي بلعباس</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <i
                                                                            class="fa-solid fa-chalkboard-user icon-location"></i>
                                                                        <span class="align-middle">إسم المؤسسة</span>
                                                                    </td>
                                                                    <td style="font-weight: bold">Click School</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <i
                                                                            class="fa-solid fa-headset icon-location"></i>
                                                                        <span class="align-middle">للاستفسار عن الشؤون
                                                                            المالية</span>
                                                                    </td>
                                                                    <td style="font-weight: bold">+213 541 60 24 59
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <i
                                                                            class="fa-solid fa-headset icon-location"></i>
                                                                        <span class="align-middle">لمسؤول الاستقبال
                                                                            والتوجيه</span>
                                                                    </td>
                                                                    <td style="font-weight: bold">+213 541 60 24 59
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <i
                                                                            class="fa-solid fa-envelope icon-location"></i>
                                                                        <span class="align-middle">البريد
                                                                            الإلكتروني</span>
                                                                    </td>
                                                                    <td style="font-weight: bold">
                                                                        clicschoolsba@gmail.com</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <i
                                                                            class="fa-solid fa-building-columns icon-location"></i>
                                                                        <span class="align-middle">البنك</span>
                                                                    </td>
                                                                    <td style="font-weight: bold">Banque Total</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <i
                                                                            class="fa-solid fa-hashtag icon-location"></i>
                                                                        <span class="align-middle">رقم البنك</span>
                                                                    </td>
                                                                    <td style="font-weight: bold">
                                                                        570000985411238765432765</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <i
                                                                            class="fa-solid fa-barcode icon-location"></i>
                                                                        <span class="align-middle">الرمز البريدي</span>
                                                                    </td>
                                                                    <td style="font-weight: bold">2033398</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Buttons -->
                                <div class="d-flex justify-content-between">
                                    <div class="btn btn-secondary" onclick="courseForm.previous()">السابق</div>
                                    <button type="submit" class="btn btn-primary">إرسال</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <script>
                    function validateForm() {
                        // Add form validation logic here if needed
                        return true;
                    }
                    </script>

                </div>
            </div>
        </div>
    </div>
</section>


@endsection