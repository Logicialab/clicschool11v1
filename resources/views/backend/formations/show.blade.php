<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.formations.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('formations.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.formations.inputs.name')
                        </h5>
                        <span>{{ $formation->title ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.formations.inputs.formation_type_id')
                        </h5>
                        <span
                            >{{ optional($formation->formationType)->name ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.formations.inputs.description')
                        </h5>
                        <span>{{ $formation->description ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.formations.inputs.image')
                        </h5>
                        <x-partials.thumbnail
                            src="{{ $formation->image ? \Storage::url($formation->image) : '' }}"
                            size="150"
                        />
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.formations.inputs.status')
                        </h5>
                        <span>{{ $formation->status ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.formations.inputs.teacher_id')
                        </h5>
                        <span
                            >{{ optional($formation->teacher)->first_name ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.formations.inputs.active')
                        </h5>
                        <span>{{ $formation->active ?? '-' }}</span>
                    </div>
                </div>

                <div class="mt-10">
                    <a href="{{ route('formations.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\Formation::class)
                    <a href="{{ route('formations.create') }}" class="button">
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </x-partials.card>

            @can('view-any', App\Models\FormationDetail::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Formation Details </x-slot>

                <livewire:backend.formation-formation-details-detail
                    :formation="$formation"
                />
            </x-partials.card>
            @endcan @can('view-any', App\Models\FormationParticipant::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Formation Participants </x-slot>

                <livewire:backend.formation-formation-participants-detail
                    :formation="$formation"
                />
            </x-partials.card>
            @endcan
        </div>
    </div>
</x-app-layout>
