{{-- llamamos la vista de la cual heredaremos la esrucctura --}}
@extends('dashboard.master')
@section('Titulo','AgregarPost')
@section('contenido')
@include('dashboard.partials.validation-error')


<form action="{{ route('category.store') }}" method="post" style="text-align: center;width: 100%;display: flex;flex-wrap: nowrap;align-items: center;flex-direction: column-reverse;"">
    @csrf
    <main>
        <div class="container py-4">
            <h1>Registrar Categoria</h1>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input class="form-control" type="text" name="name" id="name">
            </div>
        </div>
        
        <div class="row form-group">
            <label for="description">Descripcion</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
        </div>

        <br>
        <div class="row center">
                <div class="col s6">
                    <button class="btn btn-outline-sucess" type="submit">Registrar</button>
                    <a href="{{ url('dashboard/category') }}" class="btn btn-outline-secondary">Cancelar</a>
                </div>
        </div>
    </main>
    
</form>
@endsection