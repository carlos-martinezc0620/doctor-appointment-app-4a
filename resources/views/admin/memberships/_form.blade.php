<div class="bg-white p-6 rounded shadow max-w-md">

    {{-- Tipo --}}
    <label class="block font-medium text-sm mb-1">Tipo</label>
    <input type="text" name="type" value="{{ old('type', $membership->type ?? '') }}"
           class="w-full border rounded p-2 focus:ring-blue-500 focus:border-blue-500">
    @error('type')
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror

    {{-- Precio --}}
    <label class="block font-medium text-sm mb-1 mt-4">Precio</label>
    <input type="number" step="0.01" name="price"
           value="{{ old('price', $membership->price ?? '') }}"
           class="w-full border rounded p-2 focus:ring-blue-500 focus:border-blue-500">
    @error('price')
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror

    {{-- Duración --}}
    <label class="block font-medium text-sm mb-1 mt-4">Duración (en días)</label>
    <input type="number" name="duration"
           value="{{ old('duration', $membership->duration ?? '') }}"
           class="w-full border rounded p-2 focus:ring-blue-500 focus:border-blue-500">
    @error('duration')
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror

</div>
