@extends('admin.layout.app')

@section('title')
    Użytkownicy
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-header card-header-primary">
                    <h4 class="card-title mt-0">Aktywni użytkownicy</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">


                        @if (count($users) === 1)

                            <div class="alert alert-danger" role="alert">
                                Brak potwierdzonych użytkowników
                            </div>

                        @else
                            <table class="table table-hover">
                                <thead class="">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Imię
                                    </th>
                                    <th>
                                        Nazwisko
                                    </th>
                                    <th>
                                        E-mail
                                    </th>
                                     <th class="text-center">
                                        Akcja
                                    </th>
                                </thead>
                                <tbody>

                                    @foreach ($users as $user)
                                        @foreach($user->roles as $role)
                                            @if($role->id == 2)
                                                <tr>
                                                    <td>
                                                        {{ $user->id }}
                                                    </td>
                                                    <td>
                                                        @if(empty($user->name))
                                                            -
                                                        @else
                                                            {{ $user->name }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(empty($user->surname))
                                                            -
                                                        @else
                                                            {{ $user->surname }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $user->email }}
                                                    </td>
                                                    <td class="td-actions text-center">
                                                        <button
                                                            type="button" rel="tooltip"
                                                            title="Usuń" class="btn btn-danger btn-link btn-sm"
                                                            onclick="event.preventDefault();
                                                                document.getElementById('delete-{{ $user->id }}').submit();">
                                                            <i class="material-icons">close</i>
                                                        </button>

                                                        <form id="delete-{{ $user->id }}"
                                                            action="{{ url('admin/delete-user/' . $user->id) }}"
                                                            method="POST"
                                                            style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach

                                </tbody>
                            </table>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
