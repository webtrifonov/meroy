@extends('meroy.layouts.index_template')
@section('title', 'Новое')

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
            <h2>Новые поступления</h2>
        </div>
    </div>

    @include('meroy.includes.products_3')
    @if($products->total() > $products->count())
        <div class="row justify-content-center">
            {{ $products->links() }}
        </div>
    @endif
</div>
@endsection
@section('footer')
    @include('meroy.includes.footer')
@endsection