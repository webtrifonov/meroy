@extends('meroy.layouts.base_template')
@section('title', 'Главная')

@section('header')
    @include('meroy.includes.header')
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-md-6">
        <div class="authorization_wrapper">
            <h2 class="header_text">Вход</h2>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            @endif
            <form class="authorization_form" action="{{ route('customer.login') }}" method="POST">
                @csrf
                <div class="form_item row">
                    <div class="form_item-label_wrapper col-12">
                        <label class="form_item-label" for="login">
                            <span class="required_asterisk">*</span>
                            Логин
                        </label>
                    </div>
                    <div class="form_item-input_wrapper col-12">
                        <input class="form_item-input" name="login" type="text" value="{{ old('login') }}"/>
                    </div>
                </div>
                <div class="form_item row">
                    <div class="form_item-label_wrapper col-12">
                        <label class="form_item-label" for="password">
                            <span class="required_asterisk">*</span>
                            Пароль
                        </label>
                    </div>
                    <div class="form_item-input_wrapper col-12">
                        <input class="form_item-input" name="password" type="password" value="{{ old('password') }}"/>
                    </div>
                </div>
                <div class="form_item row">
                    <div class="form_item-label_wrapper col-6">
                        <input class="form_item-checkbox" name="remember" type="checkbox"/>
                        <label class="form_item-label" for="remember">Запомнить меня</label>
                    </div>
                    <div class="form_item-label_wrapper col-6">
                        <a href="#">Забыли пароль?</a>
                    </div>
                </div>
                <input type="submit" class="button_submit button_big button_lightblue" value="Войти">
            </form>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="registration_wrapper">
            <h2 class="header_text">Регистрация</h2>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            @endif
            <form class="registration_form" action="{{ route('customer.register') }}" method="POST">
                @csrf
                <div class="form_item row">
                    <div class="form_item-label_wrapper col-12">
                        <label class="form_item-label" for="surname">
                            <span class="required_asterisk">*</span>
                            Фамилия
                        </label>
                    </div>
                    <div class="form_item-input_wrapper col-12">
                        <input class="form_item-input" name="surname" type="text"/>
                    </div>
                </div>
            <div class="form_item row">
                <div class="form_item-label_wrapper col-12">
                    <label class="form_item-label" for="name">
                        <span class="required_asterisk">*</span>
                        Имя
                    </label>
                </div>
                <div class="form_item-input_wrapper col-12">
                    <input class="form_item-input" name="name" type="text"/>
                </div>
            </div>
            <div class="form_item row">
                <div class="form_item-label_wrapper col-12">
                    <label class="form_item-label" for="patronymic">
                        <span class="required_asterisk">*</span>
                        Отчество
                    </label>
                </div>
                <div class="form_item-input_wrapper col-12">
                    <input class="form_item-input" name="patronymic" type="text"/>
                </div>
            </div>
            <div class="form_item row">
                <div class="form_item-label_wrapper col-12">
                    <label class="form_item-label" for="email">
                        <span class="required_asterisk">*</span>
                        E-mail
                    </label>
                </div>
                <div class="form_item-input_wrapper col-12">
                    <input class="form_item-input" name="email" type="text"/>
                </div>
            </div>
            <div class="form_item row">
                <div class="form_item-label_wrapper col-12">
                    <label class="form_item-label" for="login">
                        <span class="required_asterisk">*</span>
                        Логин
                    </label>
                </div>
                <div class="form_item-input_wrapper col-12">
                    <input class="form_item-input" name="login" type="text"/>
                </div>
            </div>
            <div class="form_item row">
                <div class="form_item-label_wrapper col-12">
                    <label class="form_item-label" for="password">
                        <span class="required_asterisk">*</span>
                        Пароль
                    </label>
                </div>
                <div class="form_item-input_wrapper col-12">
                    <input class="form_item-input" name="password" type="password"/>
                </div>
            </div>
            <div class="form_item row">
                <div class="form_item-label_wrapper col-12">
                    <label class="form_item-label" for="password_confirmation">
                        <span class="required_asterisk">*</span>
                        Подтверждение пароля
                    </label>
                </div>
                <div class="form_item-input_wrapper col-12">
                    <input class="form_item-input" name="password_confirmation" type="password"/>
                </div>
            </div>
                <input type="submit" class="button_submit button_big button_fiolet" value="Зарегистрировать">
            </form>
        </div>
    </div>
</div>
@endsection
@section('footer')
    @include('meroy.includes.footer')
@endsection