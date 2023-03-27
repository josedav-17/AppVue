@extends('dashboard.master')
@section('contenido')
@include('dashboard.partials.validation-error')
@include('dashboard.partials.message')
@csrf


<form action="{{ route('post.update', $post->id) }}" method="POST">
    @method('PUT')
    @include('dashboard.post._form')
    <main>
        <div class="row">
            <div class="btn">
                <br>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button class="btn btn-danger">Cancelar</button>
            </div>
    <main>