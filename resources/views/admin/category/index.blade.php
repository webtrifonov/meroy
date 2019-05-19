@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('layouts.adminmenu')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h3>Просмотреть категории товаров</h3></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @forelse($categories as $category)
                         <a href="{{ route('category.show', $category->id) }}">{{ $category->id }} {{ $category->title }}</a>
                         <hr>
                    @empty
                        <h4 class="empty">Категорий нет</h4>
                    @endforelse
                        @if($categories->total() > $categories->count())
                            <div class="row justify-content-center">
                                {{ $categories->links() }}
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection