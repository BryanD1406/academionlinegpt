@extends('adminlte::page')

@section('title', 'AcademiOnlineGpt')

@section('content_header')
  <h1>Lista de roles</h1>
@stop

@section('content')

  {{-- * Mostramos la variable que contiene el mensaje de sesion --}}
  @if (session('info'))
    @if (session('info') == 'El rol se creo satisfactoriamente')
      <div class="alert alert-success" role="alert">
        <strong>Felicidades!</strong> {{ session('info') }}
      </div>
    @else
      <div class="alert alert-danger" role="alert">
        <strong>Felicidades!</strong> {{ session('info') }}
      </div>
    @endif
  @endif


  <div class="card">
    <div class="card-header">
      <a href="{{ route('admin.roles.create') }}">Crear nuevo rol</a>
    </div>
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th colspan="2"></th>
          </tr>
        </thead>
        <tbody>
          @forelse($roles as $role)
            {{-- *En caso de que el rol este con algun valor --}}
            <tr>
              <td>{{ $role->id }}</td>
              <td>{{ $role->name }}</td>


              <td width="10px">
                <a class="btn btn-secondary" href="{{ route('admin.roles.edit', $role) }}">Editar</a>
              </td>

              <td width="10px">
                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
              </td>
            </tr>

          @empty
            {{-- *En caso de que el rol no tenga algun valor --}}
            <tr>
              <td colspan="4">No hay ningun rol registrado</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@stop

@section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
  <script>
    console.log('Hi!');
  </script>
@stop
