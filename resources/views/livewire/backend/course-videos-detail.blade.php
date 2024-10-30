<div>
    <div>
        @can('create', App\Models\Video::class)
        <button class="button" wire:click="newVideo">
            <i class="mr-1 icon ion-md-add text-primary"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\Video::class)
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
                            name="video.title"
                            label="Title"
                            wire:model="video.title"
                            maxlength="255"
                            placeholder="Title"
                        ></x-inputs.text>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.url
                            name="video.url"
                            label="Url"
                            wire:model="video.url"
                            maxlength="255"
                            placeholder="Url"
                        ></x-inputs.url>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.textarea
                            name="video.description"
                            label="Description"
                            wire:model="video.description"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <div
                            image-url="{{ $editing && $video->image ? \Storage::url($video->image) : '' }}"
                            x-data="imageViewer()"
                            @refresh.window="refreshUrl()"
                        >
                            <x-inputs.partials.label
                                name="videoImage"
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
                                    name="videoImage"
                                    id="videoImage{{ $uploadIteration }}"
                                    wire:model="videoImage"
                                    @change="fileChosen"
                                />
                            </div>

                            @error('videoImage')
                            @include('components.inputs.partials.error')
                            @enderror
                        </div>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.checkbox
                            name="video.active"
                            label="Active"
                            wire:model="video.active"
                        ></x-inputs.checkbox>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.partials.label
                            name="videoFile"
                            label="File"
                        ></x-inputs.partials.label
                        ><br />

                        <input
                            type="file"
                            name="videoFile"
                            id="videoFile{{ $uploadIteration }}"
                            wire:model="videoFile"
                            class="form-control-file"
                        />

                        @if($editing && $video->file)
                        <div class="mt-2">
                            <a
                                href="{{ \Storage::url($video->file) }}"
                                target="_blank"
                                ><i class="icon ion-md-download"></i
                                >&nbsp;Download</a
                            >
                        </div>
                        @endif @error('videoFile')
                        @include('components.inputs.partials.error') @enderror
                    </x-inputs.group>

                    <x-inputs.hidden
                        name="video.slug"
                        wire:model="video.slug"
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
                        @lang('crud.course_videos.inputs.title')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.course_videos.inputs.url')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.course_videos.inputs.description')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.course_videos.inputs.image')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.course_videos.inputs.active')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.course_videos.inputs.file')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($videos as $video)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-3 text-left">
                        <input
                            type="checkbox"
                            value="{{ $video->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $video->title ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $video->url ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $video->description ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        <x-partials.thumbnail
                            src="{{ $video->image ? \Storage::url($video->image) : '' }}"
                        />
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $video->active ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        @if($video->file)
                        <a
                            href="{{ \Storage::url($video->file) }}"
                            target="blank"
                            ><i class="mr-1 icon ion-md-download"></i
                            >&nbsp;Download</a
                        >
                        @else - @endif
                    </td>
                    <td class="px-4 py-3 text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $video)
                            <button
                                type="button"
                                class="button"
                                wire:click="editVideo({{ $video->id }})"
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
                        <div class="mt-10 px-4">{{ $videos->render() }}</div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
