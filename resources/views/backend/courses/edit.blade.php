<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.courses.edit_title')
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

                <x-form
                    method="PUT"
                    action="{{ route('courses.update', $course) }}"
                    has-files
                    class="mt-4"
                >
                    @include('backend.courses.form-inputs')

                    <div class="mt-10">
                        <a href="{{ route('courses.index') }}" class="button">
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

                        <a href="{{ route('courses.create') }}" class="button">
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
