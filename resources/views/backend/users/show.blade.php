<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.users.show_title')
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

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.users.inputs.name')
                        </h5>
                        <span>{{ $user->name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.users.inputs.username')
                        </h5>
                        <span>{{ $user->username ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.users.inputs.email')
                        </h5>
                        <span>{{ $user->email ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.users.inputs.date_birth')
                        </h5>
                        <span>{{ $user->date_birth ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.users.inputs.phone')
                        </h5>
                        <span>{{ $user->phone ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.users.inputs.address')
                        </h5>
                        <span>{{ $user->address ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.users.inputs.city')
                        </h5>
                        <span>{{ $user->city ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.users.inputs.is_active')
                        </h5>
                        <span>{{ $user->is_active ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.users.inputs.sexe')
                        </h5>
                        <span>{{ $user->sexe ?? '-' }}</span>
                    </div>
                </div>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.roles.name')
                        </h5>
                        <div>
                            @forelse ($user->roles as $role)
                            <div
                                class="
                                    inline-block
                                    p-1
                                    text-center text-sm
                                    rounded
                                    bg-blue-400
                                    text-white
                                "
                            >
                                {{ $role->name }}
                            </div>
                            <br />
                            @empty - @endforelse
                        </div>
                    </div>
                </div>

                <div class="mt-10">
                    <a href="{{ route('users.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\User::class)
                    <a href="{{ route('users.create') }}" class="button">
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
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
