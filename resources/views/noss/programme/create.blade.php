<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Create Programme</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        @include('noss.programme.form', [
            'programme' => null,
            'units' => $units,
            'users' => $users,
            'editing' => false
        ])
    </div>
</x-app-layout>
