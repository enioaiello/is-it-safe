<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100">Choose a profile picture !</h1>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Make sure other people see your style.</p>
                <div class=" flex flex-row" style="flex-wrap:wrap; width:100%">
                    @foreach($pps as $pp)
    <a style="margin:0 20px" href="/switch_pictures/{{$pp->id}}">
        <div style="
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            {{ Auth::user()->id_picture === $pp->id ? 'border: 2px solid blue;' : '' }}
            display: inline-block;
        ">
            <img
                src="{{ asset('image/' . $pp->picture_url) }}"
                alt="photo de profil n°{{ $pp->id }}"
                style="width: 100%; height: 100%; object-fit: cover;"
            >
        </div>
    </a>
@endforeach


                </div>
            </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
