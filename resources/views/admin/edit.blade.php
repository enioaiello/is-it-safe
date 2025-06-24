<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Modifier l'utilisateur : {{ $user->pseudo }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-8 p-6 bg-white dark:bg-gray-900 rounded-2xl shadow-xl">
        @if(session('success'))
            <div class="mb-6 text-green-600 dark:text-green-400 font-semibold text-sm bg-green-100 dark:bg-green-700 p-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.users.update') }}" method="POST" class="space-y-6">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">

            {{-- Pseudo --}}
            <div>
                <label for="pseudo" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo" value="{{ $user->pseudo }}" required
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" required
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            {{-- Fame --}}
            <div>
                <label for="fame" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Fame</label>
                <input type="number" name="fame" id="fame" value="{{ $user->fame }}" required
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            {{-- Bouton --}}
            <div class="text-right">
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition duration-200">
                    Enregistrer les modifications
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
