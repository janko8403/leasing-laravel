@component('mail::message')

<h2 style="text-align:center">Aktywuj swoje konto</h2>

<p style="text-align:center">Zaloguj się na podane hasło i zmień je.</p>

<h4 style="text-align:center">Hasło: <strong>{!! $pass !!}</strong></h4>

@component('mail::button', ['url' => $url])
Potwierdź e-mail
@endcomponent

@endcomponent
