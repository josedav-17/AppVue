<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 style="text-align: center">Gestion de usuarios</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Post Creado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($replies as $reply)
                            <tr>
                                <th scope="row">{{ $reply->id }}</th>
                                <td>{{ $reply->post_id }}</td>
                                <td>
                                    <a href="{{ route('reply.edit', $reply->id) }}" class="btn btn-outline-success">Editar</a>
                                    <form action="{{ route('reply.destroy', $reply->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <a href="{{ route('reply.create') }}" class="btn btn-success">Crear</a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
