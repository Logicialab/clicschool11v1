<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.competition_questions.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a
                        href="{{ route('competition-questions.index') }}"
                        class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.competition_questions.inputs.competition_id')
                        </h5>
                        <span
                            >{{
                            optional($competitionQuestion->competition)->name ??
                            '-' }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.competition_questions.inputs.question')
                        </h5>
                        <span>{{ $competitionQuestion->question ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.competition_questions.inputs.question_type')
                        </h5>
                        <span
                            >{{ $competitionQuestion->question_type ?? '-'
                            }}</span
                        >
                    </div>
                </div>

                <div class="mt-10">
                    <a
                        href="{{ route('competition-questions.index') }}"
                        class="button"
                    >
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\CompetitionQuestion::class)
                    <a
                        href="{{ route('competition-questions.create') }}"
                        class="button"
                    >
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </x-partials.card>

            @can('view-any', App\Models\CompetitionAnswer::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Competition Answers </x-slot>

                <livewire:backend.competition-question-competition-answers-detail
                    :competitionQuestion="$competitionQuestion"
                />
            </x-partials.card>
            @endcan
        </div>
    </div>
</x-app-layout>
