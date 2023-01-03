@php
$avatar_url = $user->avatar
        ? asset('images/avatar/' . $user->avatar)
        : "https://ui-avatars.com/api/?size=128&name=" . $user->username;
    // function awal($var, $default) {
    //     $capt = strtoupper($var);
    //     try {
    //         global ${$capt};
    //         ${$capt} = ${$var};
    //     }
    //     catch(Exception $e) {
    //         ${$capt} = $default;
    //     }
    // }
    // exc('w', 128);
    // exc('h', 128);
    // exc('link', NULL);



@endphp
<a class="{{$class ?? 'brightness-circle'}}" style="text-decoration: none;" href="{{$link ?? 'javascript:void(0);'}}">
<img id="img" style="border: 1px solid #9888;" src="{{$avatar_url}}" class="rounded-circle"
    alt="Foto profil {{$user->username}}" width="{{$w ?? 128}}" height="{{$h ?? 128}}">
</a>
{{-- <img src="{{$avatar_url}}" class="rounded-circle"
    alt="Foto profil {{$user->username}}" width="128" height="128"> --}}
