@component('mail::message')
# Welcome

Hi {{$user->name}}
<br>
Welcome to laracamp. Your account has been created successfully. Now you can choose best match camp.

@component('mail::button', ['url' => route('login')])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
