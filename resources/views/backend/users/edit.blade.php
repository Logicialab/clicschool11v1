<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.users.edit_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('users.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <x-form
                    method="PUT"
                    action="{{ route('users.update', $user) }}"
                    class="mt-4"
                >
                    @include('backend.users.form-inputs')

                    <div class="mt-10">
                        <a href="{{ route('users.index') }}" class="button">
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

                        <a href="{{ route('users.create') }}" class="button">
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

            @can('view-any', App\Models\Student::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Students </x-slot>

                <livewire:backend.user-students-detail :user="$user" />
            </x-partials.card>
            @endcan @can('view-any', App\Models\Teacher::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Teachers </x-slot>

                <livewire:backend.user-teachers-detail :user="$user" />
            </x-partials.card>
            @endcan @can('view-any', App\Models\Wallet::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Wallets </x-slot>

                <livewire:backend.user-wallets-detail :user="$user" />
            </x-partials.card>
            @endcan @can('view-any', App\Models\Subscription::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Subscriptions </x-slot>

                <livewire:backend.user-subscriptions-detail :user="$user" />
            </x-partials.card>
            @endcan @can('view-any', App\Models\Parente::class)
            <x-partials.card class="mt-5">
                <x-slot name="title"> Parentes </x-slot>

                <livewire:backend.user-parentes-detail :user="$user" />
            </x-partials.card>
            @endcan
        </div>
    </div>
</x-app-layout>
