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

                    Добро пожаловать в админ панель
                </div>
            </div>
        </div>
    </div>
</div>
@endsection