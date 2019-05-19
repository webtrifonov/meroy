@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('layouts.adminmenu')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h3>Просмотреть товар</h3></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @forelse($products as $product)
                        <a href="{{ route('product.show', $product->id) }}">{{ $product->id }} {{ $product->title }}</a>
                        {{--<h4>Идентификатор</h4>--}}
                        {{--<p>{{ $product->id }}</p>--}}
                            {{--<h4>Название</h4>--}}
                        {{--<p>{{ $product->title }}</p>--}}
                        {{--<h4>Описание</h4>--}}
                        {{--<p>{{ $product->description }}</p>--}}
                        {{--<h4>Категория</h4>--}}
                        {{--<p>{{ $product->category->title }}</p>--}}
                        {{--<h4>Изображения:</h4>--}}
                        {{--<ul>--}}
                        {{--@forelse($product->images as $image)--}}
                            {{--<li>{{ $image }}</li>--}}
                        {{--@empty--}}
                            {{--<li>Нет изображений</li>--}}
                        {{--@endforelse    --}}
                        {{--</ul>--}}
                        {{--<h4>Цена | Валюта</h4>--}}
                        {{--<p>{{ $product->price }} | {{ $product->currency->title }}</p>--}}
                        {{--<h4>Количество товаров</h4>--}}
                        {{--<p>{{ $product->totalcount }}</p>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-6">--}}
                                {{--<h4>Характеристики:</h4>--}}
                                {{--<ul>--}}
                                {{--@forelse($product->property_set as $property)--}}
                                    {{--<li>{{ $property }}</li>--}}
                                {{--@empty--}}
                                    {{--<li>Нет изображений</li>--}}
                                {{--@endforelse    --}}
                                {{--</ul>--}}
                            {{--</div>--}}
                            {{--<div class="col-6">--}}
                                {{--<h4>Значения:</h4>--}}
                                {{--<ul>--}}
                                {{--@forelse($product->value_set as $value)--}}
                                    {{--<li>{{ $value }}</li>--}}
                                {{--@empty--}}
                                    {{--<li>Нет изображений</li>--}}
                                {{--@endforelse    --}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<h4>Псевдоним</h4>--}}
                        {{--<p>{{ $product->alias }}</p>--}}
                        <hr>
                    @empty
                        <h4 class="empty">Товары отсутствуют</h4>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection