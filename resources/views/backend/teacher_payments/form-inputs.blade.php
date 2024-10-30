@php $editing = isset($teacherPayment) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select name="teacher_id" label="Teacher" required>
            @php $selected = old('teacher_id', ($editing ? $teacherPayment->teacher_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Teacher</option>
            @foreach($teachers as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="amount"
            label="Amount"
            :value="old('amount', ($editing ? $teacherPayment->amount : ''))"
            max="255"
            step="0.01"
            placeholder="Amount"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.date
            name="payment_date"
            label="Payment Date"
            value="{{ old('payment_date', ($editing ? optional($teacherPayment->payment_date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            >{{ old('description', ($editing ? $teacherPayment->description :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
