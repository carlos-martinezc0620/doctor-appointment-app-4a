<div class="bg-white p-6 rounded shadow">

    {{-- Nombre --}}
    <label class="block font-medium text-sm mb-1">Nombre</label>
    <input type="text" name="name"
           value="{{ old('name', $class->name ?? '') }}"
           class="w-full border rounded p-2 focus:ring-blue-500 focus:border-blue-500"
           required>
    @error('name')
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror


    {{-- Capacidad --}}
    <label class="block font-medium text-sm mb-1 mt-4">Capacidad</label>
    <input type="number" name="capacity"
           value="{{ old('capacity', $class->capacity ?? '') }}"
           class="w-full border rounded p-2 focus:ring-blue-500 focus:border-blue-500"
           required>
    @error('capacity')
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror


    {{-- Entrenador --}}
    <label class="block font-medium text-sm mb-1 mt-4">Entrenador</label>
    <select name="trainer_id"
            class="w-full border rounded p-2 focus:ring-blue-500 focus:border-blue-500"
            required>
        <option value="">Elegir entrenador</option>

        @foreach($trainers as $trainer)
            <option value="{{ $trainer->id }}"
                {{ old('trainer_id', $class->trainer_id ?? '') == $trainer->id ? 'selected' : '' }}>
                {{ $trainer->name }}
            </option>
        @endforeach
    </select>
    @error('trainer_id')
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror


    {{-- Descripción --}}
    <label class="block font-medium text-sm mb-1 mt-4">Descripción</label>
    <textarea name="description" rows="3"
              class="w-full border rounded p-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description', $class->description ?? '') }}</textarea>
    @error('description')
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror

</div>
