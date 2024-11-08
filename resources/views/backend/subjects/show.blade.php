<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.subjects.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('subjects.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.subjects.inputs.classe_id')
                        </h5>
                        <span
                            >{{ optional($subject->classe)->name ?? '-' }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.subjects.inputs.name')
                        </h5>
                        <span>{{ $subject->title ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.subjects.inputs.description')
                        </h5>
                        <span>{{ $subject->description ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.subjects.inputs.image')
                        </h5>
                        <x-partials.thumbnail
                            src="{{ $subject->image ? \Storage::url($subject->image) : '' }}"
                            size="150"
                        />
                    </div>
                </div>

                <div class="mt-10">
                    <a href="{{ route('subjects.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\Subject::class)
                    <a href="{{ route('subjects.create') }}" class="button">
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </x-partials.card>

            @can('view-any', App\Models\Course::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Courses </x-slot>

                <livewire:backend.subject-courses-detail :subject="$subject" />
            </x-partials.card>
            @endcan
        </div>
    </div>
</x-app-layout>
