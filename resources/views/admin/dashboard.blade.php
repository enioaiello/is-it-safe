<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Report Log') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-100 mb-6">
                        Historique des signalements
                    </h3>

                    <div class="space-y-6">
                        @forelse ($reports as $report)
                            <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-xl shadow-md transition hover:shadow-lg border dark:border-gray-600">
                                <div class="flex flex-row md:flex-row md:justify-between gap-4">
                                    <div class="flex flex-col">
                                        <div>
                                            <a href="{{ $report->url }}" target="_blank" class="text-lg font-semibold text-green-700 dark:text-green-400 hover:underline">
                                                {{ parse_url($report->url, PHP_URL_HOST) ?? $report->url }}
                                            </a>
                                            <h1 class="text-2xl text-gray-600 dark:text-gray-300">
                                                {{ $report->website_name }}
                                            </h1>
                                            <p class="text-sm text-gray-600 dark:text-gray-300">
                                                Signalé le {{ $report->created_at->format('d M Y') }}
                                            </p>
                                        </div>
                                        @if ($report->description)
                                            <p class="mt-4 text-gray-800 dark:text-gray-200">
                                                {{ $report->description }}
                                            </p>
                                        @endif
                                    </div>
                                    <div style="display: flex; flex-direction: row; justify-content: space-between; align-items: start; width: 50px">
                                        <a href="/report/accept">
                                            <div class=" validate bg-success" style="border-radius: 5px; width: 20px; height: 20px; background-color: #50C878"></div>
                                        </a>
                                        <a href="/report/refuse">
                                            <div class="refuse bg-danger" style="border-radius: 5px; width: 20px; height: 20px; background-color: #DC143C"></div>
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
    </div>
</x-app-layout>
