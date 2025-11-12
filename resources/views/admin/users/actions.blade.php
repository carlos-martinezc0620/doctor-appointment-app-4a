<div class="flex space-x-2">
    <a href="{{ route('admin.users.edit', $user->id) }}"
       class="text-blue-600 hover:text-blue-800">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>

    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
          onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-600 hover:text-red-800">
            <i class="fa-solid fa-trash"></i>
        </button>
    </form>
</div>
