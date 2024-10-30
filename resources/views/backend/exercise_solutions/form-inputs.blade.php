@php $editing = isset($exerciseSolution) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select name="exercice_id" label="Exercice" required>
            @php $selected = old('exercice_id', ($editing ? $exerciseSolution->exercice_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Exercice</option>
            @foreach($exercices as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="solution"
            label="Solution"
            maxlength="255"
            required
            >{{ old('solution', ($editing ? $exerciseSolution->solution : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.partials.label
            name="file"
            label="File"
        ></x-inputs.partials.label
        ><br />

        <input type="file" name="file" id="file" class="form-control-file" />

        @if($editing && $exerciseSolution->file)
        <div class="mt-2">
            <a
                href="{{ \Storage::url($exerciseSolution->file) }}"
                target="_blank"
                ><i class="icon ion-md-download"></i>&nbsp;Download</a
            >
        </div>
        @endif @error('file') @include('components.inputs.partials.error')
        @enderror
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.checkbox
            name="active"
            label="Active"
            :checked="old('active', ($editing ? $exerciseSolution->active : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>
</div>
