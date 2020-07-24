@extends('layout.master')

@section('title', 'Usuarios')

@push('styles')
    <style>
        td, th{
            white-space: nowrap;
        }
        .table{
          font-size: .85rem;
        }
        .swal2-title{
          display: block !important;
        }
    </style>
@endpush

@section('content')
@include('partials.header')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show col-md-6 text-center mx-auto" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="row col-md-11 mx-auto">
  <h3>Usuarios</h3>
  <a class="btn btn-primary ml-auto" href="{{ route('user_create') }}">Nuevo</a>
</div>
<table class="table col-md-9 mx-auto table-striped">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">Nombres</th>
        <th scope="col">Apellido Paterno</th>
        <th scope="col">Apellido Materno</th>
        <th scope="col">RUT</th>
        <th scope="col">Fecha Nacimiento</th>
        <th scope="col">Email</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr>
            <th scope="row">
              <img 
                  class="rounded-circle"
                  src="{{ asset("storage/images/$user->imagen") }}" 
                  width="40px" 
                  alt="{{ "Imagen de $user->nombres $user->apellido_paterno" }}">
            </th>
            <td class="text-capitalize">{{ $user->nombres }}</td>
            <td class="text-capitalize">{{ $user->apellido_paterno }}</td>
            <td class="text-capitalize">{{ $user->apellido_materno }}</td>
            <td>{{ $user->rut }}</td>
            <td>{{ \Carbon\Carbon::parse($user->fecha_nacimiento)->format('d/m/Y') }}</td>
            <td>{{ $user->email }}</td>
            <td class="row">
                <form  method="POST" action="{{ route('user_delete', [ 'id' => $user->id ]) }}"
                >
                  @csrf
                  @method('delete')
                  <input 
                    type="hidden" 
                    name="fullName" 
                    value="{{ $user->nombres.' '.$user->apellido_paterno }}"
                  >
                  <button 
                    type="submit" 
                    class="btn btn-danger delete-user"
                  >
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
                    <a 
                      class="btn btn-sm btn-warning" 
                      href="{{ route('user_edit', ['id' => $user->id ]) }}"
                    >
                      <i class="fas fa-edit"></i>
                    </a>
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
    <div class="row justify-content-center">
        {{ $users->links() }}
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/deleteUser.js') }}"></script>
@endpush