<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Normal Operation Safety Survey') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 justify-center items-start">
                <!-- Example Button -->
                <x-link href="{{ route('observers.index') }}"> Manage Observes </x-link>
                <x-link href="{{ route('programme.index') }}"> Programmes </x-link>
                <x-link href="{{ route('ses.index') }}"> Session </x-link>
                <x-link href="{{ route('obs.index') }}"> Observation </x-link>
                <x-link href="{{ route('t.index') }}"> Threat </x-link>
                <x-link href="{{ route('e.index') }}"> Error </x-link>
                <x-link href="{{ route('ud.index') }}"> Undesired State </x-link>
                <x-link href="{{ route('pr.index') }}"> Position Relief </x-link>
                <!-- Add more buttons here -->
            </div>
        </div>
    </div>
</x-app-layout>
