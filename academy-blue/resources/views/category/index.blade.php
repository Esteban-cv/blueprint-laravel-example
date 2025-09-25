@extends('templates.base')
@section('title', 'Categorías')
@section('subtitle', 'Listado')

@section('content')
    <div class="card">
        {{-- Cabecera de la tarjeta con el botón de creación --}}
        <div class="card-header d-flex justify-content-end">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">
                <i class="fa fa-plus me-1"></i> Crear Nueva Categoría
            </a>
        </div>

        <div class="card-body">
            {{-- Incluir mensajes de éxito, error, etc. --}}
            @include('templates.messages')

            {{-- Verificamos si hay categorías para mostrar --}}
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 10%;">ID</th>
                            <th>Nombre</th>
                            <th style="width: 15%;" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-info btn-fill btn-sm mr-2" title="Ver"
                                    data-toggle="modal" data-target="#modalShow{{ $category->id }}">
                                        <i class="nc-icon nc-zoom-split"></i>
                                    </a>

                                    {{-- Botón de Editar --}}
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                        class="btn btn-warning btn-fill btn-sm mr-2" title="Editar">
                                        <i class="nc-icon nc-tap-01"></i>
                                    </a>

                                    {{-- Formulario para Eliminar (más seguro que un link) --}}
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('¿Está seguro de que desea eliminar este registro?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-fill btn-sm mr-2">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                <!--Modal-->

                                <div class="modal fade modal-mini modal-primary" id="modalShow{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header justify-content-center">
                                                <h5>Detalle</h5>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>ID: </strong>{{ $category->id }}</p>
                                                <p><strong>NOMBRE: </strong>{{ $category->name }}</p>
                                                <p><strong>DESCRIPCION: </strong>{{ $category->description }}</p>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-link btn-simple" data-dismiss="modal" >Cerrar</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!--Fin modal-->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
