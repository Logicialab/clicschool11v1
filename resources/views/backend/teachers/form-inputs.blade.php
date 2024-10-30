@php $editing = isset($teacher) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $teacher->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="first_name"
            label="First Name"
            :value="old('first_name', ($editing ? $teacher->name : ''))"
            maxlength="255"
            placeholder="First Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="last_name"
            label="Last Name"
            :value="old('last_name', ($editing ? $teacher->name : ''))"
            maxlength="255"
            placeholder="Last Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea name="bio" label="Bio" maxlength="255"
            >{{ old('bio', ($editing ? $teacher->bio : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <div
            x-data="imageViewer('{{ $editing && $teacher->image ? \Storage::url($teacher->image) : '' }}')"
        >
            <x-inputs.partials.label
                name="image"
                label="Image"
            ></x-inputs.partials.label
            ><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img
                    :src="imageUrl"
                    class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;"
                />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div
                    class="border rounded border-gray-200 bg-gray-100"
                    style="width: 100px; height: 100px;"
                ></div>
            </template>

            <div class="mt-2">
                <input
                    type="file"
                    name="image"
                    id="image"
                    @change="fileChosen"
                />
            </div>

            @error('image') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="salaire"
            label="Salaire"
            :value="old('salaire', ($editing ? $teacher->salaire : ''))"
            max="255"
            step="0.01"
            placeholder="Salaire"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.hidden
        name="slug"
        :value="old('slug', ($editing ? $teacher->slug : ''))"
    ></x-inputs.hidden>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="school_name"
            label="School Name"
            :value="old('school_name', ($editing ? $teacher->school_name : ''))"
            maxlength="255"
            placeholder="School Name"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="specialite"
            label="Specialite"
            :value="old('specialite', ($editing ? $teacher->specialite : ''))"
            maxlength="255"
            placeholder="Specialite"
        ></x-inputs.text>
    </x-inputs.group>
</div>
