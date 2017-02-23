@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Materiales del movil N° {{$vehiculo->num_movil}}
    </div>
    <div class="panel-body">
      {!! Form::label('patente', 'Patente: ',['class' => 'col-md-1 col-md-offset-1 control-label']) !!}
      {!! Form::label('patente', $vehiculo->patente,['class' => 'col-md-2 control-label']) !!}
      @if ($vehiculo->baja)
        {!! Form::label('baja', "Baja", ['class' => 'col-md-2 control-label']) !!}
      @else
        @if ($vehiculo->activo)
          {!! Form::label('activo', "Activo", ['class' => 'col-md-4 control-label']) !!}
        @else
          {!! Form::label('inactivo', "Inactivo", ['class' => 'col-md-4 control-label']) !!}
        @endif
      @endif
      {!! Form::label('detalle', 'Detalle: ',['class' => 'col-md-11 col-md-offset-1 control-label']) !!}
      {!! Form::label('patente', $vehiculo->detalle,['class' => 'col-md-10 col-md-offset-1 control-label']) !!}
      <div class=" col-md-5 col-md-offset-1">
      <table  class="table table-bordered">
        <thead><!--Titulos de la tabla-->
          <tr>
            <th colspan="2" class="text-center">Materiales</th>
          </tr>
        </thead>
        <tbody><!--Contenido de la tabla-->
          @foreach ($vehiculo->materiales as $material)
            <tr>
              <td class="text-center">{{$material->nombre}}</td>
              <td class="text-center"><a class="glyphicon glyphicon-edit" href="{{ route('material.edit', $material->id) }}"></a></td>
            </tr>
          @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td colspan="2" class="text-center">Detalle de Vehiculo</td>
            </tr>
          </tfoot>
          <br>
        </table>
      </div>
    </div>
  </div>
</article>
@endsection
