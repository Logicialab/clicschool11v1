<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.courses.index_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <div class="mb-5 mt-4">
                    <div class="flex flex-wrap justify-between">
                        <div class="md:w-1/2">
                            <form>
                                <div class="flex items-center w-full">
                                    <x-inputs.text
                                        name="search"
                                        value="{{ $search ?? '' }}"
                                        placeholder="{{ __('crud.common.search') }}"
                                        autocomplete="off"
                                    ></x-inputs.text>

                                    <div class="ml-1">
                                        <button
                                            type="submit"
                                            class="button button-primary"
                                        >
                                            <i class="icon ion-md-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="md:w-1/2 text-right">
                            @can('create', App\Models\Course::class)
                            <a
                                href="{{ route('courses.create') }}"
                                class="button button-primary"
                            >
                                <i class="mr-1 icon ion-md-add"></i>
                                @lang('crud.common.create')
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="block w-full overflow-auto scrolling-touch">
                    <table class="w-full max-w-full mb-4 bg-transparent">
                        <thead class="text-gray-700">
                            <tr>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.courses.inputs.subject_id')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.courses.inputs.title')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.courses.inputs.slug')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.courses.inputs.description')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.courses.inputs.image')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.courses.inputs.body')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.courses.inputs.order')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.courses.inputs.teacher_id')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.courses.inputs.active')
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @forelse($courses as $course)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-left">
                                    {{ optional($course->subject)->name ?? '-'
                                    }}
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
                                    {{ optional($course->teacher)->first_name ??
                                    '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $course->active ?? '-' }}
                                </td>
                                <td
                                    class="px-4 py-3 text-center"
                                    style="width: 134px;"
                                >
                                    <div
                                        role="group"
                                        aria-label="Row Actions"
                                        class="
                                            relative
                                            inline-flex
                                            align-middle
                                        "
                                    >
                                        @can('update', $course)
                                        <a
                                            href="{{ route('courses.edit', $course) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i
                                                    class="icon ion-md-create"
                                                ></i>
                                            </button>
                                        </a>
                                        @endcan @can('view', $course)
                                        <a
                                            href="{{ route('courses.show', $course) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i class="icon ion-md-eye"></i>
                                            </button>
                                        </a>
                                        @endcan @can('delete', $course)
                                        <form
                                            action="{{ route('courses.destroy', $course) }}"
                                            method="POST"
                                            onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                        >
                                            @csrf @method('DELETE')
                                            <button
                                                type="submit"
                                                class="button"
                                            >
                                                <i
                                                    class="
                                                        icon
                                                        ion-md-trash
                                                        text-red-600
                                                    "
                                                ></i>
                                            </button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="10">
                                    <div class="mt-10 px-4">
                                        {!! $courses->render() !!}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
