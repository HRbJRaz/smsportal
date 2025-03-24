<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Edit Observer</h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">
        @include('noss.observer.form', [
            'observer' => $observer,
            'users' => $users,
            'editing' => true
        ])
    </div>
</x-app-layout>
