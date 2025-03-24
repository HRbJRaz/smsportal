@props(['session', 'programme', 'editing' => false])

<form method="POST"
      action="{{ $editing ? route('sessions.update', [$programme->id, $session->id]) : route('sessions.store', $programme->id) }}">
    @csrf
    @if($editing)
        @method('PUT')
    @endif

    <!-- Time Start -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Time Start</label>
        <input type="time" name="time_start" value="{{ old('time_start', $session->time_start ?? '') }}"
               class="mt-1 block w-full rounded-md border-gray-300 focus:ring-indigo-200 @error('time_start') border-red-500 @enderror">
        @error('time_start') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Time End -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Time End</label>
        <input type="time" name="time_end" value="{{ old('time_end', $session->time_end ?? '') }}"
               class="mt-1 block w-full rounded-md border-gray-300 focus:ring-indigo-200 @error('time_end') border-red-500 @enderror">
        @error('time_end') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Specialty (Multi-Select) -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Specialty</label>
        <select name="specialty[]" multiple
                class="mt-1 block w-full rounded-md border-gray-300 focus:ring focus:ring-indigo-200 @error('specialty') border-red-500 @enderror">
            @php
                $options = [
                    'Aerodrome Control',
                    'Approach Procedural',
                    'Approach Surveillance',
                    'Area Procedural',
                    'Area Surveillance'
                ];
            @endphp

            @foreach ($options as $option)
                <option value="{{ $option }}"
                    {{ collect(old('specialty', $session->specialty ?? []))->contains($option) ? 'selected' : '' }}>
                    {{ $option }}
                </option>
            @endforeach
        </select>
        @error('specialty') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Position -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Position</label>
        <input type="text" name="position" value="{{ old('position', $session->position ?? '') }}"
               class="mt-1 block w-full rounded-md border-gray-300 focus:ring-indigo-200 @error('position') border-red-500 @enderror">
        @error('position') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Submit -->
    <div class="mt-6">
        <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
            {{ $editing ? 'Update Session' : 'Create Session' }}
        </button>
    </div>
</form>
