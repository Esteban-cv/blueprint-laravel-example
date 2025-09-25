@extends('templates.base')
@section('title', 'Cursos')
@section('subtitle', 'Editar Curso')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Formulario de Edición de Curso</span>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary btn-sm">
            <i class="fa fa-arrow-left me-1"></i> Volver al listado
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('courses.update', $course) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                {{-- Título --}}
                <div class="col-md-8 mb-3">
                    <label for="title" class="form-label">Título del Curso</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $course->title) }}" required>
                    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                {{-- Precio --}}
                <div class="col-md-4 mb-3">
                    <label for="price" class="form-label">Precio</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $course->price) }}" required min="0">
                    @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            {{-- Descripción --}}
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $course->description) }}</textarea>
                @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="row">
                {{-- Instructor --}}
                <div class="col-md-6 mb-3">
                    <label for="instructor_id" class="form-label">Instructor</label>
                    <select class="form-control @error('instructor_id') is-invalid @enderror" id="instructor_id" name="instructor_id" required>
                        <option value="">Seleccione un instructor...</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('instructor_id', $course->instructor_id) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('instructor_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                {{-- Categoría --}}
                <div class="col-md-6 mb-3">
                    <label for="category_id" class="form-label">Categoría</label>
                    <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                        <option value="">Seleccione una categoría...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $course->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Actualizar Curso</button>
            </div>
        </form>
    </div>
</div>
@endsection