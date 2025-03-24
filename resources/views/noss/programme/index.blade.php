<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Programmes</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md shadow">
            {{ session('success') }}
        </div>
    @endif
        @livewire('noss.programme-table')
    </div>
</x-app-layout>
