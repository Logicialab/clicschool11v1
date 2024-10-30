<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.question_quizs.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('question-quizs.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.question_quizs.inputs.quiz_id')
                        </h5>
                        <span
                            >{{ optional($questionQuiz->quiz)->name ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.question_quizs.inputs.title')
                        </h5>
                        <span>{{ $questionQuiz->title ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.question_quizs.inputs.type')
                        </h5>
                        <span>{{ $questionQuiz->type ?? '-' }}</span>
                    </div>
                </div>

                <div class="mt-10">
                    <a
                        href="{{ route('question-quizs.index') }}"
                        class="button"
                    >
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\QuestionQuiz::class)
                    <a
                        href="{{ route('question-quizs.create') }}"
                        class="button"
                    >
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </x-partials.card>

            @can('view-any', App\Models\AnswerQuiz::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Answer Quizs </x-slot>

                <livewire:backend.question-quiz-answer-quizs-detail
                    :questionQuiz="$questionQuiz"
                />
            </x-partials.card>
            @endcan @can('view-any', App\Models\StudentAnswerQuiz::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Student Answer Quizs </x-slot>

                <livewire:backend.question-quiz-student-answer-quizs-detail
                    :questionQuiz="$questionQuiz"
                />
            </x-partials.card>
            @endcan
        </div>
    </div>
</x-app-layout>
