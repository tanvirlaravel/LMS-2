<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Users') }}
            </h2>

            <div class="flex items-center">
                <a class="mr-4 lms-btn" href="{{ route('role.index') }}">Roles</a>
                <a class="lms-btn" href="{{ route('user.create') }}">Add new user</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:user-index />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
