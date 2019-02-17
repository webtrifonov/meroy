@extends('layouts.mainTemplate')
@section('title', 'Категории')

@section('header')
	@include('layouts.header')
@endsection
@section('content')
<div>
	<ul>
		@forelse($categories as $category)
			<li><a href="{{ asset($category->alias) }}">{{ $category->title }}</a></li>
		@empty 
			<li>No categories</li>
		@endforelse
	</ul>
</div>
@endsection
@section('footer')
	@include('layouts.footer')
@endsection