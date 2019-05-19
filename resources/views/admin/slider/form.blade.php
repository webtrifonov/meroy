@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('layouts.adminmenu')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"><h3>Изменить / удалить слайд</h3></div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="error">
                                    <p class="error_message">{{ $error }}</p>
                                </div>
                            @endforeach
                        @endif
                        <form action="{{ route('slide.update', $slide) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="title">Наименование</label>
                                <input name="title" type="text" class="form-control" value="{{ $slide->title }}">
                            </div>
                            <div class="form-group">
                                <label for="path">Путь</label>
                                <input name="path" type="text" class="form-control" value="{{ $slide->path }}">
                            </div>
                            <div class="form-group">
                                <label for="image">Изображение</label>
                                <input name="image" type="text" class="form-control" value="{{ $slide->image }}">
                            </div>
                            <input type="submit" class="btn btn-warning" value="Изменить">

                        </form>
                        <form action="{{ route('slide.destroy', $slide->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="text-right">
                                <input type="submit" class="btn btn-danger" value="Удалить">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection