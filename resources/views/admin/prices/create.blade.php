@extends('adminlte::page')

@section('title', 'AcademiOnlineGpt')

@section('content_header')
  <h1>Crear nuevo precio</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-body">
      {!! Form::open(['route' => 'admin.prices.store']) !!}
      <div class="form-group">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del precio']) !!}
      </div>
      @error('name')
        <span>{{ $message }}</span>
      @enderror
      <div class="form-group">
        {!! Form::label('value', 'Valor') !!}
        {!! Form::text('value', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el valor del precio']) !!}
      </div>
      @error('value')
        <span>{{ $message }}</span>
      @enderror
      <br>
      {!! Form::submit('Crear nuevo precio', ['class' => 'btn btn-primary']) !!}
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
