@extends('layouts.app')

@section('content')
{!! Form::open([ 'route' => ['servicio.update',1], 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
  <div class="col-md-2 col-md-offset-6">
    {{Form::select('Tipo[]', $tipos,null,['class' => 'form-control','id'=>'lsbomberos','multiple'=>'multiple'])}}

  </div>
{!! Form::close() !!}
@endsection
