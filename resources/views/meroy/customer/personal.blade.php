
@extends('meroy.layouts.base_template')
@section('title', 'Главная')

@section('header')
    @include('meroy.includes.header')
@endsection
@section('content')
    <div class="row">
        <a href="{{ route('login') }}">Главная</a><br>
        <a href="#"> Заказы</a><br>
        <form action="{{ route('customer.logout') }}" method="POST">
            @csrf
            <input type="submit" value="Выйти"/>
        </form>
    </div>
@endsection
@section('footer')
    @include('meroy.includes.footer')
@endsection