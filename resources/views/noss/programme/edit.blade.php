<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Edit Programme</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        @include('noss.programme.form', [
            'programme' => $programme,
            'units' => $units,
            'users' => $users,
            'editing' => true
        ])
    </div>
</x-app-layout>
