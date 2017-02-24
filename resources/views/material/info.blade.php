@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-edit" aria-hidden="true"></span>
      <h4>Material {{$material->nombre}} {{$material->id}}</h4>
    </div>
    <div class="panel-body">
        {!! Form::label('nombre', 'Nombre: '.$material->nombre,['class' => 'col-sm-10 col-sm-offset-1 control-label']) !!}
        @if ($material->vehiculo_id)
          {!! Form::label('vehiculo_id', 'Esta en el vehiculo: '.$material->vehiculo->patente,['class' => 'col-sm-10 col-sm-offset-1 control-label']) !!}
        @else
          {!! Form::label('vehiculo_id', 'Esta en depósito',['class' => 'col-sm-10 col-sm-offset-1 control-label']) !!}
        @endif
        @if ($material->mantenimiento)
          {!! Form::label('mantenimiento', "En Mantenimiento", ['class' => 'col-sm-10 col-sm-offset-1 control-label']) !!}
        @endif
        {!! Form::label('reparado', "Veces reparado: ".$material->reparado, ['class' => 'col-sm-10 col-sm-offset-1 control-label']) !!}
        {!! Form::label('detalle', 'Detalle: '.$material->detalle,['class' => 'col-sm-10 col-sm-offset-1 control-label']) !!}

    </div>
  </div>
</article>
@endsection
