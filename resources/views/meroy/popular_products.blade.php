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
            <h2>Популярные товары</h2>
        </div>
    </div>

    @include('meroy.includes.products_3')
    
</div>
@endsection
@section('footer')
    @include('meroy.includes.footer')
@endsection