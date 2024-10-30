@php $editing = isset($competitionAnswer) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select
            name="competition_question_id"
            label="Competition Question"
            required
        >
            @php $selected = old('competition_question_id', ($editing ? $competitionAnswer->competition_question_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Competition Question</option>
            @foreach($competitionQuestions as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="student_id" label="Student" required>
            @php $selected = old('student_id', ($editing ? $competitionAnswer->student_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Student</option>
            @foreach($students as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="text"
            label="Text"
            :value="old('text', ($editing ? $competitionAnswer->text : ''))"
            maxlength="255"
            placeholder="Text"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.checkbox
            name="is_correct"
            label="Is Correct"
            :checked="old('is_correct', ($editing ? $competitionAnswer->is_correct : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>
</div>
