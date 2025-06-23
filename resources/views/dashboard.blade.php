<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @php $badges = '' @endphp
    @if(Auth::user()->fame <= 30)
    @php $badges .= '<div class="flex justify-center" style="margin: 0 5px; flex-direction:column-reverse; align-items:center; position:relative;"> <i class="ri-file-damage-line hover-failure" style="color:#EA2E2E; font-size:25px;"></i> <p id="failure" class="text-sm speech failure hidden"
    style="border-radius:10px; position: absolute; bottom: 100%;left: 50%; transform: translateX(-50%);white-space: nowrap; background-color:oklch(21.6% 0.006 56.043); padding: 5px">Cet utilisateur est malicieux</p> </div>' @endphp
    @endif

    @if(Auth::user()->fame >= 130)
    @php $badges .= '<div class="flex justify-center" style="margin: 0 5px; flex-direction:column-reverse; align-items:center; position:relative;"> <i class="ri-star-fill hover-trusted" style="color:#F0BB40; font-size:25px;"></i> <p id="trusted" class="text-sm speech trusted hidden"
    style="border-radius:10px; position: absolute; bottom: 100%;left: 50%; transform: translateX(-50%);white-space: nowrap; background-color:oklch(21.6% 0.006 56.043); padding: 5px">Cet utilisateur est de confiance</p></div>' @endphp
    @endif

    @if(Auth::user()->fame >= 190)
    @php $badges .= '<div class="flex justify-center" style="margin: 0 5px; flex-direction:column-reverse; align-items:center; position:relative;"> <i class="ri-bookmark-fill hover-encyclopedy" style="color:#96DAB7; font-size:25px;"></i> <p id="encyclopedy" class="text-sm speech encyclopedy hidden"
    style="border-radius:10px; position: absolute; bottom: 100%;left: 50%; transform: translateX(-50%);white-space: nowrap; background-color:oklch(21.6% 0.006 56.043); padding: 5px">Cet utilisateur est une véritable encyclopédie</p></div>' @endphp
    @endif

    @if(Auth::user()->id_role < 3)
        @php $badges .= '<div class="flex justify-center" style="margin: 0 5px; flex-direction:column-reverse; align-items:center; position:relative;"><i class="ri-shield-fill hover-mod" style="color:#EA2E2E; font-size:25px;"></i> <p id="failure" class="text-sm speech mod hidden"
    style="border-radius:10px; position: absolute; bottom: 100%;left: 50%; transform: translateX(-50%);white-space: nowrap; background-color:oklch(21.6% 0.006 56.043); padding: 5px">Membre du staff</p> </div>' @endphp
    @endif

    @if(Auth::user()->id_role == 1)
        @php $badges .= '<div class="flex justify-center" style="margin: 0 5px; flex-direction:column-reverse; align-items:center; position:relative;"><i class="ri-vip-crown-fill hover-owner" style="background: linear-gradient(45deg,red 0%,red 15%,orange 25%,yellow 40%,green 55%,blue 70%,indigo 85%,violet 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent; font-size:25px;"></i> <p id="failure" class="text-sm speech owner hidden"
    style="border-radius:10px; position: absolute; bottom: 100%;left: 50%; transform: translateX(-50%);white-space: nowrap; background-color:oklch(21.6% 0.006 56.043); padding: 5px">Créateur</p> </div>' @endphp
    @endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div style="color: white" class="p-6">
                    <div x-show="page === 'dashboard'">
                        <h1 class="text-xl font-bold mb-2">Dashboard</h1>
                        <img src="{{ asset('image/'. $pp->picture_url) }}" alt="photo de profile">
                        <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100" style="display:flex; flex-direction:row;">Bienvenue {{ \Illuminate\Support\Facades\Auth::user()->pseudo }}{!! $badges !!}</h1>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">You have {{ Auth::user()->fame }} fame !</p>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
