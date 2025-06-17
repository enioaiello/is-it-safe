<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div style="color: white; display: flex; flex-direction: column; align-items: center;" class="p-6">
                    @foreach($reports as $report)
                        <div class="p-2 mt-2" style="background-color: #50C878; border-radius: 10px; width: 60%">
                            <h1 class="mb-2" style="font-size: 25px"> {{ $report['website_name'] }}</h1>
                            <p>{{ $report['description'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
