@extends('layout.master')

@section('title', 'Crear Usuario')

@section('content')
<div class="row justify-content-center my-3">
    <form class="col-md-6"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
              <label for="nombresInput">Nombres</label>
              <input 
                  type="text" 
                  name="nombres"
                  class="form-control" 
                  id="nombres"
                  required
              >
          </div>
       <div class="form-row">
          <div class="form-group col-md-6">
              <label for="apellidoPaternoInput">Apellido Paterno</label>
              <input 
                  type="text" 
                  name="apellido_paterno"
                  class="form-control" 
                  id="apellido_paterno"
                  required
              >
          </div>
          <div class="form-group col-md-6">
              <label for="apellidoMaternoInput">Apellido Materno</label>
              <input 
                  type="text" 
                  name="apellido_materno"
                  v-model="apellidoMaterno" 
                  class="form-control" 
                  id="apellido_materno"
                  required
              >
          </div>
      </div>
       <div class="form-row">
          <div class="form-group col-md-6">
              <label for="rutInput">RUT</label>
              <input 
                  type="text" 
                  name="rut"
                  class="form-control" 
                  id="rut"
                  required
                  min="8"
              >
          </div>
          <div class="form-group col-md-6">
              <label for="fechaNacimientoInput">Fecha de nacimiento</label>
              <input 
                  type="date" 
                  name="fecha_nacimiento"
                  v-model="fechaNacimiento" 
                  class="form-control" 
                  id="fecha_nacimiento"
                  max=""
                  required
              >
          </div>
      </div>
      <div class="form-group">
          <label for="emailInput">Email</label>
          <input 
              type="email" 
              name="email"
              v-model="email" 
              class="form-control" 
              id="email"
              required
          >
      </div>
      <label for="passwordInput">Contraseña</label>
      <div class="input-group mb-2">
          <input 
              type="password" 
              name="password"
              class="form-control" 
              id="password"
              required
              min="5"
          >
          <div class="input-group-prepend">
              <span onclick="togglePasswordVisibility()" class="input-group-text">
                  <i 
                      class="fa fa-eye" 
                      id="icono_eye"
                      aria-hidden="true"
                  ></i>
              </span>
          </div>
      </div>
      <small id="passwordHelpBlock" class="form-text text-muted">
              Tu contraseña debe contener al menos 6 carácteres.
      </small>
    <div class="form-group mt-3 ">
        <label for="exampleFormControlFile1">Elegir foto de perfil</label>
        <img 
            style="display:none;"
            src="" 
            class="rounded-circle mx-auto d-block"
            id="imagen_preview"
            width="120px" 
        >
        <input 
          type="file" 
          name="path_to_image" 
          accept="image/*"
          onchange="setImagePreview(event)"
          class="form-control-file" 
          id="exampleFormControlFile1"
        >
    </div>  
    <div class="row">
        <button 
          type="submit"
          class="btn btn-lg btn-success mx-auto"
      >Guardar</button>
    </div>
    </form>
</div>
@endsection
