@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('layouts.adminmenu')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Моя админка</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Сообщения</h3>
                    @if(!empty($contacts))
                    <table class="table">
                        <thead>
                            <tr>
                                <td><b>#</b></td>
                                <td><b>От кого</b></td>
                                <td><b>E-mail</b></td>
                                <td><b>Тема</b></td>
                                <td><b>Сообщение</b></td>
                                <td><b>Дата написания</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $k => $contact)
                            <tr>
                                <td>{{ $k+1 }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->theme }}</td>
                                <td>{{ $contact->message }}</td>
                                <td>{{ $contact->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection