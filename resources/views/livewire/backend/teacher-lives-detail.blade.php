<div>
    <div>
        @can('create', App\Models\Live::class)
        <button class="button" wire:click="newLive">
            <i class="mr-1 icon ion-md-add text-primary"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\Live::class)
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
                            name="live.course_id"
                            label="Course"
                            wire:model="live.course_id"
                        >
                            <option value="null" disabled>Please select the Course</option>
                            @foreach($coursesForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.url
                            name="live.url"
                            label="Url"
                            wire:model="live.url"
                            maxlength="255"
                            placeholder="Url"
                        ></x-inputs.url>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.datetime
                            name="live.scheduled_at"
                            label="Scheduled At"
                            wire:model="live.scheduled_at"
                            max="255"
                        ></x-inputs.datetime>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.number
                            name="live.duration"
                            label="Duration"
                            wire:model="live.duration"
                            max="255"
                            placeholder="Duration"
                        ></x-inputs.number>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.checkbox
                            name="live.active"
                            label="Active"
                            wire:model="live.active"
                        ></x-inputs.checkbox>
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
                        @lang('crud.teacher_lives.inputs.course_id')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.teacher_lives.inputs.url')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.teacher_lives.inputs.scheduled_at')
                    </th>
                    <th class="px-4 py-3 text-right">
                        @lang('crud.teacher_lives.inputs.duration')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.teacher_lives.inputs.active')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($lives as $live)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-3 text-left">
                        <input
                            type="checkbox"
                            value="{{ $live->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ optional($live->course)->title ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">{{ $live->url ?? '-' }}</td>
                    <td class="px-4 py-3 text-left">
                        {{ $live->scheduled_at ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-right">
                        {{ $live->duration ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $live->active ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $live)
                            <button
                                type="button"
                                class="button"
                                wire:click="editLive({{ $live->id }})"
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
                    <td colspan="6">
                        <div class="mt-10 px-4">{{ $lives->render() }}</div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
