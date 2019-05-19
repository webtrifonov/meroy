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
                    <form action="{{ route('product.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Наименование</label>
                            <input name="title" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea name="description" type="text" class="form-control"></textarea>
                        </div>

                        <div class="row" data-additional>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="images">Изображения</label>
                                    <input name="images[]" type="text" class="form-control mb15">
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-secondary" data-add_images_field type="button" >+</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="price">Стоимость</label>
                                    <input name="price" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="currency_id">Валюта</label>
                                    <select name="currency_id" class="form-control">
                                        @foreach ($currencies as $currency)
                                            <option value="{{ $currency->id }}">{{ $currency->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <p>Характеристики</p>
                        <div class="row" data-additional>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="property_set">Свойства</label>
                                    <input name="property_set[]" type="text" class="form-control mb15">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="value_set">Значения</label>
                                    <input name="value_set[]" type="text" class="form-control mb15">
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-secondary" type="button" data-add_properties_fields>+</button>
                            </div>
                        </div>

                        {{--alias--}}
                        <input type="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection