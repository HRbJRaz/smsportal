@props(['observer', 'users', 'editing' => false])

<form method="POST" action="{{ $editing ? route('observers.update', $observer->id) : route('observers.store') }}">
    @csrf
    @if($editing)
        @method('PUT')
    @endif

    <!-- User Dropdown -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">User</label>
        <select name="user_id" class="mt-1 block w-full rounded-md border-gray-300 focus:ring focus:ring-indigo-200 @error('user_id') border-red-500 @enderror" required>
            <option value="">-- Select User --</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id', $observer->user_id ?? '') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }} ({{ $user->email }})
                </option>
            @endforeach
        </select>
        @error('user_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Callsign -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Callsign</label>
        <input type="text" name="callsign" value="{{ old('callsign', $observer->callsign ?? '') }}"
               class="mt-1 block w-full rounded-md border-gray-300 focus:ring focus:ring-indigo-200 @error('callsign') border-red-500 @enderror">
        @error('callsign') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Initial Course Date -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Initial Course Date</label>
        <input type="date" name="initial_course_date" value="{{ old('initial_course_date', $observer->initial_course_date ?? '') }}"
               class="mt-1 block w-full rounded-md border-gray-300 focus:ring focus:ring-indigo-200 @error('initial_course_date') border-red-500 @enderror">
        @error('initial_course_date') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Refresher Course Date -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Refresher Course Date</label>
        <input type="date" name="refresher_course_date" value="{{ old('refresher_course_date', $observer->refresher_course_date ?? '') }}"
               class="mt-1 block w-full rounded-md border-gray-300 focus:ring focus:ring-indigo-200 @error('refresher_course_date') border-red-500 @enderror">
        @error('refresher_course_date') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Assignment Date -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Assignment Date</label>
        <input type="date" name="assigement_date" value="{{ old('assigement_date', $observer->assigement_date ?? '') }}"
               class="mt-1 block w-full rounded-md border-gray-300 focus:ring focus:ring-indigo-200 @error('assigement_date') border-red-500 @enderror">
        @error('assigement_date') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Programme Assignments -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Assigned Programmes</label>
        <select name="programme_ids[]" multiple
                class="mt-1 block w-full rounded-md border-gray-300 focus:ring focus:ring-indigo-200">
            @foreach ($programmes as $programme)
                <option value="{{ $programme->id }}"
                    {{ collect(old('programme_ids', $observer?->programmes->pluck('id') ?? []))->contains($programme->id) ? 'selected' : '' }}>
                    {{ $programme->unit->Name ?? '' }} ({{ $programme->date_start }} → {{ $programme->date_end }})
                </option>
            @endforeach
        </select>
    </div>

    <!-- Submit -->
    <div class="mt-6">
        <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
            {{ $editing ? 'Update Observer' : 'Create Observer' }}
        </button>
    </div>
</form>
