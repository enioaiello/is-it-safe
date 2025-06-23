@php $badges = '' @endphp
@php $user = auth()->user(); @endphp
@if(Auth::user()->fame <= 30)
<div class="flex justify-center" style="margin: 0 5px; flex-direction:column-reverse; align-items:center; position:relative;"> <i class="ri-file-damage-line hover-failure" style="color:#EA2E2E; font-size:25px;"></i> <p id="failure" class="text-sm speech failure hidden"
    style="border-radius:10px; position: absolute; bottom: 100%;left: 50%; transform: translateX(-50%);white-space: nowrap; background-color:oklch(21.6% 0.006 56.043); padding: 5px">Cet utilisateur est malicieux</p> </div>
@endif

@if(Auth::user()->fame >= 130)
<div class="flex justify-center" style="margin: 0 5px; flex-direction:column-reverse; align-items:center; position:relative;"> <i class="ri-star-fill hover-trusted" style="color:#F0BB40; font-size:25px;"></i> <p id="trusted" class="text-sm speech trusted hidden"
    style="border-radius:10px; position: absolute; bottom: 100%;left: 50%; transform: translateX(-50%);white-space: nowrap; background-color:oklch(21.6% 0.006 56.043); padding: 5px">Cet utilisateur est de confiance</p></div>
@endif

@if(Auth::user()->fame >= 190)
<div class="flex justify-center" style="margin: 0 5px; flex-direction:column-reverse; align-items:center; position:relative;"> <i class="ri-bookmark-fill hover-encyclopedy" style="color:#96DAB7; font-size:25px;"></i> <p id="encyclopedy" class="text-sm speech encyclopedy hidden"
    style="border-radius:10px; position: absolute; bottom: 100%;left: 50%; transform: translateX(-50%);white-space: nowrap; background-color:oklch(21.6% 0.006 56.043); padding: 5px">Cet utilisateur est une véritable encyclopédie</p></div>
@endif
@if(Auth::user()->id_role < 3)
<div class="flex justify-center" style="margin: 0 5px; flex-direction:column-reverse; align-items:center; position:relative;"><i class="ri-shield-fill hover-mod" style="color:#EA2E2E; font-size:25px;"></i> <p id="mod" class="text-sm speech mod hidden"
    style="border-radius:10px; position: absolute; bottom: 100%;left: 50%; transform: translateX(-50%);white-space: nowrap; background-color:oklch(21.6% 0.006 56.043); padding: 5px">Membre du staff</p> </div>
@endif

@if(Auth::user()->id_role == 1)
    <div class="flex justify-center" style="margin: 0 5px; flex-direction:column-reverse; align-items:center; position:relative;"><i class="ri-vip-crown-fill hover-owner" style="background: linear-gradient(45deg,red 0%,red 15%,orange 25%,yellow 40%,green 55%,blue 70%,indigo 85%,violet 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent; font-size:25px;"></i> <p id="owner" class="text-sm speech owner hidden"
    style="border-radius:10px; position: absolute; bottom: 100%;left: 50%; transform: translateX(-50%);white-space: nowrap; background-color:oklch(21.6% 0.006 56.043); padding: 5px">Créateur</p> </div>
@endif
