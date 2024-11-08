<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.quizzes.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('quizzes.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.quizzes.inputs.course_id')
                        </h5>
                        <span>{{ optional($quiz->course)->title ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.quizzes.inputs.name')
                        </h5>
                        <span>{{ $quiz->name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.quizzes.inputs.description')
                        </h5>
                        <span>{{ $quiz->description ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.quizzes.inputs.active')
                        </h5>
                        <span>{{ $quiz->active ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.quizzes.inputs.order')
                        </h5>
                        <span>{{ $quiz->order ?? '-' }}</span>
                    </div>
                </div>

                <div class="mt-10">
                    <a href="{{ route('quizzes.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\Quiz::class)
                    <a href="{{ route('quizzes.create') }}" class="button">
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </x-partials.card>

            @can('view-any', App\Models\QuestionQuiz::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Question Quizs </x-slot>

                <livewire:backend.quiz-question-quizs-detail :quiz="$quiz" />
            </x-partials.card>
            @endcan
        </div>
    </div>
</x-app-layout>
