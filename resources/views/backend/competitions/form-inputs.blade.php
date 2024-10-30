@php $editing = isset($competition) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select name="classe_id" label="Classe" required>
            @php $selected = old('classe_id', ($editing ? $competition->classe_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Classe</option>
            @foreach($classes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $competition->title : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            >{{ old('description', ($editing ? $competition->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.date
            name="date_start"
            label="Date Start"
            value="{{ old('date_start', ($editing ? optional($competition->date_start)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.date
            name="date_end"
            label="Date End"
            value="{{ old('date_end', ($editing ? optional($competition->date_end)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="order"
            label="Order"
            :value="old('order', ($editing ? $competition->order : ''))"
            maxlength="255"
            placeholder="Order"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.hidden
        name="slug"
        :value="old('slug', ($editing ? $competition->slug : ''))"
    ></x-inputs.hidden>

    <x-inputs.group class="w-full">
        <x-inputs.partials.label
            name="file"
            label="File"
        ></x-inputs.partials.label
        ><br />

        <input type="file" name="file" id="file" class="form-control-file" />

        @if($editing && $competition->file)
        <div class="mt-2">
            <a href="{{ \Storage::url($competition->file) }}" target="_blank"
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
            :checked="old('active', ($editing ? $competition->active : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>
</div>
