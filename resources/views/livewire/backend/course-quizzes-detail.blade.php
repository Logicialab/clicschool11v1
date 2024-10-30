<div>
    <div>
        @can('create', App\Models\Quiz::class)
        <button class="button" wire:click="newQuiz">
            <i class="mr-1 icon ion-md-add text-primary"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\Quiz::class)
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
                            name="quiz.name"
                            label="Name"
                            wire:model="quiz.name"
                            maxlength="255"
                            placeholder="Name"
                        ></x-inputs.text>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.textarea
                            name="quiz.description"
                            label="Description"
                            wire:model="quiz.description"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>

                    <x-inputs.hidden
                        name="quiz.slug"
                        wire:model="quiz.slug"
                    ></x-inputs.hidden>
                    <x-inputs.group class="w-full">
                        <x-inputs.text
                            name="quiz.order"
                            label="Order"
                            wire:model="quiz.order"
                            maxlength="255"
                            placeholder="Order"
                        ></x-inputs.text>
                    </x-inputs.group>
                    <x-inputs.group class="w-full">
                        <x-inputs.checkbox
                            name="quiz.active"
                            label="Active"
                            wire:model="quiz.active"
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
                        @lang('crud.course_quizzes.inputs.name')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.course_quizzes.inputs.description')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.course_quizzes.inputs.order')
                    </th>
                    <th class="px-4 py-3 text-left">
                        @lang('crud.course_quizzes.inputs.active')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($quizzes as $quiz)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-3 text-left">
                        <input
                            type="checkbox"
                            value="{{ $quiz->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $quiz->name ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $quiz->description ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $quiz->order ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-left">
                        {{ $quiz->active ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $quiz)
                            <button
                                type="button"
                                class="button"
                                wire:click="editQuiz({{ $quiz->id }})"
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
                    <td colspan="5">
                        <div class="mt-10 px-4">{{ $quizzes->render() }}</div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
