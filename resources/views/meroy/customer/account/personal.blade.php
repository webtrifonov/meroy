@extends('meroy.layouts.account_template')
@section('title', 'Главная')

@section('header')
    @include('meroy.includes.header')
@endsection
@section('side_menu')
    @include('meroy.includes.account_menu')
@endsection
@section('content')
    <h1 class="header_text">Мой профиль</h1>
    <div class="personal_data">
        <ul>
            <li><p>Фамилия:</p> <p>{{ $customer->surname }}</p></li>
            <li><p>Имя:</p> <p>{{ $customer->name }}</p></li>
            <li><p>Отчество:</p> <p>{{ $customer->patronymic }}</p></li>
            <li><p>E-mail</p> <p>{{ $customer->email }}</p></li>
            <li><p>Логин:</p> <p>{{ $customer->login }}</p></li>
        </ul>
    </div>

@endsection
@section('footer')
    @include('meroy.includes.footer')
@endsection