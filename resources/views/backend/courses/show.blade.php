<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.courses.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('courses.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.courses.inputs.subject_id')
                        </h5>
                        <span
                            >{{ optional($course->subject)->name ?? '-' }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.courses.inputs.title')
                        </h5>
                        <span>{{ $course->title ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.courses.inputs.slug')
                        </h5>
                        <span>{{ $course->slug ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.courses.inputs.description')
                        </h5>
                        <span>{{ $course->description ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.courses.inputs.image')
                        </h5>
                        <x-partials.thumbnail
                            src="{{ $course->image ? \Storage::url($course->image) : '' }}"
                            size="150"
                        />
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.courses.inputs.body')
                        </h5>
                        <span>{{ $course->body ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.courses.inputs.order')
                        </h5>
                        <span>{{ $course->order ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.courses.inputs.teacher_id')
                        </h5>
                        <span
                            >{{ optional($course->teacher)->first_name ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.courses.inputs.active')
                        </h5>
                        <span>{{ $course->active ?? '-' }}</span>
                    </div>
                </div>

                <div class="mt-10">
                    <a href="{{ route('courses.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\Course::class)
                    <a href="{{ route('courses.create') }}" class="button">
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </x-partials.card>

            @can('view-any', App\Models\File::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Files </x-slot>

                <livewire:backend.course-files-detail :course="$course" />
            </x-partials.card>
            @endcan @can('view-any', App\Models\Video::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Videos </x-slot>

                <livewire:backend.course-videos-detail :course="$course" />
            </x-partials.card>
            @endcan @can('view-any', App\Models\Exercice::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Exercices </x-slot>

                <livewire:backend.course-exercices-detail :course="$course" />
            </x-partials.card>
            @endcan @can('view-any', App\Models\Quiz::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Quizzes </x-slot>

                <livewire:backend.course-quizzes-detail :course="$course" />
            </x-partials.card>
            @endcan @can('view-any', App\Models\Live::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Lives </x-slot>

                <livewire:backend.course-lives-detail :course="$course" />
            </x-partials.card>
            @endcan
        </div>
    </div>
</x-app-layout>
