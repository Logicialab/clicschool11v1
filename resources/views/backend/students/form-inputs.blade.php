@php $editing = isset($student) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $student->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="classe_id" label="Classe" required>
            @php $selected = old('classe_id', ($editing ? $student->classe_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Classe</option>
            @foreach($classes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="first_name"
            label="First Name"
            :value="old('first_name', ($editing ? $student->name : ''))"
            maxlength="255"
            placeholder="First Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="last_name"
            label="Last Name"
            :value="old('last_name', ($editing ? $student->name : ''))"
            maxlength="255"
            placeholder="Last Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="nickname"
            label="Nickname"
            :value="old('nickname', ($editing ? $student->nickname : ''))"
            maxlength="255"
            placeholder="Nickname"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.hidden
        name="slug"
        :value="old('slug', ($editing ? $student->slug : ''))"
    ></x-inputs.hidden>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="home_adress"
            label="Home Adress"
            :value="old('home_adress', ($editing ? $student->home_adress : ''))"
            maxlength="255"
            placeholder="Home Adress"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="street"
            label="Street"
            :value="old('street', ($editing ? $student->street : ''))"
            maxlength="255"
            placeholder="Street"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="neighborhood"
            label="Neighborhood"
            :value="old('neighborhood', ($editing ? $student->neighborhood : ''))"
            maxlength="255"
            placeholder="Neighborhood"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="city"
            label="City"
            :value="old('city', ($editing ? $student->city : ''))"
            maxlength="255"
            placeholder="City"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="school_name"
            label="School Name"
            :value="old('school_name', ($editing ? $student->school_name : ''))"
            maxlength="255"
            placeholder="School Name"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="student_level"
            label="Student Level"
            :value="old('student_level', ($editing ? $student->student_level : ''))"
            maxlength="255"
            placeholder="Student Level"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name_guardian"
            label="Name Guardian"
            :value="old('name_guardian', ($editing ? $student->name_guardian : ''))"
            maxlength="255"
            placeholder="Name Guardian"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="Profession"
            label="Profession"
            :value="old('Profession', ($editing ? $student->Profession : ''))"
            maxlength="255"
            placeholder="Profession"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="etablissement_travail"
            label="Etablissement Travail"
            :value="old('etablissement_travail', ($editing ? $student->etablissement_travail : ''))"
            maxlength="255"
            placeholder="Etablissement Travail"
        ></x-inputs.text>
    </x-inputs.group>
</div>
