@extends('templates.base')
@section('title', 'Cursos')
@section('subtitle', 'Listado de Cursos')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-end">
        <a href="{{ route('courses.create') }}" class="btn btn-primary">
            <i class="fa fa-plus me-1"></i> Crear Nuevo Curso
        </a>
    </div>

    <div class="card-body">
        @include('templates.messages')
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Instructor</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->instructor->name ?? 'N/A' }}</td>
                            <td>{{ $course->category->name ?? 'N/A' }}</td>
                            <td>${{ number_format($course->price, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <a href="" class="btn btn-info btn-fill btn-sm mr-2" title="Ver"
                                   data-bs-toggle="modal" data-bs-target="#modalShow{{ $course->id }}">
                                    <i class="nc-icon nc-zoom-split"></i>
                                </a>
                                <a href="{{ route('courses.edit', $course) }}"
                                   class="btn btn-warning btn-fill btn-sm mr-2" title="Editar">
                                    <i class="nc-icon nc-tap-01"></i>
                                </a>
                                <form action="{{ route('courses.destroy', $course) }}" method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('¿Está seguro de que desea eliminar este curso?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-fill btn-sm mr-2" title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <div class="modal fade" id="modalShow{{ $course->id }}" tabindex="-1" aria-hidden="true" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Detalles del Curso</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>ID:</strong> {{ $course->id }}</p>
                                        <p><strong>Título:</strong> {{ $course->title }}</p>
                                        <p><strong>Descripción:</strong> {{ $course->description }}</p>
                                        <p><strong>Precio:</strong> ${{ number_format($course->price, 0, ',', '.') }}</p>
                                        <p><strong>Instructor:</strong> {{ $course->instructor->name ?? 'N/A' }}</p>
                                        <p><strong>Categoría:</strong> {{ $course->category->name ?? 'N/A' }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay cursos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection