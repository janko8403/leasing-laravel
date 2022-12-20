@component('mail::message')

<h2 style="text-align:center">Potwierdź swoje konto</h2>


@component('mail::button', ['url' => $url])
Zweryfikuj e-mail
@endcomponent

@endcomponent
