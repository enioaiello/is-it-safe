@php $badges = '' @endphp
@props(['user', 'highest' => false])
@props(['size'])
@php $user = $user ?? auth()->user(); // fallback to auth if no user passed
$badges = []; @endphp

@if($user->fame <= 30)
@php $badges[] = '<div class="flex justify-center" style="margin: 0 5px; flex-direction:column-reverse; align-items:center; position:relative;"> <i class="ri-file-damage-line hover-failure" style="color:#EA2E2E; font-size:'.  $size  .';"></i> <p id="failure" class="text-sm speech failure hidden"
    style="border-radius:10px; position: absolute; bottom: 100%;left: 50%; transform: translateX(-50%);white-space: nowrap; background-color:oklch(21.6% 0.006 56.043); padding: 5px; color: white;">Cet utilisateur est malicieux</p> </div>'
    @endphp
@endif

@if($user->fame >= 130)
@php $badges[] = '<div class="flex justify-center" style="margin: 0 5px; flex-direction:column-reverse; align-items:center; position:relative;"> <i class="ri-star-fill hover-trusted" style="color:#F0BB40; font-size:'.  $size  .';"></i> <p id="trusted" class="text-sm speech trusted hidden"
    style="border-radius:10px; position: absolute; bottom: 100%;left: 50%; transform: translateX(-50%);white-space: nowrap; background-color:oklch(21.6% 0.006 56.043); padding: 5px; color: white;">Cet utilisateur est de confiance</p></div>'
    @endphp
@endif

@if($user->fame >= 190)
@php $badges[] = '<div class="flex justify-center" style="margin: 0 5px; flex-direction:column-reverse; align-items:center; position:relative;"> <i class="ri-bookmark-fill hover-encyclopedy" style="color:#96DAB7; font-size:'.  $size  .';"></i> <p id="encyclopedy" class="text-sm speech encyclopedy hidden"
    style="border-radius:10px; position: absolute; bottom: 100%;left: 50%; transform: translateX(-50%);white-space: nowrap; background-color:oklch(21.6% 0.006 56.043); padding: 5px; color: white;">Cet utilisateur est une véritable encyclopédie</p></div>'
    @endphp
@endif
@if($user->id_role < 3)
@php $badges[] = '<div class="flex justify-center" style="margin: 0 5px; flex-direction:column-reverse; align-items:center; position:relative;"><i class="ri-shield-fill hover-mod" style="color:#EA2E2E; font-size:'.  $size  .';"></i> <p id="mod" class="text-sm speech mod hidden"
    style="border-radius:10px; position: absolute; bottom: 100%;left: 50%; transform: translateX(-50%);white-space: nowrap; background-color:oklch(21.6% 0.006 56.043); padding: 5px; color: white;">Membre du staff</p> </div>'
    @endphp
@endif

@if($user->id_role == 1)
    @php $badges[] = '<div class="flex justify-center" style="margin: 0 5px; flex-direction:column-reverse; align-items:center; position:relative;"><i class="ri-vip-crown-fill hover-owner" style="background: linear-gradient(45deg,red 0%,red 15%,orange 25%,yellow 40%,green 55%,blue 70%,indigo 85%,violet 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent; font-size:'.  $size  .';"></i> <p id="owner" class="text-sm speech owner hidden"
    style="border-radius:10px; position: absolute; bottom: 100%;left: 50%; transform: translateX(-50%);white-space: nowrap; background-color:oklch(21.6% 0.006 56.043); padding: 5px; color: white;">Créateur</p> </div>'
    @endphp
@endif

@if($highest && count($badges) > 0)
    {!! end($badges) !!}
@else
    @foreach($badges as $badge)
        {!! $badge !!}
    @endforeach
@endif

