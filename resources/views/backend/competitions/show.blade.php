<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.competitions.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('competitions.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.competitions.inputs.classe_id')
                        </h5>
                        <span
                            >{{ optional($competition->classe)->name ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.competitions.inputs.name')
                        </h5>
                        <span>{{ $competition->title ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.competitions.inputs.description')
                        </h5>
                        <span>{{ $competition->description ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.competitions.inputs.date_start')
                        </h5>
                        <span>{{ $competition->date_start ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.competitions.inputs.date_end')
                        </h5>
                        <span>{{ $competition->date_end ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.competitions.inputs.order')
                        </h5>
                        <span>{{ $competition->order ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.competitions.inputs.file')
                        </h5>
                        @if($competition->file)
                        <a
                            href="{{ \Storage::url($competition->file) }}"
                            target="blank"
                            ><i class="mr-1 icon ion-md-download"></i
                            >&nbsp;Download</a
                        >
                        @else - @endif
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.competitions.inputs.active')
                        </h5>
                        <span>{{ $competition->active ?? '-' }}</span>
                    </div>
                </div>

                <div class="mt-10">
                    <a href="{{ route('competitions.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\Competition::class)
                    <a href="{{ route('competitions.create') }}" class="button">
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </x-partials.card>

            @can('view-any', App\Models\CompetitionQuestion::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Competition Questions </x-slot>

                <livewire:backend.competition-competition-questions-detail
                    :competition="$competition"
                />
            </x-partials.card>
            @endcan
        </div>
    </div>
</x-app-layout>
