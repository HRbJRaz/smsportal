@props(['division', 'editing' => false])

<form method="POST" action="{{ $editing ? route('divisions.update', $division->id) : route('divisions.store') }}">
    @csrf
    @if ($editing)
        @method('PUT')
    @endif

    <!-- Name -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" name="name" value="{{ old('name', $division->name ?? '') }}"
               class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-indigo-200 @error('name') border-red-500 @enderror" required>
        @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Abbreviation -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Abbreviation</label>
        <input type="text" name="abbr" value="{{ old('abbr', $division->abbr ?? '') }}"
               class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-indigo-200 @error('abbr') border-red-500 @enderror">
        @error('abbr') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Director ID -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Director ID</label>
        <select name="director_id"
                class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-indigo-200" required>
            <option value="">-- Select Director --</option>
            @foreach($users as $user)
                <option class="text-black" value="{{ $user->id }}"
                    {{ old('director_id', $user->id ?? '') == $division->director_id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        @error('director_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="mt-6">
        <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
            {{ $editing ? 'Update Division' : 'Create Division' }}
        </button>
    </div>
</form>
