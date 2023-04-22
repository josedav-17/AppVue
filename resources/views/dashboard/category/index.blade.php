<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                    <h2 style="text-align: center">Gestión de Categorias</h2>
                    <table class="table table-bordered border-warning table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Fecha de creacion</th>
                                <th>Fecha de modificacion</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $category )
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description}}</td>
                                <td>{{ $category->created_at}}</td>
                                <td>{{ $category->updated_at}}</td>
                                <td><a href="{{ url('dashboard/category/'.$category->id.'/edit') }}" class="bi bi-pencil-square"></a></td>
                                <td>
                                    <form action="{{ url('dashboard/category/'.$category->id) }}" method="post">
                                        @method("DELETE")
                                        @csrf
                                        <button class="bi bi-trash" style="color: red" type="submit" ></button>                                
                                    </form>
                                </td>
                            </tr>
                            @endforeach
            
                        </tbody>
                    </table>

                    <a href="{{ url('dashboard/category/create') }}" class="btn btn-outline-primary">Nueva categoria</a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>