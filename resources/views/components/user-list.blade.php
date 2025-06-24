@foreach ($users as $user)
<<<<<<< HEAD
    <div class="bg-gray-200 dark:bg-gray-700 p-4 rounded shadow flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
=======
    <div class="bg-gray-200 dark:bg-gray-700 p-4 rounded shadow flex flex-col md:flex-row md:items-start md:justify-between gap-4 mb-4">
>>>>>>> dd73cbb2d3a1699a478d6aab2331b82944456eba
        <div>
            <p class="text-lg font-semibold text-gray-800 dark:text-white">
                {{ $user->name }} ({{ $user->pseudo }})
            </p>
            <p class="text-sm text-gray-600 dark:text-gray-300">{{ $user->email }}</p>
<<<<<<< HEAD
=======

            <p class="text-sm text-gray-600 dark:text-gray-300">user fame : {{ $user->fame }}</p>
>>>>>>> dd73cbb2d3a1699a478d6aab2331b82944456eba
        </div>

        <div class="flex gap-3">
            {{-- Bouton modifier --}}
            <form action="{{ route('edit') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                    Modifier
                </button>
            </form>

            {{-- Bouton supprimer --}}
            <form action="{{ route('destroy', ['id' => $user->id]) }}" method="POST" onsubmit="return confirm('Supprimer ce compte ?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                    Supprimer
                </button>
            </form>
        </div>
    </div>
@endforeach
