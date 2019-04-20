@extends('meroy.layouts.base_template')
@section('title', 'Главная')

@section('header')
    @include('meroy.includes.header')
@endsection
@section('content')
    <div class="section group">
        <div class="contact-form">
            <h2>Регистрация</h2>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            @endif
            {!! Form::open(['route' => 'sendMessage', 'method' => 'post', 'files' => true]) !!}
            {{ Form::token() }}
            <div>
                <span>{{ Form::label('surname', 'Фамилия') }}</span>
                <span>{{ Form::text('surname', null, ['class' => 'textbox']) }}</span>
            </div>
            <div>
                <span>{{ Form::label('name', 'Имя') }}</span>
                <span>{{ Form::text('name', null, ['class' => 'textbox']) }}</span>
            </div>
            <div>
                <span>{{ Form::label('patronymic', 'Отчество') }}</span>
                <span>{{ Form::text('patronymic', null, ['class' => 'textbox']) }}</span>
            </div>
            <div>
                <span>{{ Form::label('email', 'E-mail') }}</span>
                <span>{{ Form::email('email', null, ['class' => 'textbox']) }}</span>
            </div>
            <div>
                <span>{{ Form::label('email', 'Логин') }}</span>
                <span>{{ Form::text('email', null, ['class' => 'textbox']) }}</span>
            </div>
            <div>
                <span>{{ Form::label('password', 'Пароль') }}</span>
                <span>{{ Form::text('password', null, ['class' => 'textbox']) }}</span>
            </div>
            <div>
                <span>{{ Form::label('confirm_password', 'Подтвердите пароль') }}</span>
                <span>{{ Form::text('confirm_password', null, ['class' => 'textbox']) }}</span>
            </div>
            {{ Form::submit('Отправить', ['class' => 'button_submit']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('footer')
    @include('meroy.includes.footer')
@endsection