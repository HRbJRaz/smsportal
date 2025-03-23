<div class="space-y-6">
    <!-- Search -->
    <div>
        <input type="text" wire:model.debounce.300ms="search" placeholder="Search divisions..."
               class="w-full sm:w-1/3 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-300 focus:outline-none" />
    </div>

    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100 text-left text-gray-700 font-semibold">
                <tr>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Abbreviation</th>
                    <th class="px-4 py-3">Director ID</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($divisions as $division)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $division->name }}</td>
                        <td class="px-4 py-2">{{ $division->abbr }}</td>
                        <td class="px-4 py-2">{{ $division->director->name }}</td>
                        <td class="px-4 py-2 text-center space-x-2">
                            <a href="{{ route('divisions.edit', $division->id) }}"
                               class="text-indigo-600 hover:underline font-medium">Edit</a>

                            <form method="POST" action="{{ route('divisions.destroy', $division->id) }}"
                                  class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this division?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline font-medium">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-4 text-center text-gray-500">No divisions found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pt-4">
        {{ $divisions->links() }}
    </div>
</div>
