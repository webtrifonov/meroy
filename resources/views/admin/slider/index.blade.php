@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('layouts.adminmenu')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h3>Информация о слайдах</h3></div>
                <div class="card-body">
                    @forelse($sliders as $slide)
                        <h4>Идентификатор</h4>
                        <p>{{ $slide->id }}</p>
                        <h4>Название</h4>
                        <p>{{ $slide->title }}</p>
                        <h4>Описание</h4>
                        <p>{{ $slide->description }}</p>
                        <h4>Путь к изображению</h4>
                        <p>{{ $slide->image }}</p>
                        <hr>
                    @empty
                        <h4 class="empty">Слайдов нет</h4>
                    @endforelse
                </div>
                @if($sliders->total() > $sliders->count())
                    <div class="row justify-content-center">
                        {{ $sliders->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection