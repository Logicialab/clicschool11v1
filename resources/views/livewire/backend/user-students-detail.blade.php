<div>
    <div>
        @can('create', App\Models\Student::class)
        <button class="button" wire:click="newStudent">
            <i class="mr-1 icon ion-md-add text-primary"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\Student::class)
        <button
            class="button button-danger"
             {{ empty($selected) ? 'disabled' : '' }} 
            onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
            wire:click="destroySelected"
        >
            <i class="mr-1 icon ion-md-trash text-primary"></i>
            @lang('crud.common.delete_selected')
        </button>
        @endcan
    </div>

    <x-modal wire:model="showingModal">
        <div class="px-6 py-4">
            <div class="text-lg font-bold">Student</div>

            <div class="mt-5">
                <div>
                    <x-inputs.group class="w-full">
                        <x-inputs.select
                            name="student.classe_id"
                            label="Classe"
                            wire:model="student.classe_id"
                        >
                            <option value="null" disabled>Please select the Classe</option>
                            @foreach($classesForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.text
                            name="student.first_name"
                            label="First Name"
                            wire:model="student.first_name"
                            maxlength="255"
                            placeholder="First Name"
                        ></x-inputs.text>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.text
                            name="student.last_name"
                            label="Last Name"
                            wire:model="student.last_name"
                            maxlength="255"
                            placeholder="Last Name"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.hidden
                        name="student.slug"
                        wire:model="student.slug"
                    ></x-inputs.hidden>
                    <x-inputs.group class="w-full">
                        <x-inputs.text
                            name="student.nickname"
                            label="Nickname"
                            wire:model="student.nickname"
                            maxlength="255"
                            placeholder="Nickname"
                        ></x-inputs.text>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.text
                            name="student.home_adress"
                            label="Home Adress"
                            wire:model="student.home_adress"
                            maxlength="255"
                            placeholder="Home Adress"
                        ></x-inputs.text>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.text
                            name="student.street"
                            label="Street"
                            wire:model="student.street"
                            maxlength="255"
                            placeholder="Street"
                        ></x-inputs.text>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.text
                            name="student.neighborhood"
                            label="Neighborhood"
                            wire:model="student.neighborhood"
                            maxlength="255"
                            placeholder="Neighborhood"
                        ></x-inputs.text>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.text
                            name="student.city"
                            label="City"
                            wire:model="student.city"
                            maxlength="255"
                            placeholder="City"
                        ></x-inputs.text>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.text
                            name="student.school_name"
                            label="School Name"
                            wire:model="student.school_name"
                            maxlength="255"
                            placeholder="School Name"
                        ></x-inputs.text>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.text
                            name="student.student_level"
                            label="Student Level"
                            wire:model="student.student_level"
                            maxlength="255"
                            placeholder="Student Level"
                        ></x-inputs.text>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.text
                            name="student.name_guardian"
                            label="Name Guardian"
                            wire:model="student.name_guardian"
                            maxlength="255"
                            placeholder="Name Guardian"
                        ></x-inputs.text>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.text
                            name="student.Profession"
                            label="Profession"
                            wire:model="student.Profession"
                            maxlength="255"
                            placeholder="Profession"
                        ></x-inputs.text>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.text
                            name="student.etablissement_travail"
                            label="Etablissement Travail"
                            wire:model="student.etablissement_travail"
                            maxlength="255"
                            placeholder="Etablissement Travail"
                        ></x-inputs.text>
                    </x-inputs.group>
                </div>
            </div>
        </div>

        <div class="px-6 py-4 bg-gray-50 flex justify-between">
            <button
                type="button"
                class="button"
                wire:click="$toggle('showingModal')"
            >
                <i class="mr-1 icon ion-md-close"></i>
                @lang('crud.common.cancel')
            </button>

            <button
                type="button"
                class="button button-primary"
                wire:click="save"
            >
                <i class="mr-1 icon ion-md-save"></i>
                @lang('crud.common.save')
            </button>
        </div>
    </x-modal>

    <div class="block w-full overflow-auto scrolling-touch mt-4">
        <table class="w-full max-w-full mb-4 bg-transparent">
            <thead class="text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left w-1">
                        <input
                            type="checkbox"
                            wire:model="allSelected"
                            wire:click="toggleFullSelection"
                            title="{{ trans('crud.common.select_all') }}"
                        />
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.user_students.inputs.classe_id')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.user_students.inputs.first_name')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.user_students.inputs.last_name')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.user_students.inputs.nickname')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.user_students.inputs.home_adress')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.user_students.inputs.street')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.user_students.inputs.neighborhood')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.user_students.inputs.city')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.user_students.inputs.school_name')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.user_students.inputs.student_level')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.user_students.inputs.name_guardian')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.user_students.inputs.Profession')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.user_students.inputs.etablissement_travail')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($students as $student)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-3 text-left">
                        <input
                            type="checkbox"
                            value="{{ $student->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ optional($student->classe)->name ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $student->name ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $student->name ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $student->nickname ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $student->home_adress ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $student->street ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $student->neighborhood ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $student->city ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $student->school_name ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $student->student_level ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $student->name_guardian ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $student->Profession ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $student->etablissement_travail ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $student)
                            <button
                                type="button"
                                class="button"
                                wire:click="editStudent({{ $student->id }})"
                            >
                                <i class="icon ion-md-create"></i>
                            </button>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="14">
                        <div class="mt-10 px-4">{{ $students->render() }}</div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
