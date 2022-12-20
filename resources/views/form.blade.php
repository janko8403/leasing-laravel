@extends('auth.header')

@section('content')

<div class="container form-register">
    <div class="row">
        <div class="col-md-4">
            <div class="spacer s4"></div>
            <h2>Zapraszamy na spotkanie z głównym ekonomistą mBanku dr. Marcinem Mazurkiem</h2>
            <div class="spacer s1"></div>
            <p>Prosimy o potwierdzenie <br> Pani/Pana udziału w wydarzeniu.</p>
        </div>
        <div class="col-md-4">

            <div class="spacer s4"></div>

            <form action="{{ url('/register-form') }}" method="POST">
                @csrf

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="imię">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" placeholder="nazwisko">

                        @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="adres e-mail">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="numer telefonu">

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}" placeholder="nazwa firmy">

                        @error('company')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <textarea type="text" class="form-control" name="ask" value="{{ old('ask') }}" placeholder="Już dziś może Pani/Pan zadac pytanie naszemu prelegentowi:"></textarea>  
                    </div>
                </div>

                <!-- <input type="hidden" name="password" value="pass"> -->

                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="form-check">
                            <input type="checkbox" class="checkbox-agree" id="checkAgree" name="agree" {{ old('agree') == 'on' ? 'checked' : '' }}>
                            <label class="form-check-label" for="checkAgree">Administratorem Twoich danych osobowych podanych w formularzu jest Concept House, ul. Konstruktorska 11, 02-673 Warszawa.</label>

                            @error('agree')
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <button id="submit" type="submit" class="ibtn">potwierdzam udział</button> 
                    </div>
                </div>
                
            </form>

            <div class="spacer s4"></div>

        </div>
    </div>
</div>



@endsection