@extends('layouts.mainTemplate')
@section('title', 'Главная')

@section('header')
	@include('layouts.header')
@endsection
@section('menu')
	@include('layouts.menu')
@endsection
@section('slider')
	@include('layouts.slider')
@endsection

@section('new_products')
	@include('layouts.new_products')
@endsection
@section('popular_products')
	@include('layouts.popular_products')
@endsection
@section('footer')
	@include('layouts.footer')
@endsection

