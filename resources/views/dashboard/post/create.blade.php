@extends('dashboard.master')
@section('titulo', 'AgregarPost')
@section('contenido')
@csrf

<div class="titulo">
<h1>Agregar Post</h1>
</div>
    {{-- enviamos el form a las validaciones del controller de post --}}
    <form action="{{ route('post.store') }}" method="POST">
        <main>
            <div class="row">

                <div class="row form-group">
                    {{-- campo de nombre que se envia al post --}}
                    <label for="name">Nombre</label>
                    <input class="form-control" id="name" name="name" type="text">
                </div>

                <div class="row form-group">
                    {{-- se envia la descripción del post en un textarea--}}
                    <label for="description">Descripción</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>

                <div class="row form-group">
                    {{-- se envia la categoria del post --}}
                    <label for="category_id">Categoria</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="">Seleccione una categoria</option>
                        {{-- no se traen las categorias de la db --}}
                       
                    </select>
                </div>


                <div class="btn">
                    <br>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button class="btn btn-danger">Cancelar</button>
                </div>
        <main>
    </form>

    {{-- le damos estilos de css --}}
<style>
    .titulo {
        text-align: center;
        color: blue;
        background-color: #f5f5f5;
        margin: 0 auto;
    }

    .row,.form-group {
        margin-top: 10px;
        text-align:center;
        margin: 0 auto;
        width: 90%;
    }
    .form-control {
        box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
    }
</style>

@endsection
