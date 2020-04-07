@component('mail::message')
# Welcome to Hoop Spots 🏀📍

Hi {{$user->name}}, welcome to Hoop Spots. The best place to find basketball sessions near you.

@component('mail::button', ['url' => $url])
    Confirm Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
