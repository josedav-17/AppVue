@extends('dashboard.master')
@section('contenido')
    <h1>Post publicados</h1>
    <a href="{{ url('dashboard/post/create') }}" class="btn btn-primary">Crear</a>

    {{-- tabla para mostrar los post --}}

    

    <div class="row form-group">
        <label for="title">Titulo</label>
        <input readonly type="text" class="form-control" name="title" id="title" value="{{ $post->name }}">
    </div>

    <div class="row form-group">
        <label for="url_clean">Contenido</label>
        <input readonly class="form-control" name="url_clean" id="url_clean"value="{{ $post->url_clean }}">
    </div>

    <div class="row form-group">
        <label for="url_clean">Contenido</label>
        <input readonly class="form-control" name="url_clean" id="url_clean"value="{{ $post->url_clean }}">
    </div>

@endsection
