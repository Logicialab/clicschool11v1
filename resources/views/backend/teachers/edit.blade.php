<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.teachers.edit_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('teachers.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <x-form
                    method="PUT"
                    action="{{ route('teachers.update', $teacher) }}"
                    has-files
                    class="mt-4"
                >
                    @include('backend.teachers.form-inputs')

                    <div class="mt-10">
                        <a href="{{ route('teachers.index') }}" class="button">
                            <i
                                class="
                                    mr-1
                                    icon
                                    ion-md-return-left
                                    text-primary
                                "
                            ></i>
                            @lang('crud.common.back')
                        </a>

                        <a href="{{ route('teachers.create') }}" class="button">
                            <i class="mr-1 icon ion-md-add text-primary"></i>
                            @lang('crud.common.create')
                        </a>

                        <button
                            type="submit"
                            class="button button-primary float-right"
                        >
                            <i class="mr-1 icon ion-md-save"></i>
                            @lang('crud.common.update')
                        </button>
                    </div>
                </x-form>
            </x-partials.card>

            @can('view-any', App\Models\Course::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Courses </x-slot>

                <livewire:backend.teacher-courses-detail :teacher="$teacher" />
            </x-partials.card>
            @endcan @can('view-any', App\Models\Live::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Lives </x-slot>

                <livewire:backend.teacher-lives-detail :teacher="$teacher" />
            </x-partials.card>
            @endcan @can('view-any', App\Models\TeacherSalary::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Teacher Salaries </x-slot>

                <livewire:backend.teacher-teacher-salaries-detail :teacher="$teacher" />
            </x-partials.card>
            @endcan @can('view-any', App\Models\TeacherPayment::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Teacher Payments </x-slot>

                <livewire:backend.teacher-teacher-payments-detail :teacher="$teacher" />
            </x-partials.card>
            @endcan
        </div>
    </div>
</x-app-layout>
