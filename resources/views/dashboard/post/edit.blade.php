{{-- llamamos la vista de la cual heredaremos la esrucctura --}}
@extends('dashboard.master')
@section('Titulo','EditarPost')
@section('contenido')
@include('dashboard.partials.validation-error')
<h1>Editar post</h1>

<form action="{{ url('dashboard/post/'.$post->id) }}" method="post">
    @method("PUT")
    @csrf
    <main>
        <div class="row">
            <div class="form-group">
                <label for="name">Articulo</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $post->name }}">
            </div>
        </div>
        <div class="row form-group">
            <label for="description">Contenido</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $post->description }}</textarea>
        </div>
        <div class="row form-group">
            <label for="description">Categoria</label>
            <select name="category" id="category">
                <option value="">Seleccionar una categoria</option>
                @foreach ($category as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="row center">
                <div class="col s6">
                    <button class="btn btn-outline-success" type="submit">Guardar</button>
                    <a href="{{ url('dashboard/post') }}" class="btn btn-outline-secondary">Cancelar</a>
                    
                </div>
        </div>
    </main>
    
</form>
@endsection