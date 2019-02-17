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
                    
                    @forelse($sliders as $slide)
                        <h4>Название</h4>
                        <p>{{ $slide->title }}</p>
                        <h4>Описание</h4>
                        <p>{{ $slide->description }}</p>
                        <h4>Путь к изображению</h4>
                        <p>{{ $slide->image }}</p>
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