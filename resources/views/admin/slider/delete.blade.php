@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('layouts.adminmenu')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"><h3>Удалить слайд</h3></div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="error">
                                    <p class="error_message">{{ $error }}</p>
                                </div>
                            @endforeach
                        @endif
                            <form action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="search">Найдите</label>
                                    <input type="search" class="form-control">
                                </div>
                            </form>
                        {!! Form::open(['route' => 'slide.store', 'method' => 'post', 'files' => true]) !!}
                        {{ Form::token() }}
                        <div class="form-group">
                            {{ Form::label('title', 'Наименование') }}
                            {{ Form::text('title', null, ['class' => 'form-control']) }}
                        </div>


                        <div class="form-group">
                            {{ Form::label('image', 'Изображение') }}
                            {{ Form::file('image', ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('path', 'Путь') }}
                            {{ Form::text('path', null, ['class' => 'form-control']) }}
                        </div>
                        {{ Form::submit('Добавить', ['class' => 'btn btn-primary']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection