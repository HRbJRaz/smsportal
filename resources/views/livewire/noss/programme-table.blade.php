<div class="space-y-6">

    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <div class="flex flex-wrap gap-4">
            <input type="text" wire:model.debounce.300ms="search" name='search' placeholder="Search..."
                class="px-4 py-2 border rounded-md w-full sm:w-1/4" />

            <select wire:model="filterUnit" name='filterUnit' class="px-4 py-2 border rounded-md w-full sm:w-1/4">
                <option value="">-- All Units --</option>
                @foreach ($units as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->Name }}</option>
                @endforeach
            </select>

            <select wire:model="filterObserver" name='filterObserver' class="px-4 py-2 border rounded-md w-full sm:w-1/4">
                <option value="">-- All Observers --</option>
                @foreach ($observers as $obs)
                    <option value="{{ $obs->id }}">{{ $obs->callsign }}</option>
                @endforeach
            </select>
        </div>
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100 text-left text-gray-700 font-semibold">
                <tr>
                    <th class="px-4 py-3">Unit</th>
                    <th class="px-4 py-3">Coordinator</th>
                    <th class="px-4 py-3">Start</th>
                    <th class="px-4 py-3">End</th>
                    <th class="px-4 py-3">Observers</th>
                    <th class="px-4 py-3">Report</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($programmes as $programme)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $programme->unit->Name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $programme->cordinator->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $programme->date_start }}</td>
                        <td class="px-4 py-2">{{ $programme->date_end }}</td>
                        <td class="px-4 py-2">
                            @forelse ($programme->observers as $observer)
                                <div>{{ $observer->callsign }}</div>
                            @empty
                                <div class="text-gray-400">None</div>
                            @endforelse
                        </td>
                        <td class="px-4 py-2">
                            {{ $programme->report ? '✔️ Yes' : '❌ No' }}
                            @if ($programme->report_file)
                                <br>
                                <a href="{{ asset('storage/' . $programme->report_file) }}" class="text-blue-600 underline" target="_blank">View</a>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-center space-x-2">
                            <a href="{{ route('programme.edit', $programme->id) }}"
                               class="text-indigo-600 hover:underline font-medium">Edit</a>

                            <form method="POST" action="{{ route('programme.destroy', $programme->id) }}"
                                  class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this programme?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline font-medium">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-4 text-center text-gray-500">No programmes found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pt-4">
        {{ $programmes->links() }}
    </div>
</div>
