<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.students.index_title')
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
                            @can('create', App\Models\Student::class)
                            <a
                                href="{{ route('students.create') }}"
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
                                    @lang('crud.students.inputs.user_id')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.students.inputs.classe_id')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.students.inputs.first_name')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.students.inputs.last_name')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.students.inputs.nickname')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.students.inputs.home_adress')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.students.inputs.street')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.students.inputs.neighborhood')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.students.inputs.city')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.students.inputs.school_name')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.students.inputs.student_level')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.students.inputs.name_guardian')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.students.inputs.Profession')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.students.inputs.etablissement_travail')
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @forelse($students as $student)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-left">
                                    {{ optional($student->user)->name ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ optional($student->classe)->name ?? '-'
                                    }}
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
                                        @can('update', $student)
                                        <a
                                            href="{{ route('students.edit', $student) }}"
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
                                        @endcan @can('view', $student)
                                        <a
                                            href="{{ route('students.show', $student) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i class="icon ion-md-eye"></i>
                                            </button>
                                        </a>
                                        @endcan @can('delete', $student)
                                        <form
                                            action="{{ route('students.destroy', $student) }}"
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
                                <td colspan="15">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="15">
                                    <div class="mt-10 px-4">
                                        {!! $students->render() !!}
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
