<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.students.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('students.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.students.inputs.user_id')
                        </h5>
                        <span>{{ optional($student->user)->name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.students.inputs.classe_id')
                        </h5>
                        <span
                            >{{ optional($student->classe)->name ?? '-' }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.students.inputs.first_name')
                        </h5>
                        <span>{{ $student->name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.students.inputs.last_name')
                        </h5>
                        <span>{{ $student->name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.students.inputs.nickname')
                        </h5>
                        <span>{{ $student->nickname ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.students.inputs.home_adress')
                        </h5>
                        <span>{{ $student->home_adress ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.students.inputs.street')
                        </h5>
                        <span>{{ $student->street ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.students.inputs.neighborhood')
                        </h5>
                        <span>{{ $student->neighborhood ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.students.inputs.city')
                        </h5>
                        <span>{{ $student->city ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.students.inputs.school_name')
                        </h5>
                        <span>{{ $student->school_name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.students.inputs.student_level')
                        </h5>
                        <span>{{ $student->student_level ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.students.inputs.name_guardian')
                        </h5>
                        <span>{{ $student->name_guardian ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.students.inputs.Profession')
                        </h5>
                        <span>{{ $student->Profession ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.students.inputs.etablissement_travail')
                        </h5>
                        <span
                            >{{ $student->etablissement_travail ?? '-' }}</span
                        >
                    </div>
                </div>

                <div class="mt-10">
                    <a href="{{ route('students.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\Student::class)
                    <a href="{{ route('students.create') }}" class="button">
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </x-partials.card>

            @can('view-any', App\Models\StudentAnswerQuiz::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Student Answer Quizs </x-slot>

                <livewire:backend.student-student-answer-quizs-detail
                    :student="$student"
                />
            </x-partials.card>
            @endcan @can('view-any', App\Models\LiveParticipant::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Live Participants </x-slot>

                <livewire:backend.student-live-participants-detail
                    :student="$student"
                />
            </x-partials.card>
            @endcan @can('view-any', App\Models\ParentStudent::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Parent Students </x-slot>

                <livewire:backend.student-parent-students-detail :student="$student" />
            </x-partials.card>
            @endcan
        </div>
    </div>
</x-app-layout>
