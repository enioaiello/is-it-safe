<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Report Log') }}
        </h2>
    </x-slot>

    {{-- Barre de recherche AJAX --}}
    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <input type="text" id="searchUser" placeholder="Rechercher un pseudo..."
               class="w-full sm:w-1/2 px-4 py-2 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    {{-- Liste des utilisateurs --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
            <h3 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-100 mb-6">
                Tous les utilisateurs
            </h3>

            <div id="userList" class="space-y-4">
                @include('components.user-list', ['users' => $users])
            </div>
        </div>
    </div>

    {{-- Historique des signalements --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <h3 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-100 mb-6">
                    Historique des signalements
                </h3>

                <div class="space-y-4">
                    @forelse ($reports as $report)
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow hover:shadow-md transition">
                            <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-4">
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $report->website_name }}
                                    </h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-300">
                                        Signalé le {{ $report->created_at->format('d M Y') }}
                                    </p>

                                    @if ($report->description)
                                        <p class="mt-2 text-gray-800 dark:text-gray-100">
                                            {{ $report->description }}
                                        </p>
                                    @endif
                                </div>

                                <div class="flex gap-3">
                                    <a href="/report/accept/{{ $report->id }}" title="Accepter">
                                        <div class="w-6 h-6 bg-green-500 rounded hover:scale-110 transition-transform"></div>
                                    </a>
                                    <a href="/report/refuse/{{ $report->id }}" title="Refuser">
                                        <div class="w-6 h-6 bg-red-600 rounded hover:scale-110 transition-transform"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500 dark:text-gray-300">Aucun signalement trouvé.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/admin.js')}}"></script>
</x-app-layout>
