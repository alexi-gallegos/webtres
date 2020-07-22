@extends('layout.master')

@section('title', 'Usuarios')

@section('content')
<table class="table table-striped">
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
            <th scope="row">1</th>
            <td>{{ $user->nombres }}</td>
            <td>{{ $user->apellido_paterno }}</td>
            <td>{{ $user->apellido_materno }}</td>
            <td>{{ $user->rut }}</td>
            <td>{{ $user->fecha_nacimiento }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <button class="btn btn-sm btn-danger">eliminar</button>
                <button class="btn btn-sm btn-warning ml-2">editar</button>
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>

    {{ $users->links() }}
@endsection