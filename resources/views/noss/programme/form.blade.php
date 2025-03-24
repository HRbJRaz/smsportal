@props(['programme', 'units', 'users', 'editing' => false])

<form method="POST"
      action="{{ $editing ? route('programme.update', $programme->id) : route('programme.store') }}"
      enctype="multipart/form-data">
    @csrf
    @if($editing)
        @method('PUT')
    @endif

    <!-- Unit -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Unit</label>
        <select name="unit_id" class="mt-1 block w-full rounded-md border-gray-300 focus:ring-indigo-200 @error('unit_id') border-red-500 @enderror" required>
            <option value="">-- Select Unit --</option>
            @foreach($units as $unit)
                <option value="{{ $unit->id }}" {{ old('unit_id', $programme->unit_id ?? '') == $unit->id ? 'selected' : '' }}>
                    {{ $unit->Name }}
                </option>
            @endforeach
        </select>
        @error('unit_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Coordinator -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Coordinator</label>
        <select name="cordinator_id" class="mt-1 block w-full rounded-md border-gray-300 focus:ring-indigo-200 @error('cordinator_id') border-red-500 @enderror" required>
            <option value="">-- Select User --</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('cordinator_id', $programme->cordinator_id ?? '') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }} ({{ $user->email }})
                </option>
            @endforeach
        </select>
        @error('cordinator_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Date Start -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Start Date</label>
        <input type="date" name="date_start" value="{{ old('date_start', $programme->date_start ?? '') }}"
               class="mt-1 block w-full rounded-md border-gray-300 focus:ring-indigo-200 @error('date_start') border-red-500 @enderror">
        @error('date_start') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Date End -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">End Date</label>
        <input type="date" name="date_end" value="{{ old('date_end', $programme->date_end ?? '') }}"
               class="mt-1 block w-full rounded-md border-gray-300 focus:ring-indigo-200 @error('date_end') border-red-500 @enderror">
        @error('date_end') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Report Checkbox -->
    <div class="mb-4 flex items-center space-x-2">
        <input type="checkbox" name="report" id="report" value="1"
               {{ old('report', $programme->report ?? false) ? 'checked' : '' }}>
        <label for="report" class="text-sm text-gray-700">Report Submitted</label>
    </div>
    @error('report') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror

    <!-- Report File Upload -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Report File (PDF)</label>
        <input type="file" name="report_file"
               class="mt-1 block w-full text-sm text-gray-600 border border-gray-300 rounded-md shadow-sm file:border-none file:bg-indigo-600 file:text-white file:px-4 file:py-2 file:rounded-md file:cursor-pointer" />
        @error('report_file') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror

        @if ($editing && $programme->report_file)
            <p class="mt-2 text-sm text-gray-500">
                Current file:
                <a href="{{ asset('storage/' . $programme->report_file) }}" target="_blank" class="text-blue-600 underline">View Report</a>
            </p>
        @endif
    </div>
    <!-- Assigned Observers -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Assigned Observers</label>
        <select name="observer_ids[]" multiple
                class="mt-1 block w-full rounded-md border-gray-300 focus:ring focus:ring-indigo-200 @error('observer_ids') border-red-500 @enderror">
            @foreach ($observers as $observer)
                <option value="{{ $observer->id }}"
                    {{ collect(old('observer_ids', $programme?->observers->pluck('id') ?? []))->contains($observer->id) ? 'selected' : '' }}>
                    {{ $observer->callsign }} - {{ $observer->user->name ?? 'Unknown' }}
                </option>
            @endforeach
        </select>
        @error('observer_ids') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Submit -->
    <div class="mt-6">
        <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
            {{ $editing ? 'Update Programme' : 'Create Programme' }}
        </button>
    </div>
</form>
