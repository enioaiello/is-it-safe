<div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow hover:shadow-md transition mb-4">
<<<<<<< HEAD
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
=======
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">
>>>>>>> dd73cbb2d3a1699a478d6aab2331b82944456eba
        <h4 class="text-lg font-medium text-gray-700 dark:text-gray-200">
            {{ $user->pseudo }}
        </h4>

        <h4 class="text-lg font-medium text-gray-700 dark:text-gray-200 text-center sm:text-right">
            user fame : {{ $user->fame }}
        </h4>

        <div class="flex gap-2 justify-center sm:justify-end">
            <a href="{{ route('edit', $user->id) }}"
               class="px-3 py-1 text-sm font-semibold text-white bg-blue-500 rounded hover:bg-blue-600 transition">
                Modifier
            </a>
            <form action="{{ route('destroy', $user->id) }}" method="POST"
                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce compte ?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="px-3 py-1 text-sm font-semibold text-white bg-red-500 rounded hover:bg-red-600 transition">
                    Supprimer
                </button>
            </form>
        </div>
    </div>
</div>
