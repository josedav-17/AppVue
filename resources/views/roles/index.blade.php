<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 style="text-align: center">Gestion de usuarios</h2>
                    <table class="table table-bordered border-warning table-hover">
                    <thead>
                        <tr>
                            <th>Rol</th>
                            <th>Permisos</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            
                        </tr>
                    </thead>
                
                    <tbody>
                        @foreach ($roles as $rol )
                        <tr style="align-items: center">
                            <td>{{ $rol->name }}</td>
                            <td> 
                                @if (!empty($rol->permissions))
                                    @foreach ($rol->permissions as $permiso)
                                        <h5>{{ $permiso->name }}</h5>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('roles/'.$rol->id.'/edit') }}" class="bi bi-pencil"></a>
                            </td>
                            <td>
                                <form action="{{ url('roles/'.$rol->id) }}" method="post">
                                    @method("DELETE")
                                    @csrf
                                    <button class="bi bi-trash" style="color: red" type="submit" ></button>                                  
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ url('roles/create') }}" class="btn btn-outline-primary">Nuevo Rol</a>
            </div>
        </div>
    </div>
</x-app-layout>