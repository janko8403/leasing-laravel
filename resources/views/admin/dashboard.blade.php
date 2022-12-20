@extends('admin.layout.app')

@section('title')
    Dashboard
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">people</i>
                    </div>
                    <p class="card-category">Użytkownicy aktywni</p>
                    <h3 class="card-title">{{ count($active) - 1 }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-danger">link</i>
                        <a href="{{ url('admin/users') }}">zobacz więcej</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">person_remove</i>
                    </div>
                    <p class="card-category">Użytkownicy nieaktywni</p>
                    <h3 class="card-title">{{ count($unActive) }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-danger">link</i>
                        <a href="{{ url('admin/unactiveusers') }}">zobacz więcej</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection