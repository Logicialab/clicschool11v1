<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.classes.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('classes.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.classes.inputs.level_id')
                        </h5>
                        <span>{{ optional($classe->level)->name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.classes.inputs.name')
                        </h5>
                        <span>{{ $classe->title ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.classes.inputs.slug')
                        </h5>
                        <span>{{ $classe->slug ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.classes.inputs.description')
                        </h5>
                        <span>{{ $classe->description ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.classes.inputs.image')
                        </h5>
                        <x-partials.thumbnail
                            src="{{ $classe->image ? \Storage::url($classe->image) : '' }}"
                            size="150"
                        />
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.classes.inputs.annee_scolaire')
                        </h5>
                        <span>{{ $classe->annee_scolaire ?? '-' }}</span>
                    </div>
                </div>

                <div class="mt-10">
                    <a href="{{ route('classes.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\Classe::class)
                    <a href="{{ route('classes.create') }}" class="button">
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </x-partials.card>

            @can('view-any', App\Models\Subject::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Subjects </x-slot>

                <livewire:backend.classe-subjects-detail :classe="$classe" />
            </x-partials.card>
            @endcan @can('view-any', App\Models\Student::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Students </x-slot>

                <livewire:backend.classe-students-detail :classe="$classe" />
            </x-partials.card>
            @endcan
        </div>
    </div>
</x-app-layout>
