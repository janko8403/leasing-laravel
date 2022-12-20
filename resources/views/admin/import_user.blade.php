@extends('admin.layout.app')

@section('title')
    Import użytkowników
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Zaimportuj użytkowników</h4>
                </div>
                <div class="card-body">
                    <div class="spacer s2"></div>
                    <form method="POST" action="{{ url('admin/import') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Dodaj plik *.xls</label>
                                    .<spacer class="spacer s1"></spacer>
                                    <input type="file" class="form-control-file" name="file" required accept=".xlsx, .xls, .csv" style="opacity: 1;z-index: 0;">

                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary pull-left">Dodaj plik</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
