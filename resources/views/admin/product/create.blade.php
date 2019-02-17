@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('layouts.adminmenu')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h3>Добавить товар</h3></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['route' => 'product.store', 'method' => 'post', 'files' => true]) !!}
                        <div class="form-group">
                            {{ Form::label('title', 'Наименование') }}
                            {{ Form::text('title', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('description', 'Описание') }}
                            {{ Form::text('description', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('images', 'Изображения') }}
                            {{ Form::file('images', ['class' => 'form-control']) }}
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    {{ Form::label('price', 'Стоимость') }}
                                    {{ Form::text('price', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {{ Form::label('currency_id', 'Валюта') }}
                                    {{ Form::select('currency_id', $currencies, null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        Характеристики:
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    {{ Form::label('property_set', 'Свойства') }}
                                    {{ Form::text('property_set', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {{ Form::label('value_set', 'Значения') }}
                                    {{ Form::text('value_set', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <button class="text-center">+</button>
                        </div> 
                        
                        
                        
                        <div class="form-group">
                            {{ Form::label('category_id', 'Категория') }}
                            {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
                        </div>
                         <div class="form-group">
                            {{ Form::label('alias', 'Псевдоним') }}
                            {{ Form::text('alias', null, ['class' => 'form-control']) }}
                        </div>
                       {{ Form::submit('Добавить', ['class' => 'btn btn-default']) }} 
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection