@php $editing = isset($studentAnswerQuiz) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select name="questionQuiz_id" label="Question Quiz" required>
            @php $selected = old('questionQuiz_id', ($editing ? $studentAnswerQuiz->questionQuiz_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Question Quiz</option>
            @foreach($questionQuizs as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="student_id" label="Student" required>
            @php $selected = old('student_id', ($editing ? $studentAnswerQuiz->student_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Student</option>
            @foreach($students as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea name="text" label="Text" maxlength="255" required
            >{{ old('text', ($editing ? $studentAnswerQuiz->text : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.checkbox
            name="is_correct"
            label="Is Correct"
            :checked="old('is_correct', ($editing ? $studentAnswerQuiz->is_correct : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>
</div>
