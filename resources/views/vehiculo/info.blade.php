@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Materiales del movil N° {{$vehiculo->num_movil}}
    </div>
    <div class="panel-body">
      <div class="col-sm-5 form-horizontal">
        <br>
        <div class="form-group">
          {!! Form::label('patente', 'Patente',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-7">
              {!! Form::text('patente', $vehiculo->patente, ['class' => 'form-control','disabled']) !!}
          </div>
        </div>

        <div class="form-group ">
          {!! Form::label('num_movil', 'Numero de Movil',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-7">
              {!! Form::text('num_movil', $vehiculo->num_movil, ['class' => 'form-control','disabled']) !!}
          </div>
        </div>

        <div class="form-group">
          {!! Form::label('estado', "Estado", ['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-7">
            {{Form::select('estado',config('selects.estadovehiculo'), $vehiculo->estado, ['class' => 'form-control','disabled'])}}
          </div>
        </div>

        <div class="form-group">
          {!! Form::label('detalle', 'Detalle',['class' => 'col-sm-4 control-label']) !!}
          <div class="col-sm-7">
              {!! Form::textarea('detalle',  $vehiculo->detalle, ['class' => 'form-control' , 'rows' => '10','disabled']) !!}
          </div>
        </div>

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
              <td class="text-center"><a href="{{ route('material.show', $material->id) }}">{{$material->nombre}}</a></td>
              @if (Auth::user()->admin)
                <td class="text-center"><a class="glyphicon glyphicon-edit" href="{{ route('material.edit', $material->id) }}"></a></td>
              @else
                <td class="text-center">
                  <button type="submit" class="glyphicon glyphicon-ban-circle" title="Sin permisos para eliminar/modificar"></button>
                </td>
              @endif
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
