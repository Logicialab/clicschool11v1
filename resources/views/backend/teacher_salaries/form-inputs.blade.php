@php $editing = isset($teacherSalary) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select name="teacher_id" label="Teacher" required>
            @php $selected = old('teacher_id', ($editing ? $teacherSalary->teacher_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Teacher</option>
            @foreach($teachers as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="montly_salary"
            label="Montly Salary"
            :value="old('montly_salary', ($editing ? $teacherSalary->montly_salary : ''))"
            max="255"
            step="0.01"
            placeholder="Montly Salary"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.date
            name="paid_at"
            label="Paid At"
            value="{{ old('paid_at', ($editing ? optional($teacherSalary->paid_at)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="status"
            label="Status"
            :value="old('status', ($editing ? $teacherSalary->status : ''))"
            maxlength="255"
            placeholder="Status"
        ></x-inputs.text>
    </x-inputs.group>
</div>
