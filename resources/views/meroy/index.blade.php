@extends('meroy.layouts.index_template')
@section('title', 'maji')

@section('header')
    @include('meroy.includes.header')
@endsection
@section('side_menu')
    @include('meroy.includes.side_menu')
@endsection
@section('slider')
    @include('meroy.includes.slider')
@endsection
@section('new_products')
    @include('meroy.includes.new_products')
@endsection
@section('popular_products')
    @include('meroy.includes.popular_products')
@endsection
@section('footer')
    @include('meroy.includes.footer')
@endsection