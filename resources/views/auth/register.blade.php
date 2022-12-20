@extends('auth.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <h4 class="text-center">Zgłoś swój udział w spotkaniu jubileuszowym mLeasingu.</h4>
            <div class="spacer s3"></div>

            <form method="POST" action="{{ route('register') }}" class="register-form">
                @csrf

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Imię">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus placeholder="Nazwisko">

                        @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Hasło">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Powtórz hasło">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                            <label class="form-check-label" for="exampleCheck1">Administratorem Twoich danych osobowych podanych w formularzu jest Concept House, ul. Konstruktorska 11, 02-673 Warszawa. Twoje dane przetwarzamy w celu zapewnienia dostępu do wydarzenia „30 lat mLeasingu” w dniu 26.10.2021 oraz w celu przesłania upominku jubileuszowego od mLeasing.</label>
                        </div>
                    </div>
                </div>

                <div class="spacer s1"></div>
                <h4 class="text-center">Wybierz miejsce dostawy Twojego jubileuszowego upominku.</h4>
                <div class="spacer s1"></div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="form-check">

                            <input type="checkbox" name="cb1" id="cb1" class="form-check-input chb" />
                            <label class="form-check-label" for="cb1">oddział</label>

                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="form-check">

                            <input type="checkbox" name="cb2" id="cb2" class="form-check-input chb" />
                            <label class="form-check-label" for="cb2">inny adres</label>

                        </div>
                    </div>
                </div>


                <div class="form-button">
                    <button id="submit" type="submit" class="ibtn">Potwierdź udział</button>   
                </div>

            </form>

        </div>
    </div>
</div>

@endsection
