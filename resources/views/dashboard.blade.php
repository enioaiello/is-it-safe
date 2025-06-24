<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div style="color: white" class="p-6">
                    <div x-show="page === 'dashboard'">
                        <h1 class="text-xl font-bold mb-2">Dashboard</h1>
                        <img src="{{ asset('image/'. $pp->picture_url) }}" alt="photo de profile">
                        <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100" style="display:flex; flex-direction:row;">Bienvenue {{ \Illuminate\Support\Facades\Auth::user()->pseudo }}@include('profile.partials.user-badges', ['user' => Auth::user(), 'size' => '25px'])</h1>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">You have {{ Auth::user()->fame }} fame !</p>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
