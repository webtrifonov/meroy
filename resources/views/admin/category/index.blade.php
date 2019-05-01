@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('layouts.adminmenu')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h3>Просмотреть слайд</h3></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @forelse($categories as $category)
                        <h4>Идентификатор</h4>
                        <p>{{ $category->id }}</p>
                        <h4>Название</h4>
                        <p>{{ $category->title }}</p>
                        <h4>Псевдоним</h4>
                        <p>{{ $category->alias }}</p>
                        <hr>
                    @empty
                        <h4>Слайдов нет</h4>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection