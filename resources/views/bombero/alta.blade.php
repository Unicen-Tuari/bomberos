@extends('layouts.app')

@section('content')
<div class="container">
<div class="panel panel-default">
  <div class="panel-heading">
    Formulario de alta bombero
  </div>
  <div class="panel-body">
  {!! Form::open(['route' => 'altaBombero', 'method' => 'POST', 'files' => true]) !!}
        <div class="form-group">
          {!! Form::label('name', 'Nombre') !!}
          {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('name', 'Apellido') !!}
          {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('name', 'Numero de legajo') !!}
          {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('name', 'Jerarquía') !!}
          {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('name', 'Dirección') !!}
          {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('name', 'Teléfono') !!}
          {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('name', 'Fecha de nacimiento') !!}
          {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::submit('Registrar', ['class' => 'btn btn-info']) !!}
        </div>

  {!! Form::close() !!}
  </div>
</div>
</div>
@endsection
