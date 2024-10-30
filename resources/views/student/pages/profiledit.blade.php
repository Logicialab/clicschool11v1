@section('title', 'Home tetcher')

@extends('layouts.student')



@section('student.content')
<!-- Card -->
<div class="card">
    <!-- Card header -->
    <div class="card-header">
        <h3 class="mb-0">تفاصيل الملف الشخصي</h3>
        <p class="mb-0">لديك التحكم الكامل لإدارة إعدادات حسابك.</p>
    </div>
    <!-- Card body -->
    <div class="card-body">
        {{-- <div class="d-lg-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center mb-4 mb-lg-0">
                <img src="/assets/images/avatar/avatar-3.jpg" id="img-uploaded" class="avatar-xl rounded-circle"
                    alt="avatar">
                <div class="ms-3">
                    <h4 class="mb-0">صورتك الرمزية</h4>
                    <p class="mb-0">PNG أو JPG لا تزيد عن 800 بكسل عرضاً وارتفاعاً.</p>
                </div>
            </div>
            <div>
                <a href="#" class="btn btn-outline-secondary btn-sm">تحديث</a>
                <a href="#" class="btn btn-outline-danger btn-sm">حذف</a>
            </div>
        </div> --}}
        {{-- <hr class="my-5"> --}}
        <div>
            <h4 class="mb-0">التفاصيل الشخصية</h4>
            <p class="mb-4">عدل معلوماتك الشخصية وعنوانك.</p>
            <!-- Form -->
            <form class="row gx-3 needs-validation" novalidate="">
                <!-- First name -->
                <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="fname">الاسم الكامل                    </label>
                    <input type="text" id="fname" class="form-control" placeholder="الاسم الكامل" value="{{ old('start_at', $student->name) }}">
                    <div class="invalid-feedback">يرجى إدخال الاسم الكامل.</div>
                </div>
                <!-- Last name -->
                <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="lname">اللقب</label>
                    <input type="text" id="lname" class="form-control" placeholder="اللقب" value="{{ old('start_at', $student->nickname) }}">
                    <div class="invalid-feedback">يرجى إدخال اللقب</div>
                </div>
                <!-- Phone -->
                <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="phone">عنوان المنزل
                    </label>
                    <input type="text" id="phone" class="form-control" placeholder="عنوان المنزل" value="{{ old('home_adress', $student->home_adress) }}" required="">
                    <div class="invalid-feedback">يرجى إدخال عنوان المنزل
                        .</div>
                </div>
                <!-- Birthday -->
                <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="birth">الشارع</label>
                    <input class="form-control " type="text" placeholder="الشارع  "
                        id="birth" name="birth" value="{{ old('street', $student->street) }}">
                    <div class="invalid-feedback">يرجى إدخال الشارع.</div>
                </div>
                <!-- Address -->
                <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="address">الحي</label>
                    <input type="text" id="address" class="form-control" placeholder="الحي" required="" value="{{ old('neighborhood', $student->neighborhood) }}">
                    <div class="invalid-feedback">يرجى إدخال الحي.</div>
                </div>
                <!-- Address -->
                <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="address2">المدينة</label>
                    <input type="text" id="address2" class="form-control" placeholder="المدينة" required="" value="{{ old('street', $student->city) }}">
                    <div class="invalid-feedback">يرجى إدخال المدينة.</div>
                </div> 
                
                <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="address2">اسم المدرسة</label>
                    <input type="text" id="address2" class="form-control" placeholder="المدرسة" required="" value="{{ old('street', $student->school_name) }}">
                    <div class="invalid-feedback">يرجى إدخال المدرسة.</div>
                </div>
               
                <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="address2">  مستوى الطالب
                    </label>
                    <input type="text" id="address2" class="form-control" placeholder="مستوى الطالب" required="" value="{{ old('street', $student->student_level) }}">
                    <div class="invalid-feedback">يرجى إدخال مستوى الطالب
                        .</div>
                </div>
                 <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="address2">  اسم ولي الأمر

                    </label>
                    <input type="text" id="address2" class="form-control" placeholder="اسم ولي الأمر" required="" value="{{ old('street', $student->name_guardian) }}">
                    <div class="invalid-feedback">يرجى إدخال اسم ولي الأم
                        .</div>
                </div>
                 <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="address2">  المهنة  
                    </label>
                    <input type="text" id="address2" class="form-control" placeholder="المهنة  " required="" value="{{ old('street', $student->Profession) }}">
                    <div class="invalid-feedback">يرجى إدخال  المهنة  
                        .</div>
                </div>
                
                <div class="mb-3 col-12 col-md-6">
                 
              
                    <x-inputs.group class="w-full">
                        <label class="form-label" for="address2">  القسم     </label>
                        <x-inputs.select name="classe_id" label="" required class="form-control">
                             @foreach($classes as $value => $label)
                            <option value="{{ $value }}"   >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>
                    <div class="invalid-feedback">يرجى إدخال مستوى الطالب
                        .</div>
                </div>
               
                <div class="col-12">
                    <!-- Button -->
                    <button class="btn btn-primary" type="submit">تحديث الملف الشخصي</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection