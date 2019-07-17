@extends('meroy.layouts.base_template')
@section('title', 'Доставка')

@section('header')
    @include('meroy.includes.header')
@endsection
@section('content')
    <h1 class="header_text">Доставка</h1>
    @forelse($delivery_points as $delivery_point)
        <div class="delivery_item row">
            <div class="col-auto delivery_image">
                <img src="{{ asset('assets/images/delivery/'.$delivery_point->image) }}" alt="{{ $delivery_point->address }}">
            </div>
            <div class="col-auto delivery_text">
                <h2>{{ $delivery_point->title }}</h2>
                <p>{{ $delivery_point->city }}</p>
                <p>{{ $delivery_point->address }}</p>
            </div>
        </div>
    @empty
        <p class="empty">Нет пунктов самовывоза</p>
    @endforelse
@endsection
@section('footer')
    @include('meroy.includes.footer')
@endsection