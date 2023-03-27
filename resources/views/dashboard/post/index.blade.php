@extends('dashboard.master')
@section('titulo', 'Poster')
@section('contenido')

@csrf
<main>
    <div class="container py-4">
        <h1>Post publicados</h1>
        <a href="{{ url('dashboard/post/create') }}" class="btn btn-primary">Crear</a>
    </div>

    {{-- tabla para mostrar los post --}}
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Creación</th>
                    <th scope="col">Actualización</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                {{-- llamamos a post del controller para traer los datos de la db --}}
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->status }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td>
                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Ver</a>
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Editar</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                Eliminar
                            </button>
                        </td>
                    </tr>
            </tbody>
            @endforeach

        </table>
    </div> 
    {{-- modal para eliminar --}}

@endsection
