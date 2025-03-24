<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Create Observer</h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">
        @include('noss.observer.form', [
            'observer' => null,
            'users' => $users,
            'editing' => false
        ])
    </div>
</x-app-layout>
