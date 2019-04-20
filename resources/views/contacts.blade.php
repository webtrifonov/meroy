@extends('layouts.contacts_template')
@section('title', 'Главная')

@section('header')
    @include('layouts.header')
@endsection
@section('content')
<div class="section group">
    <div class="contact-form">
        <h2>Контакты</h2>
        @if($errors->any())
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        @endif
        {!! Form::open(['route' => 'sendMessage', 'method' => 'POST', 'files' => true]) !!}
            {{ Form::token() }}
            <div>
                <span>{{ Form::label('title', 'Ваше имя') }}</span>
                <span>{{ Form::text('name', null, ['class' => 'textbox']) }}</span>
            </div>
            <div>
                <span>{{ Form::label('email', 'E-mail') }}</span>
                <span>{{ Form::email('email', null, ['class' => 'textbox']) }}</span>
            </div>
            <div>
                <span>{{ Form::label('theme', 'Тема сообщения') }}</span>
                <span>{{ Form::text('theme', null, ['class' => 'textbox']) }}</span>
            </div>
            <div>
                <span>{{ Form::label('message', 'Cообщение') }}</span>
                <span>{{ Form::textarea('message', null, ['class' => 'textbox']) }}</span>
            </div>
           {{ Form::submit('Отправить', ['class' => 'button_submit']) }} 
        {!! Form::close() !!}
    </div>
</div>        
@endsection
@section('menu')
<div class="company_address">
    <h3>Информация о компании :</h3>
        <p>500 Lorem Ipsum Dolor Sit,</p>
        <p>22-56-2-9 Sit Amet, Lorem,</p>
        <p>USA</p>
    <p>Phone:(00) 222 666 444</p>
    <p>Fax: (000) 000 00 00 0</p>
    <p>Email: <span><a href="mailto:@example.com">info@mycompany.com</a></span></p>
    <p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
</div>
@endsection
@section('footer')
    @include('layouts.footer')
@endsection