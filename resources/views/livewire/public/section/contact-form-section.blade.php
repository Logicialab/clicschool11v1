<form class="row g-3 needs-validation" wire:submit.prevent="submitForm">
    <div class="mb-3 col-12 col-md-6">
        <label class="form-label" for="fname">الاسم الأول:<span class="text-danger">*</span></label>
        <input class="form-control" id="fname" placeholder="الاسم الأول" required type="text" name="first name" wire:model="firstName">
        @error('firstName') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3 col-12 col-md-6">
        <label class="form-label" for="lname">الاسم الأخير:<span class="text-danger">*</span></label>
        <input class="form-control" id="lname" placeholder="الاسم الأخير" required type="text" name="last name" wire:model="lastName">
        @error('lastName') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3 col-12 col-md-6">
        <label class="form-label" for="email">البريد الإلكتروني:<span class="text-danger">*</span></label>
        <input class="form-control" id="email" placeholder="البريد الإلكتروني" required type="email" wire:model="email" style="direction: rtl;">
        @error('email') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3 col-12 col-md-6">
        <label class="form-label" for="phone">رقم الهاتف:<span class="text-danger">*</span></label>
        <input class="form-control" id="phone" placeholder="رقم الهاتف" required type="text" name="phone" wire:model="phone">
        @error('phone') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3 col-12">
        <label class="text-dark form-label" for="contactReason">سبب الاتصال:<span class="text-danger">*</span></label>
        <select class="form-select" id="contactReason" required wire:model="contactReason">
            <option value="">اختيار</option>
            <option value="تصميم">تصميم</option>
            <option value="تطوير">تطوير</option>
            <option value="آخر">آخر</option>
        </select>
        @error('contactReason') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3 col-12">
        <label class="form-label" for="subject"> موضوع:<span class="text-danger">*</span></label>
        <input class="form-control" id="subject" placeholder="موضوع" required type="text" name="subject" wire:model="subject">
        @error('subject') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3 col-12">
        <label class="text-dark form-label" for="message">رسالة:</label>
        <textarea class="form-control" id="message" rows="3" placeholder="رسالة" wire:model="message"></textarea>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary w-100">إرسال</button>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif
</form>
