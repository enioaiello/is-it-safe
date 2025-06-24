<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Report Log') }}
        </h2>
    </x-slot>

    <div class="py-8 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div id="accordion-collapse" data-accordion="collapse" class="space-y-4">

            {{-- Accordéon : Tous les utilisateurs --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden transition-all duration-200">
                <h2 id="accordion-users-heading">
                    <button type="button"
                            class="flex items-center justify-between w-full p-6 font-medium text-left text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200 gap-3"
                            data-accordion-target="#accordion-users-body" aria-expanded="true"
                            aria-controls="accordion-users-body">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 rounded-lg bg-blue-50 dark:bg-blue-900/30">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 dark:text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v1h-3zM4.75 12.094A5.973 5.973 0 004 15v1H1v-1a3 3 0 013.75-2.906z" />
                                </svg>
                            </div>
                            <span class="text-lg font-medium">Tous les utilisateurs</span>
                        </div>
                        <svg data-accordion-icon class="w-4 h-4 transition-transform duration-200 shrink-0" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-users-body" class="hidden" aria-labelledby="accordion-users-heading">
                    <div class="p-6 pt-0 border-t border-gray-100 dark:border-gray-700 space-y-6">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="searchUser" placeholder="Rechercher un pseudo..."
                                   class="block w-full pl-10 pr-3 py-2.5 rounded-lg border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150">
                        </div>

                        <div id="userList" class="space-y-3">
                            @include('components.user-list', ['users' => $users])
                        </div>
                    </div>
                </div>
            </div>

            {{-- Accordéon : Historique des signalements --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden transition-all duration-200">
                <h2 id="accordion-reports-heading">
                    <button type="button"
                            class="flex items-center justify-between w-full p-6 font-medium text-left text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200 gap-3"
                            data-accordion-target="#accordion-reports-body" aria-expanded="false"
                            aria-controls="accordion-reports-body">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 rounded-lg bg-purple-50 dark:bg-purple-900/30">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600 dark:text-purple-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span class="text-lg font-medium">Historique des signalements</span>
                        </div>
                        <svg data-accordion-icon class="w-4 h-4 transition-transform duration-200 shrink-0" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-reports-body" class="hidden" aria-labelledby="accordion-reports-heading">
                    <div class="p-6 pt-0 border-t border-gray-100 dark:border-gray-700">
                        <div class="space-y-4">
                            @forelse ($reports as $report)
                                <div class="group bg-gray dark:bg-gray-700/50 p-5 rounded-lg border border-gray-100 dark:border-gray-700 shadow-xs hover:shadow-sm transition-all duration-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-4">
                                        <div class="flex-1">
                                            <div class="flex items-center space-x-3">
                                                <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                                    {{ $report->website_name }}
                                                </h4>
                                                <span class="text-xs px-2 py-1 rounded-full bg-gray-100 dark:bg-gray-600 text-gray-600 dark:text-gray-300">
                                                    {{ $report->created_at->format('d M Y') }}
                                                </span>
                                            </div>
                                            @if ($report->description)
                                                <p class="mt-2 text-gray-600 dark:text-gray-300">
                                                    {{ $report->description }}
                                                </p>
                                            @endif
                                        </div>
                                        <div class="flex gap-2">
                                            <a href="/report/accept/{{ $report->id }}"
                                               class="p-2 rounded-lg bg-green-50 dark:bg-green-900/30 text-green-600 dark:text-green-400 hover:bg-green-100 dark:hover:bg-green-900/50 transition-colors"
                                               title="Accepter">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                            <a href="/report/refuse/{{ $report->id }}"
                                               class="p-2 rounded-lg bg-red-50 dark:bg-red-900/30 text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-900/50 transition-colors"
                                               title="Refuser">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-8">

                                    <p class="mt-3 text-gray-500 dark:text-gray-400"> <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>Aucun signalement trouvé.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</x-app-layout>
