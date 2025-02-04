@extends('adminlte::page')

@section('title', 'AcademiOnlineGpt')

@section('content_header')
  <h1>Crear nuevo rol</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-body">

      {{-- ?CREAR --}}

      {{-- *Laravel Collective html --}}
      {{-- *Indicar a donde queremos que apunte el form dentro del array[] --}}
      {{-- *Al usar el componente asi tal cual por defecto el metodo es POST (INCLUYE TOKEN) --}}
      {!! Form::open(['route' => 'admin.roles.store']) !!}

      {{-- ?Llamamos al componente del formulario --}}

      @include('admin.roles.partials.form')

      {!! Form::submit('Crear nuevo rol', ['class' => 'btn btn-primary mt-2']) !!}

      {!! Form::close() !!}
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
