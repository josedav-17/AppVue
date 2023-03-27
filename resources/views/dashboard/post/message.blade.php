@extends('dashboard.master')
@section('titulo', 'Mensaje')
@section('contenido')
@csrf
<h1>Mensaje</h1>
<div class="container py-4">
    <h2>{{ $message }}</h2>
    <a href="{{ url('dashboard/post') }}" class="btn btn-primary">Volver</a>

</div>

@endsection
