<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administration') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 justify-center items-start">
                <!-- Example Button -->
                <x-link href="{{ route('users.index') }}"> Manage Users </x-link>
                <x-link href="{{ route('units.index') }}"> Manage Units </x-link>
                <x-link href="{{ route('divisions.index') }}"> Manage Divisions </x-link>
                <!-- Add more buttons here -->
            </div>
        </div>
    </div>
</x-app-layout>
