@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Materiales del movil N° {{$vehiculo->num_movil}}
    </div>
    <div class="panel-body">
      <div class="col-sm-4 col-sm-offset-1">
        <br>
        {!! Form::label('patente', 'Patente: '. $vehiculo->patente,['class' => 'col-sm-8 control-label']) !!}
        @if ($vehiculo->baja)
          {!! Form::label('baja', "Baja", ['class' => 'col-sm-3 control-label']) !!}
        @else
          @if ($vehiculo->activo)
            {!! Form::label('activo', "Activo", ['class' => 'col-sm-4 control-label']) !!}
          @else
            {!! Form::label('inactivo', "Inactivo", ['class' => 'col-sm-4 control-label']) !!}
          @endif
        @endif
        {!! Form::label('detalle', 'Detalle: '.$vehiculo->detalle,['class' => 'col-sm-11 control-label']) !!}
      </div>
      <div class=" col-sm-5">
      <table  class="table table-bordered">
        <thead><!--Titulos de la tabla-->
          <tr>
            <th colspan="2" class="text-center">Materiales</th>
          </tr>
        </thead>
        <tbody><!--Contenido de la tabla-->
          @foreach ($vehiculo->materiales as $material)
            <tr>
              <td class="text-center"><a href="{{ route('material.info', $material->id) }}">{{$material->nombre}}</a></td>
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
