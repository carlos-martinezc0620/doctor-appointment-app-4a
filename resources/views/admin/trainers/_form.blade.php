<div class="bg-white p-6 rounded shadow max-w-md">

    {{-- Nombre --}}
    <label class="block font-medium text-sm mb-1">Nombre</label>
    <input type="text" name="name"
           value="{{ old('name', $trainer->name ?? '') }}"
           class="w-full border rounded p-2 focus:ring-blue-500 focus:border-blue-500">
    @error('name')
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror

    {{-- Email --}}
    <label class="block font-medium text-sm mb-1 mt-4">Email</label>
    <input type="email" name="email"
           value="{{ old('email', $trainer->email ?? '') }}"
           class="w-full border rounded p-2 focus:ring-blue-500 focus:border-blue-500">
    @error('email')
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror

    {{-- Teléfono --}}
    <label class="block font-medium text-sm mb-1 mt-4">Teléfono</label>
    <input type="text" name="phone"
           value="{{ old('phone', $trainer->phone ?? '') }}"
           class="w-full border rounded p-2 focus:ring-blue-500 focus:border-blue-500">
    @error('phone')
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror

</div>
