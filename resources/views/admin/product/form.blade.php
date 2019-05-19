@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('layouts.adminmenu')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"><h3>Изменить / удалить товар</h3></div>
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
                        <form action="{{ route('product.update', $product) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="title">Наименование</label>
                                <input name="title" type="text" class="form-control" value="{{ $product->title }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <input name="description" type="text" class="form-control" value="{{ $product->description }}">
                            </div>
                            <div class="form-group">
                                <label>Изображения</label>
                                @foreach($product->images as $image)
                                    <input name="images[]" type="text" class="form-control mb15" value="{{ $image }}">
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label>Категория</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category )
                                        <option
                                                value="{{ $category->id }}"
                                                @if ($category->id == $product->category->id)
                                                selected
                                                @endif
                                        >{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="price">Цена</label>
                                        <input name="price" type="text" class="form-control" value="{{ $product->price }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Валюта</label>
                                        <select name="currency_id" class="form-control">
                                            @foreach ($currencies as $currency )
                                                <option
                                                        value="{{ $currency->id }}"
                                                        @if ($currency->id == $product->currency->id)
                                                        selected
                                                        @endif
                                                >{{ $currency->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Свойства</label>
                                        @foreach($product->property_set as $property)
                                            <input name="property_set[]" type="text" class="form-control mb15" value="{{ $property }}">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Значения</label>
                                        @foreach($product->value_set as $value)
                                            <input name="value_set[]" type="text" class="form-control mb15" value="{{ $value }}">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-warning" value="Изменить">

                        </form>
                        <form action="{{ route('product.destroy', $product) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="text-right">
                                <input type="submit" class="btn btn-danger" value="Удалить">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection