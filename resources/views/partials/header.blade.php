@push('styles')
    <style>
        .jumbotron{
            padding: .7rem;
        }
    </style>
@endpush

<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
      <h1 class="display-4">Administrador de usuarios</h1>
    </div>
    
    @isset($show_inicio)
        <a class="btn btn-primary" href="{{ route('users_inicio') }}">Ir a Usuarios</a>
    @endisset

</div>