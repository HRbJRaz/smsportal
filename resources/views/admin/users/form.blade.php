@props(['user', 'units', 'roles', 'editing' => false])

<form method="POST" action="{{ $editing ? route('users.update', $user->id) : route('users.store') }}">
    @csrf
    @if($editing)
        @method('PUT')
    @endif

    <!-- Name -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}"
               class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-indigo-200" required>
                   
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
    </div>

    <!-- Email -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}"
               class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-indigo-200" required>
                   
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
    </div>

    <!-- Password (only for create) -->
    @unless($editing)
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password"
                   class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-indigo-200" required>
                   
            @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    @endunless

    <!-- Unit -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Unit</label>
        <select name="unit_id"
                class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-indigo-200" required>
            <option value="">-- Select Unit --</option>
            @foreach($units as $unit)
                <option class="text-black" value="{{ $unit->id }}"
                    {{ old('unit_id', $user->unit_id ?? '') == $unit->id ? 'selected' : '' }}>
                    {{ $unit->Name }}
                </option>
            @endforeach
        </select>
                   
        @error('unit_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Roles (multi-select) -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Roles</label>
        <select name="roles[]" multiple
                class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-indigo-200">
            @foreach($roles as $role)
                <option value="{{ $role->name }}"
                    {{ (isset($user) && $user->hasRole($role->name)) ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>
        
        @error('roles')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Submit -->
    <div class="mt-6">
        <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
            {{ $editing ? 'Update User' : 'Create User' }}
        </button>
    </div>
</form>
