<div class="space-y-6">
    <!-- Search Input -->
    <div>
        <input
            type="text"
            wire:model.debounce.300ms="search"
            placeholder="Search users..."
            class="w-full md:w-1/3 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-300 focus:outline-none"
        />
    </div>

    <!-- User Table -->
    <div class="responsive overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full table-auto divide-y divide-gray-200">
            <thead class="bg-gray-100 text-left text-sm font-semibold text-gray-700">
                <tr>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Unit</th>
                    <th class="px-4 py-3">Division</th>
                    <th class="px-4 py-3">Roles</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm">
                @forelse ($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">
                            {{ optional($user->unit)->Name ?? '-' }}
                        </td>
                        <td class="px-4 py-2">
                            {{ optional($user->division)->name ?? '-' }}
                        </td>
                        <td class="px-4 py-2">
                            {{ $user->getRoleNames()->join(', ') }}
                        </td>
                        <td class="px-4 py-2 text-center space-x-2">
                            <!-- Edit Link -->
                            <a href="{{ route('users.edit', $user->id) }}"
                            class="text-indigo-600 hover:text-indigo-900 font-medium">Edit</a>

                            <!-- Delete Form -->
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}"
                                class="inline-block"
                                onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-gray-500">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pt-4">
        {{ $users->links() }}
    </div>
</div>
