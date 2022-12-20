@extends('auth.app')

@section('content')

<div class="form-body">
    <div class="website-logo">
        <a href="index.html">
            <div class="logo">
                {{-- <img class="logo-size" src="images/logo-light.svg" alt=""> --}}
            </div>
        </a>
    </div>
    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
            <div class="info-holder">

            </div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Zresetuj hasło</h3>
                    <div class="space s3"></div>
                    {{-- <p>Access to the most powerfull tool in the entire design and web industry.</p> --}}

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                       <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-mail">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-button">
                            <button id="submit" type="submit" class="ibtn">Zresetuj hasło</button>         
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
