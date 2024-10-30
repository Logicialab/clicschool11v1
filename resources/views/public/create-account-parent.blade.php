@extends('layouts.main')



@section('main.content')
    <section class="py-4 py-lg-6 bg-primary">
        <div class="container">
            <div class="row">
                <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                    <div class="d-lg-flex align-items-center justify-content-between">
                        <!-- Content -->
                        <div class="mb-4 mb-lg-0">
                            <h1 class="text-white mb-1">قم بإنشاء حساب التلميذ</h1>
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
                                    <span class="bs-stepper-label">معلومات ولي الأمر</span>
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
                            <form action="{{ route('parent.store') }}" method="POST" onsubmit="return validateForm()">
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
                                                    <label for="firstName" class="form-label">الإسم الشخصي</label>
                                                    <input id="firstName" name="first_name" class="form-control" type="text"
                                                        placeholder="الإسم الشخصي " required />
                                                    <input id="role" hidden name="roles" class="form-control"
                                                        value="user" type="text" placeholder="الإسم الشخصي " />
                                                    <input id="is_active" hidden name="is_active" class="form-control"
                                                        value="1" type="text" placeholder="الإسم الشخصي " />
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="lastName" class="form-label">الإسم العائلي</label>
                                                    <input id="lastName" name="last_name" class="form-control" type="text"
                                                        placeholder="الإسم العائلي " />
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="necname" class="form-label">لقب ولي الأمر</label>
                                                    <input id="necname" name="username" class="form-control" type="text"
                                                        placeholder="لقب ولي الأمر" style="direction: rtl" />
                                                </div>
                                            </div>
                                            <div class="d-flex row mb-3">
                                                <div class="col-md-4">
                                                    <label for="addres" class="form-label">العنوان</label>
                                                    <input id="info" class="form-control" type="text"
                                                        placeholder="العنوان" style="direction: rtl" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="addres" class="form-label">عنوان السكن</label>
                                                    <input id="address" name="address" class="form-control" type="text"
                                                        placeholder="عنوان السكن" style="direction: rtl" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="addres" class="form-label">الشارع/ الحي/ المدينة</label>
                                                    <input id="city" name="city" class="form-control" type="text"
                                                        placeholder="الشارع/ الحي/ المدينة" style="direction: rtl" />
                                                </div>
                                            </div>
                                            <div class="d-flex row mb-3">
                                                <div class="col-md-4">
                                                    <label for="email" class="form-label"> البريد الإلكتروني</label>
                                                    <input id="email" name="email" class="form-control" type="email"
                                                        placeholder="البريد الإلكتروني" style="direction: rtl" email />
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="email" class="form-label">كلمة المرور </label>
                                                    <input id="password" name="password" class="form-control" type="password"
                                                        placeholder="***********" style="direction: rtl" password />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">رقم الهاتف الأول لولي الأمر</label>
                                                    <input id="phone" class="form-control" name="phone" type="text"
                                                        placeholder="رقم الهاتف الأول لولي الأمر" />
                                                </div>
                                            </div>
                                            <div class="d-flex row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">المسمى الوظيفي لولي الأمر(المهنة)</label>
                                                    <input id="job" class="form-control" type="text"
                                                        placeholder="المهنة" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">مؤسسة العمل</label>
                                                    <input id="llsos" class="form-control" type="text"
                                                        placeholder="مؤسسة العمل" />
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
                                        <div id="studentForms">
                                            <div id="student1" class="card-body">
                                                <div class="d-flex row mb-3">
                                                    <div class="col-md-4">
                                                        <label for="firstName" class="form-label">الإسم الشخصي</label>
                                                        <input id="firstName" name="first_name_student[]" class="form-control" type="text" placeholder="الإسم الشخصي " required />
                                                        <input id="role" hidden name="roles_student[]" class="form-control" value="user" type="text" placeholder="الإسم الشخصي " />
                                                        <input id="is_active" hidden name="is_active_student[]" class="form-control" value="1" type="text" placeholder="الإسم الشخصي " />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="lastName" class="form-label">الإسم العائلي</label>
                                                        <input id="lastName" name="last_name_student[]" class="form-control" type="text" placeholder="الإسم العائلي " />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="necname" class="form-label">لقب التلميذ/ة</label>
                                                        <input id="necname" name="username_student[]" class="form-control" type="text" placeholder="لقب التلميذ/ة" style="direction: rtl" />
                                                    </div>
                                                </div>
                                                <div class="d-flex row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="addres" class="form-label">الجنس</label>
                                                        <select class="form-control" name="sexe_student[]" required="">
                                                            <option value="" selected="">اختر الجنس</option>
                                                            <option value="ذكر">ذكر</option>
                                                            <option value="أنثى">أنثى</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">تاريخ ميلاد التلميذ/ة</label>
                                                        <input class="form-control flatpickr" name="date_birth_student[]" type="text" placeholder="حدد تاريخ" aria-describedby="basic-addon2" />
                                                    </div>
                                                </div>
                                                <div class="d-flex row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="email" class="form-label"> البريد الإلكتروني</label>
                                                        <input id="email" name="email_student[]" class="form-control" type="email"
                                                            placeholder="البريد الإلكتروني" style="direction: rtl" email />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="email" class="form-label">كلمة المرور </label>
                                                        <input id="password" name="password_student[]" class="form-control" type="password"
                                                            placeholder="***********" style="direction: rtl" password />
                                                    </div>
                                                </div>
                                                <div class="d-flex row mb-3">
                                                    <div class="col-md-4">
                                                        <label for="class" class="form-label">المستوى الحالي للتلميذ:</label>
                                                        <select class="form-select">
                                                            <option value="" selected="">تحديد مستوى الطالب</option>
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
                                                        <label class="form-label">اسم المدرسة الحالية:</label>
                                                        <input id="school" class="form-control" type="text" placeholder="اسم المدرسة الحالية:" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">مستوى طلب التسجيل في المدرسة </label>
                                                        <select class="form-select" name="classe_id_student[]">
                                                            @foreach ($courses as $course)
                                                                <option value="" selected="">تحديد مستوى التسجيل</option>
                                                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <button id="addStudentButton" class="btn btn-primary">إضافة تلميذ</button>
                                        </div>
                                    </div>
                                    <!-- Button -->
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
                                    <div class="d-flex justify-content-between mb-8">
                                        <!-- Button -->
                                        <button class="btn btn-secondary" onclick="courseForm.previous()">السابق</button>
                                        <button type="submit" class="btn bg-primary text-white">حفظ</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById("email").addEventListener("input", function() {
            var emailValue = this.value;
            document.getElementById("password").value = emailValue;
        });

        // function validateForm() {
        //     var firstName = document.getElementById("firstName").value;
        //     var lastName = document.getElementById("lastName").value;
        //     var email = document.getElementById("email").value;
        //     var address = document.getElementById("address").value;
        //     var city = document.getElementById("city").value;
        //     var sexe = document.querySelector("select[name='sexe']").value;
        //     var dateBirth = document.querySelector("input[name='date_birth']").value;
        //     var phone = document.querySelector("input[name='phone']").value;

        //     if (!firstName || !lastName || !email || !address || !city || !sexe || !dateBirth || !phone) {
        //         alert("Please fill out all required fields.");
        //         return false;
        //     }

        //     return true;
        // }

        document.getElementById('addStudentButton').addEventListener('click', function(e) {
        e.preventDefault();
        
        var studentForms = document.getElementById('studentForms');
        var newStudentForm = document.getElementById('student1').cloneNode(true);

        studentForms.appendChild(newStudentForm);
    });
    </script>
@endsection
