<div class="space-y-6">
    <!-- Search -->
    <div>
        <input type="text" wire:model.debounce.300ms="search" placeholder="Search observers..."
               class="w-full sm:w-1/3 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-300 focus:outline-none" />
    </div>

    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100 text-left text-gray-700 font-semibold">
                <tr>
                    <th class="px-4 py-3">Callsign</th>
                    <th class="px-4 py-3">User</th>
                    <th class="px-4 py-3">Initial Course</th>
                    <th class="px-4 py-3">Refresher Course</th>
                    <th class="px-4 py-3">Assignment Date</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($observers as $observer)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $observer->callsign }}</td>
                        <td class="px-4 py-2">{{ $observer->user->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $observer->initial_course_date }}</td>
                        <td class="px-4 py-2">{{ $observer->refresher_course_date }}</td>
                        <td class="px-4 py-2">{{ $observer->assigement_date }}</td>
                        <td class="px-4 py-2 text-center space-x-2">
                            <a href="{{ route('observers.edit', $observer->id) }}"
                               class="text-indigo-600 hover:underline font-medium">Edit</a>

                            <form method="POST" action="{{ route('observers.destroy', $observer->id) }}"
                                  class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this observer?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline font-medium">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-4 text-center text-gray-500">No observers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pt-4">
        {{ $observers->links() }}
    </div>
</div>
