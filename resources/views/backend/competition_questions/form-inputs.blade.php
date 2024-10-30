@php $editing = isset($competitionQuestion) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select name="competition_id" label="Competition" required>
            @php $selected = old('competition_id', ($editing ? $competitionQuestion->competition_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Competition</option>
            @foreach($competitions as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="question"
            label="Question"
            :value="old('question', ($editing ? $competitionQuestion->question : ''))"
            maxlength="255"
            placeholder="Question"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="question_type"
            label="Question Type"
            :value="old('question_type', ($editing ? $competitionQuestion->question_type : ''))"
            maxlength="255"
            placeholder="Question Type"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
