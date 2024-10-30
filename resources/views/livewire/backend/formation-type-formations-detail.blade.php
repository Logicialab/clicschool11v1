<div>
    <div>
        @can('create', App\Models\Formation::class)
        <button class="button" wire:click="newFormation">
            <i class="mr-1 icon ion-md-add text-primary"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\Formation::class)
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
                        <x-inputs.select
                            name="formation.teacher_id"
                            label="Teacher"
                            wire:model="formation.teacher_id"
                        >
                            <option value="null" disabled>Please select the Teacher</option>
                            @foreach($teachersForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.text
                            name="formation.name"
                            label="Name"
                            wire:model="formation.name"
                            maxlength="255"
                            placeholder="Name"
                        ></x-inputs.text>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.textarea
                            name="formation.description"
                            label="Description"
                            wire:model="formation.description"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <div
                            image-url="{{ $editing && $formation->image ? \Storage::url($formation->image) : '' }}"
                            x-data="imageViewer()"
                            @refresh.window="refreshUrl()"
                        >
                            <x-inputs.partials.label
                                name="formationImage"
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
                                    name="formationImage"
                                    id="formationImage{{ $uploadIteration }}"
                                    wire:model="formationImage"
                                    @change="fileChosen"
                                />
                            </div>

                            @error('formationImage')
                            @include('components.inputs.partials.error')
                            @enderror
                        </div>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.text
                            name="formation.status"
                            label="Status"
                            wire:model="formation.status"
                            maxlength="255"
                            placeholder="Status"
                        ></x-inputs.text>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.checkbox
                            name="formation.active"
                            label="Active"
                            wire:model="formation.active"
                        ></x-inputs.checkbox>
                    </x-inputs.group>

                    <x-inputs.hidden
                        name="formation.slug"
                        wire:model="formation.slug"
                    ></x-inputs.hidden>
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
                        @lang('crud.formation_type_formations.inputs.teacher_id')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.formation_type_formations.inputs.name')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.formation_type_formations.inputs.description')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.formation_type_formations.inputs.image')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.formation_type_formations.inputs.status')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.formation_type_formations.inputs.active')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($formations as $formation)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-3 text-left">
                        <input
                            type="checkbox"
                            value="{{ $formation->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ optional($formation->teacher)->first_name ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $formation->title ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $formation->description ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        <x-partials.thumbnail
                            src="{{ $formation->image ? \Storage::url($formation->image) : '' }}"
                        />
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $formation->status ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $formation->active ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $formation)
                            <button
                                type="button"
                                class="button"
                                wire:click="editFormation({{ $formation->id }})"
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
                    <td colspan="7">
                        <div class="mt-10 px-4">
                            {{ $formations->render() }}
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
