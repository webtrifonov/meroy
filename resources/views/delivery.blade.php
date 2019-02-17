@extends('layouts.simpleTemplate')
@section('title', 'Доставка')

@section('header')
	@include('layouts.header')
@endsection
@section('content')
	@forelse($delivery_points as $delivery_point)
	<div class="delivery-item">
		<div class="delivery_image">
			<img src="{{ asset('assets/images/delivery/'.$delivery_point->image) }}" alt="{{ $delivery_point->address }}">
		</div>
		<div class="delivery_text">
			<h2>{{ $delivery_point->title }}</h2>
			<h3>{{ $delivery_point->city }}</h3>
			<p>{{ $delivery_point->address }}</p>
		</div>
	</div>	
	@empty
123
	@endforelse
	

@endsection
@section('footer')
	@include('layouts.footer')
@endsection

