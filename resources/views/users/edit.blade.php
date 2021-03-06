@extends('layout.master')

@section('title', 'Editar Usuario')

@section('content')
@include('partials.header', ['show_inicio' => true])
<div class="row justify-content-center mb-4">
    <form method="POST" action="{{ route('user_update') }}" class="row col-md-8" id="editar_usuario_form">
        @csrf
        @method('PATCH')
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="form-group col-md-5 mt-3 ">
            <label for="exampleFormControlFile1">Actual foto de perfil</label>
            <img 
                src="{{ asset("storage/images/$user->imagen") }}" 
                class="rounded-circle mr-auto d-block"
                id="imagen_perfil"
                width="120px" 
            >
            <input 
              type="file" 
              name="path_to_image" 
              accept="image/*"
              onchange="changeInputImage(event)"
              class="form-control-file mt-4" 
              id="imagen"
            >
            <small id="helpTextImagen" class="form-text text-muted">
                Puede seleccionar una imagen para actualizar la foto actual.
              </small>
        </div>
        <div class="col-md-7">
            <div class="form-group">
                <label for="nombresInput">Nombres</label>
                <input 
                    type="text" 
                    name="nombres"
                    value="{{ $user->nombres }}"
                    class="form-control {{ $errors->has('nombres') ? 'is-invalid' : '' }}" 
                    id="nombres"
                    required
                >
                @error('nombres')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
         <div class="form-row">
            <div class="form-group col-md-6">
                <label for="apellidoPaternoInput">Apellido Paterno</label>
                <input 
                    type="text" 
                    value="{{ $user->apellido_paterno }}"
                    name="apellido_paterno"
                    class="form-control {{ $errors->has('apellido_paterno') ? 'is-invalid' : '' }}" 
                    id="apellido_paterno"
                    required
                >
                @error('apellido_paterno')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="apellidoMaternoInput">Apellido Materno</label>
                <input 
                    type="text" 
                    name="apellido_materno"
                    value="{{ $user->apellido_materno }}"
                    class="form-control {{ $errors->has('apellido_materno') ? 'is-invalid' : '' }}" 
                    id="apellido_materno"
                >
                @error('apellido_materno')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
         <div class="form-row">
            <div class="form-group col-md-6">
                <label for="fechaNacimientoInput">Fecha de nacimiento</label>
                <input 
                    type="date" 
                    name="fecha_nacimiento"
                    value="{{ $user->fecha_nacimiento }}"
                    class="form-control {{ $errors->has('fecha_nacimiento') ? 'is-invalid' : '' }}" 
                    id="fecha_nacimiento"
                    max="{{ date('Y-m-d') }}"
                    required
                >
                @error('fecha_nacimiento')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
      <div class="row">
          <button 
            type="submit"
            class="btn btn-lg btn-success"
        >Guardar Cambios</button>
      </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
    <script>
        var idUser = {{ $user->id }};
    </script>
    <script src="{{ asset('js/editUser.js') }}"></script>
@endpush