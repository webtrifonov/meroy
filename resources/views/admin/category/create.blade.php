@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('layouts.adminmenu')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h3>Добавить категорию</h3></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    {!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}
                        {{ Form::token() }}
                        <div class="form-group">
                            {{ Form::label('title', 'Название') }}
                            {{ Form::text('title', null, ['class' => 'form-control']) }}
                        </div>

                        {{--<div class="form-group">--}}
                            {{--{{ Form::label('alias', 'Псевдоним категории') }}--}}
                            {{--{{ Form::text('alias', null, ['class' => 'form-control']) }}--}}
                        {{--</div>--}}
                       {{ Form::submit('Добавить', ['class' => 'btn btn-primary']) }} 
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection