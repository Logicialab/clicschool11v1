@php $editing = isset($answerQuiz) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select name="questionQuiz_id" label="Question Quiz" required>
            @php $selected = old('questionQuiz_id', ($editing ? $answerQuiz->questionQuiz_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Question Quiz</option>
            @foreach($questionQuizs as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea name="text" label="Text" maxlength="255" required
            >{{ old('text', ($editing ? $answerQuiz->text : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
