@extends('layout.app')

@section('title')
	Konto
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Uzupełnij profil</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('user/update-account/') }}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Imię i Nazwisko</label>
                                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Telefon</label>
                                    <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Adres</label>
                                    <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt20 pull-left">Zapisz</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection