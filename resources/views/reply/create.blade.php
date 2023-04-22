<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creación de Reply') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('dashboard.partials.validation-error')
                    <form action="{{ route('roles.store') }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="name">Id Reply:</label>
                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="name" id="name"
                                    value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="name">Id Post:</label>
                            <div class="col-sm-5">
                              <table>
                                <tbody>
                                    <tr>
                                        <td>
                                        <select name="post_id" id="post_id" class="form-control">
                                            <option value="">Seleccione un post</option>
                                            @foreach ($posts as $post)
                                            <option value="{{ $post->id }}">{{ $post->id }}</option>
                                            @endforeach
                                        </select>
                                        </td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>

                        <div class="row center">
                            <div class="col s6">
                                <button class="btn btn-outline-success" type="submit">Guardar</button>
                                <a href="{{ url('roles') }}" class="btn btn-outline-secondary">Cancelar</a>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


                        
