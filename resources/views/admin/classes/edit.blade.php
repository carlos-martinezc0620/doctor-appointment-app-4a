<div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    <div>
        <x-input label="Nombre"
                 name="name"
                 value="{{ old('name', $trainer->name ?? '') }}"
                 required />
    </div>

    <div>
        <x-input label="Email"
                 name="email"
                 type="email"
                 value="{{ old('email', $trainer->email ?? '') }}"
                 required />
    </div>

    <div>
        <x-input label="Teléfono"
                 name="phone"
                 value="{{ old('phone', $trainer->phone ?? '') }}" />
    </div>

    <div class="md:col-span-2">
        <x-input label="Biografía"
                 name="bio"
                 type="textarea"
                 value="{{ old('bio', $trainer->bio ?? '') }}" />
    </div>

</div>
