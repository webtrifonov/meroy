@extends('meroy.layouts.base_template')
@section('title', 'Контакты')

@section('header')
    @include('meroy.includes.header')
@endsection
@section('content')
    <div class="row">
        <div class="col-8">
            <div class="section group">
                <div class="contact-form">
                    <h1 class="header_text">Контакты</h1>
                    {{--@if($errors->any())--}}
                        {{--@foreach($errors->all() as $error)--}}
                            {{--<div class="error">--}}
                                {{--<p class="error_message">{{ $error }}</p>--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                    {{--@endif--}}
                    @if (session('success'))
                        <div class="success">
                            <p class="success_message">{{ session('success') }}</p>
                        </div>
                    @endif
                    <form action="{{ route('contacts') }}" method="POST">
                        @csrf
                        <div class="form_item row">
                            <div class="form_item-label_wrapper col-12">
                                <label class="form_item-label" for="name">
                                    <span class="required_asterisk">*</span>
                                    Ваше имя
                                </label>

                            </div>
                            <div class="form_item-input_wrapper col-12">
                                <input class="form_item-input" name="name" type="text" value="{{ old('name') }}"/>
                                @if($errors->get('name'))
                                    <div class="error error_inline">
                                        @foreach($errors->get('name') as $error)
                                            <p class="error_message">{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif
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
                                <input class="form_item-input" name="email" type="text" value="{{ old('email') }}"/>
                                @if($errors->get('email'))
                                    <div class="error error_inline">
                                        @foreach($errors->get('email') as $error)
                                            <p class="error_message">{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form_item row">
                            <div class="form_item-label_wrapper col-12">
                                <label class="form_item-label" for="theme">
                                    <span class="required_asterisk">*</span>
                                    Тема сообщения
                                </label>
                            </div>
                            <div class="form_item-input_wrapper col-12">
                                <input class="form_item-input" name="theme" type="text" value="{{ old('theme') }}"/>
                                @if($errors->get('theme'))
                                    <div class="error error_inline">
                                        @foreach($errors->get('theme') as $error)
                                            <p class="error_message">{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form_item row">
                            <div class="form_item-label_wrapper col-12">
                                <label class="form_item-label" for="message">
                                    <span class="required_asterisk">*</span>
                                    Сообщение
                                </label>

                            </div>
                            <div class="form_item-input_wrapper col-12">
                                <textarea class="form_item-input" name="message">{{ old('message') }}</textarea>
                                @if($errors->get('message'))
                                    <div class="error error_inline ">
                                        @foreach($errors->get('message') as $error)
                                            <p class="error_message">{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <input class="button_big button_fiolet" type="submit" value="Отправить">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="company_address">
                <h3 style="margin-top: 15px;">Информация о магазине</h3>
                <p>Вы также можете обратиться по указанным реквизитам</p>
                <p>Телефон:+7(905)123-45-67</p>
                <p>Email: <span><a href="mailto:@example.com">meroylerlen@gmail.com</a></span></p>
            </div>
        </div>
    </div>

@endsection
@section('menu')

@endsection
@section('footer')
    @include('meroy.includes.footer')
@endsection