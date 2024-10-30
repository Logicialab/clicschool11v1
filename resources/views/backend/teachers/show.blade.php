<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.teachers.show_title')
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

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.teachers.inputs.user_id')
                        </h5>
                        <span>{{ optional($teacher->user)->name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.teachers.inputs.first_name')
                        </h5>
                        <span>{{ $teacher->name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.teachers.inputs.last_name')
                        </h5>
                        <span>{{ $teacher->name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.teachers.inputs.bio')
                        </h5>
                        <span>{{ $teacher->bio ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.teachers.inputs.image')
                        </h5>
                        <x-partials.thumbnail
                            src="{{ $teacher->image ? \Storage::url($teacher->image) : '' }}"
                            size="150"
                        />
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.teachers.inputs.salaire')
                        </h5>
                        <span>{{ $teacher->salaire ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.teachers.inputs.school_name')
                        </h5>
                        <span>{{ $teacher->school_name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.teachers.inputs.specialite')
                        </h5>
                        <span>{{ $teacher->specialite ?? '-' }}</span>
                    </div>
                </div>

                <div class="mt-10">
                    <a href="{{ route('teachers.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\Teacher::class)
                    <a href="{{ route('teachers.create') }}" class="button">
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
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
