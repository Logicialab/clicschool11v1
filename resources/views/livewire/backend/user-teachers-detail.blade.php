<div>
    <div>
        @can('create', App\Models\Teacher::class)
        <button class="button" wire:click="newTeacher">
            <i class="mr-1 icon ion-md-add text-primary"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\Teacher::class)
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
            <div class="text-lg font-bold">{{ $modalTitle }}</div>

            <div class="mt-5">
                <div>
                    <x-inputs.group class="w-full">
                        <x-inputs.text
                            name="teacher.first_name"
                            label="First Name"
                            wire:model="teacher.first_name"
                            maxlength="255"
                            placeholder="First Name"
                        ></x-inputs.text>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.text
                            name="teacher.last_name"
                            label="Last Name"
                            wire:model="teacher.last_name"
                            maxlength="255"
                            placeholder="Last Name"
                        ></x-inputs.text>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.textarea
                            name="teacher.bio"
                            label="Bio"
                            wire:model="teacher.bio"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <div
                            image-url="{{ $editing && $teacher->image ? \Storage::url($teacher->image) : '' }}"
                            x-data="imageViewer()"
                            @refresh.window="refreshUrl()"
                        >
                            <x-inputs.partials.label
                                name="teacherImage"
                                label="Image"
                            ></x-inputs.partials.label
                            ><br />

                            <!-- Show the image -->
                            <template x-if="imageUrl">
                                <img
                                    :src="imageUrl"
                                    class="
                                        object-cover
                                        rounded
                                        border border-gray-200
                                    "
                                    style="width: 100px; height: 100px;"
                                />
                            </template>

                            <!-- Show the gray box when image is not available -->
                            <template x-if="!imageUrl">
                                <div
                                    class="
                                        border
                                        rounded
                                        border-gray-200
                                        bg-gray-100
                                    "
                                    style="width: 100px; height: 100px;"
                                ></div>
                            </template>

                            <div class="mt-2">
                                <input
                                    type="file"
                                    name="teacherImage"
                                    id="teacherImage{{ $uploadIteration }}"
                                    wire:model="teacherImage"
                                    @change="fileChosen"
                                />
                            </div>

                            @error('teacherImage')
                            @include('components.inputs.partials.error')
                            @enderror
                        </div>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.number
                            name="teacher.salaire"
                            label="Salaire"
                            wire:model="teacher.salaire"
                            max="255"
                            step="0.01"
                            placeholder="Salaire"
                        ></x-inputs.number>
                    </x-inputs.group>

                    <x-inputs.hidden
                        name="teacher.slug"
                        wire:model="teacher.slug"
                    ></x-inputs.hidden>
                    <x-inputs.group class="w-full">
                        <x-inputs.text
                            name="teacher.school_name"
                            label="School Name"
                            wire:model="teacher.school_name"
                            maxlength="255"
                            placeholder="School Name"
                        ></x-inputs.text>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.text
                            name="teacher.specialite"
                            label="Specialite"
                            wire:model="teacher.specialite"
                            maxlength="255"
                            placeholder="Specialite"
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
                        @lang('crud.user_teachers.inputs.first_name')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.user_teachers.inputs.last_name')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.user_teachers.inputs.bio')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.user_teachers.inputs.image')
                    </th>
                    <th class="px-4 py-3 text-right">
                        @lang('crud.user_teachers.inputs.salaire')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.user_teachers.inputs.school_name')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.user_teachers.inputs.specialite')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($teachers as $teacher)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-3 text-left">
                        <input
                            type="checkbox"
                            value="{{ $teacher->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $teacher->name ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $teacher->name ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $teacher->bio ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        <x-partials.thumbnail
                            src="{{ $teacher->image ? \Storage::url($teacher->image) : '' }}"
                        />
                    </td>
                    <td class="px-4 py-3 text-right">
                        {{ $teacher->salaire ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $teacher->school_name ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $teacher->specialite ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $teacher)
                            <button
                                type="button"
                                class="button"
                                wire:click="editTeacher({{ $teacher->id }})"
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
                    <td colspan="8">
                        <div class="mt-10 px-4">{{ $teachers->render() }}</div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
