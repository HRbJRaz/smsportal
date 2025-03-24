<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Observers</h2>
    </x-slot>
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md shadow">
            {{ session('success') }}
        </div>
    @endif
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @livewire('noss.observer-table')
    </div>
</x-app-layout>
