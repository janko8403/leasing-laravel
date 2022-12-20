@extends('layouts.app')

@section('content')
<section class="login-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="spacer s4"></div>
                <div class="card">
                    <div class="card-header">{{ __('Weryfikacja konta') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Link weryfikacyjny został wysłany na Twój adres e-mail.') }}
                            </div>
                        @endif

                        {{ __('Sprawdź adres e-mail, aby uzyskać link weryfikacyjny.') }}
                        {{ __('Jeśli nie otrzymałeś wiadomości e-mail') }}, <a href="{{ route('verification.resend') }}">{{ __('kliknij tutaj, aby wysłać kolejną') }}</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
