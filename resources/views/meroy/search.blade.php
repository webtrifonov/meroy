@extends('meroy.layouts.index_template')
@section('title', 'Категория')

@section('header')
    @include('meroy.includes.header')
@endsection
@section('side_menu')
    @include('meroy.includes.side_menu')
@endsection
@section('content')
<div class="demo_products_wrapper">
    <div class="demo_products_header row justify-content-between">
        <div class="col-auto">
            <h2>Результаты поиска по: {{ $search }}</h2>
        </div>
    </div>
    @include('meroy.includes.products_3')
    {{--<div class="demo_products row">
        @forelse($products as $product)
            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                <div class="product">
                <a href="{{ url('product', $product->id) }}">
                    <img src="{{ $product->images[0] }}" alt="" />
                    <h2>{{ $product->title }}</h2>
                </a>
                    <div class="price_details row justify-content-between">
                        <div class="price col-auto">
                            <p>{{ $product->price }} <span>{{ $product->currency->title }}</span></p>
                        </div>
                        <div class="add_cart col-auto">                              
                            <h4><a href="#">В корзину</a></h4>
                        </div>
                    </div>
                </div> 
            </div>
        @empty
            <div class="empty col-12">Для заданной категории нет товаров</div>
        @endforelse
    </div>--}}
</div>
@endsection
@section('footer')
    @include('meroy.includes.footer')
@endsection