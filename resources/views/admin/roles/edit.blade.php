@extends('adminlte::page')

@section('title', 'AcademiOnlineGpt')

@section('content_header')
  <h1>Editar rol</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-body">

      {{-- ?Editar --}}

      {{-- *Para rellenar los datos utilizamos form::model y le pasamos el rol por parametro, recordemos que esto es lo que nos pasan al seleccionar el boton editar --}}

      {{-- *La ruta update necesita un segundo parametro, lo metemos todo dentro de un array --}}
      {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}

      {{-- ?Llamamos al componente del formulario --}}

      @include('admin.roles.partials.form')

      {!! Form::submit('Editar rol', ['class' => 'btn btn-primary mt-2']) !!}

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
