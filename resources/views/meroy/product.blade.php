@extends('meroy.layouts.product_template')
@section('title', 'Товар')

@section('header')
    @include('meroy.includes.header')
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="breadcrumbs">
            <p><a href="{{ route('index') }}">Главная</a> >> <a href="{{ url('category/'.$product->category->id) }}">{{ $product->category->title }}</a> >> <a href="#">{{$product->title}}</a></p>
        </div>
    </div>
    <div class="col-4">
        <div class="flexslider product_slider">
            <ul class="slides">
                @forelse($product->images as $image)
                    <li data-thumb="{{ $image }}">
                        <img src="{{ $image }}" />
                    </li>
                @empty
                    <li data-thumb="https://via.placeholder.com/350x400.jpg">
                        <img src="https://via.placeholder.com/350x400.jpg" />
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
    <div data-product='{
            "id": "{{ $product->id }}",
            "title": "{{ $product->title }}",
            "price": "{{ $product->price }}",
            "currency": "{{ $product->currency->title }}",
            "amount": "1"
        }' class="col-8 product_item">
        <h2 class="header_text">{{ $product->title }}</h2>
        <p>{{ $product->mini_description }}</p>
        <div class="price">
            <p>Стоимость: <span>{{ $product->price }} {{ $product->currency->title }}</span></p>
        </div>
        <div class="row">
            <div class="col-12 col-lg-auto">
                <div class="amount">
                    <div class="qty_number">
                        <input class="amount_number" type="text" value="1">
                    </div>
                    <div class="qty_arrows">
                        <div class="qty_arrow qty_up_arrow"></div>
                        <div class="qty_arrow qty_down_arrow"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-auto">
                <button style="display: block" id="add_to_cart_button_{{ $product->id }}" class="add_to_cart_button cart_button">В корзину</button>
                <button style="display: none" id="delete_from_cart_button_{{ $product->id }}" class="delete_from_cart_button cart_button">Из корзины</button>
            </div>
        </div>
    </div>
</div>
<ul class="tabs">
    <li class="tab-link current" data-tab="tab-1">Характеристика</li>
    <li class="tab-link" data-tab="tab-2">Полное описание</li>
</ul>
<div id="tab-1" class="tab-content current">
    <div class="product_properties row">
        <div class="col-6">
            <ul class="property_set">
                @foreach($product->property_set as $property)
                    <li>{{ $property }}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-6 border_left">
            <ul class="value_set">
                @foreach($product->value_set as $value)
                    <li>{{ $value }}</li>
                @endforeach
            </ul>
        </div>
    </div>


</div>
<div id="tab-2" class="tab-content">{{ $product->description }}</div>

@endsection

@section('side_menu')
    @include('meroy.includes.side_menu')
@endsection
@section('popular_products')
    @include('meroy.includes.popular_products')
@endsection
@section('footer')
    @include('meroy.includes.footer')
@endsection