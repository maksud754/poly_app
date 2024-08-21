@component('mail::message')
Hello {{$user->name}},

<p>Please click on the below link to reset password. </p>

@component('mail::button', ['url' => url('reset/' .$user->remember_token)])
Reset Your Password
@endcomponent

<p>If there is any recurring issues please contact. </p>

Thanks, <br>
{{ config('app.name')}}
@endcomponent