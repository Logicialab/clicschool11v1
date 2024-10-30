@section('title', 'Home tetcher')

@extends('layouts.teacher')



@section('teacher.content')

<div class="card mb-3">
    <div class="card-header border-bottom px-4 py-3">
        <h4 class="mb-0">إضافة دورة</h4>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <form action="{{ route('teacher.formation.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Course Name -->
            <div class="mb-3">
                <label for="courseName" class="form-label">عنوان الدورة</label>
                <input id="courseName" name="name" class="form-control" type="text" placeholder="عنوان الدورة" required>
                <small>اكتب عنوانًا للدورة مكونًا من 60 حرفًا.</small>
            </div>
            <!-- Course Category (Formation Type) -->
            <div class="mb-3">
                <label class="form-label">فئة الدورات</label>
                <select name="formation_type_id" class="form-select" required>
                    <option value="">اختر الفئة</option>
                    @foreach($formationTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                <small>ساعد الناس في العثور على دوراتك عن طريق اختيار الفئات التي تمثل دورتك.</small>
            </div>
            <!-- Course Level (Status) -->
            <div class="mb-3">
                <label class="form-label">حالة الدورة</label>
                <select name="status" class="form-select" required>
                    <option value="">اختر الحالة</option>
                    <option value="النشر">النشر</option>
                    <option value="الانتظار">الانتظار</option>
                    <option value="متوقف مؤقتا">متوقف مؤقتا</option>
                </select>
            </div>
            <!-- Course Description -->
            <div class="mb-3">
                <label class="form-label">وصف الدورة</label>
                <textarea rows="3" id="Excerpt" name="description" class="form-control text-dark"
                    placeholder="وصف الدورة" required></textarea>
                <small>ملخص موجز لدوراتك.</small>
            </div>

            <!-- Image Upload -->
            <div class="custom-file-container mb-4" data-upload-id="courseImage">
                <div class="label-container">
                    <label>رفع</label>
                    <a class="clear-button" href="javascript:void(0)" title="حذف الصورة">×</a>
                </div>
                <label class="input-container">
                    <input accept="image/*" aria-label="اختر ملفًا" class="input-hidden"
                        id="file-upload-with-preview-courseImage" type="file" name="image">
                    <span class="input-visible">اختر ملفًا...<span class="browse-button">تصفح</span></span>
                </label>
                <div id="image-preview" class="image-preview" style="background-image: none; display: none;"></div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">نشر</button>
        </form>
    </div>
</div>

<script>
document.getElementById('file-upload-with-preview-courseImage').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const fileName = file ? file.name : 'اختر ملفًا...';
    document.querySelector('.input-visible').textContent = fileName;

    const previewContainer = document.getElementById('image-preview');
    if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
            previewContainer.style.backgroundImage = `url(${event.target.result})`;
            previewContainer.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        previewContainer.style.backgroundImage = 'none';
        previewContainer.style.display = 'none';
    }
});

document.querySelector('.clear-button').addEventListener('click', function() {
    const inputField = document.getElementById('file-upload-with-preview-courseImage');
    inputField.value = '';
    document.querySelector('.input-visible').textContent = 'اختر ملفًا...';
    const previewContainer = document.getElementById('image-preview');
    previewContainer.style.backgroundImage = 'none';
    previewContainer.style.display = 'none';
});
</script>


@endsection