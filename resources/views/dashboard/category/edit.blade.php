{{-- llamamos la vista de la cual heredaremos la esrucctura --}}
@extends('dashboard.master')
@section('Titulo','EditPost')
@section('contenido')
@include('dashboard.partials.validation-error')

<form action="{{ route('category.store') }}" method="post" style="text-align: center;width: 100%;display: flex;flex-wrap: nowrap;align-items: center;flex-direction: column-reverse;"">
    @method("PUT")
    @csrf
    <main>
        <div class="row">
            <div class="form-group">
                <label for="name">Nombre de la categoria</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
            </div>
        </div>
        <div class="row form-group">
            <label for="description">Descripción de la categoria</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
        </div>
        <div class="row center">
                <div class="col s6">
                    <button class="btn btn-outline-success" type="submit">Guardar</button>
                    <a href="{{ url('dashboard/post') }}" class="btn btn-outline-secondary">Cancelar</a>
                    
                </div>
        </div
</form>
@endsection



