<div>
    <div>
        @can('create', App\Models\Course::class)
        <button class="button" wire:click="newCourse">
            <i class="mr-1 icon ion-md-add text-primary"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\Course::class)
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
                            name="course.subject_id"
                            label="Subject"
                            wire:model="course.subject_id"
                        >
                            <option value="null" disabled>Please select the Subject</option>
                            @foreach($subjectsForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.text
                            name="course.title"
                            label="Title"
                            wire:model="course.title"
                            maxlength="255"
                            placeholder="Title"
                        ></x-inputs.text>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.text
                            name="course.slug"
                            label="Slug"
                            wire:model="course.slug"
                            maxlength="255"
                            placeholder="Slug"
                        ></x-inputs.text>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.textarea
                            name="course.description"
                            label="Description"
                            wire:model="course.description"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <div
                            image-url="{{ $editing && $course->image ? \Storage::url($course->image) : '' }}"
                            x-data="imageViewer()"
                            @refresh.window="refreshUrl()"
                        >
                            <x-inputs.partials.label
                                name="courseImage"
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
                                    name="courseImage"
                                    id="courseImage{{ $uploadIteration }}"
                                    wire:model="courseImage"
                                    @change="fileChosen"
                                />
                            </div>

                            @error('courseImage')
                            @include('components.inputs.partials.error')
                            @enderror
                        </div>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.textarea
                            name="course.body"
                            label="Body"
                            wire:model="course.body"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.number
                            name="course.order"
                            label="Order"
                            wire:model="course.order"
                            max="255"
                            placeholder="Order"
                        ></x-inputs.number>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.checkbox
                            name="course.active"
                            label="Active"
                            wire:model="course.active"
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
                        @lang('crud.teacher_courses.inputs.subject_id')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.teacher_courses.inputs.title')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.teacher_courses.inputs.slug')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.teacher_courses.inputs.description')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.teacher_courses.inputs.image')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.teacher_courses.inputs.body')
                    </th>
                    <th class="px-4 py-3 text-right">
                        @lang('crud.teacher_courses.inputs.order')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.teacher_courses.inputs.active')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($courses as $course)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-3 text-left">
                        <input
                            type="checkbox"
                            value="{{ $course->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ optional($course->subject)->name ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $course->title ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $course->slug ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $course->description ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        <x-partials.thumbnail
                            src="{{ $course->image ? \Storage::url($course->image) : '' }}"
                        />
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $course->body ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-right">
                        {{ $course->order ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $course->active ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $course)
                            <button
                                type="button"
                                class="button"
                                wire:click="editCourse({{ $course->id }})"
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
                    <td colspan="9">
                        <div class="mt-10 px-4">{{ $courses->render() }}</div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
