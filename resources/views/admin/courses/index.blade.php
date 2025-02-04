@extends('adminlte::page')

@section('title', 'AcademiOnlineGpt')

@section('content_header')
  <h1>Pendientes de aprobacion de cursos </h1>
@stop

@section('content')

  {{-- *Mensaje de exito --}}
  @if (session('info'))
    <div class="alert alert-success">
      {{ session('info') }}
    </div>
  @endif

  <div class="card table-responsive">
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Categoria</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($cursos as $curso)
            <tr>
              <td>{{ $curso->id }}</td>
              <td>{{ $curso->title }}</td>
              <td>{{ $curso->category->name }}</td>
              <td><a href="{{ route('admin.cursos.show', $curso) }}" class="btn btn-primary">Revisar</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="card-footer">
      {{ $cursos->links('vendor.pagination.bootstrap-4') }}
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
