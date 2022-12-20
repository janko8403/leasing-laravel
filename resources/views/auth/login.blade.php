@extends('auth.header')

@section('content')

<div class="container form-login">
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <div class="spacer s4"></div>
            <div class="spacer s2"></div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <div class="col-md-12">

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="e-mail">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="hasło">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        
                        <div class="spacer s2"></div>
                        <button id="submit" type="submit" class="ibtn">zaloguj się</button> 
                        <div class="spacer s2"></div>
                        <a class="text-center btn-reg-a" href="/start">Nie zgłosiłeś udziału w Jubileuszu? <br> Zarejestruj się</a>

                    </div>
                </div>
                
            </form>

        </div>
    </div>
</div>

@endsection
