@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-truck" aria-hidden="true"></span>
      <h4>Vehiculos</h4>
    </div>

    <div class="col-sm-12">
      <div class="col-md-6 col-sm-12 text-right" style="padding-top: 20px;">
        {{Form::model(Request::all(),['route' => 'vehiculo.index', 'class' => 'form-horizontal', 'method' => 'GET'])}}
          <div class="col-sm-3 {{ $errors->has('movil') ? ' has-error' : '' }}">
            {{Form::text('movil', null, ['placeholder'=>"1", 'class' => 'form-control'])}}
            @if ($errors->has('movil'))
                <span class="help-block">
                    <strong>{{ $errors->first('movil') }}</strong>
                </span>
            @endif
          </div>
          <div class="col-sm-3">
            {{Form::select('estado',[0=>'Estado'] +config('selects.estadovehiculo'), null, ['class' => 'form-control'])}}
          </div>
          <div class="col-sm-5">
            {{Form::text('patente', null, ['placeholder'=>"Patente", 'class' => 'form-control'])}}
          </div>
          <div class="col-sm-1">
            {{Form::submit('Buscar', ['class' => 'btn btn-primary']) }}
          </div>
        {{Form::close()}}
      </div>
    </div>

    <div class="panel-body">
      <table  class="table table-bordered">
        <thead><!--Titulos de la tabla-->
          <tr>
            <th class="text-center">
              Nro. de Unidad
            </th>
            <th class="text-center">
              Patente
            </th>
            <th class="text-center">
              Cant. Materiales
            </th>
            <th class="text-center" colspan="2">
            </th>
          </tr>
        </thead>
        <tbody><!--Contenido de la tabla-->
          @foreach ($vehiculos as $vehiculo)
            @if ($vehiculo->estado==1)
            <tr class="success">
            @else
            <tr class="danger">
            @endif
              <td class="text-center"><a href="{{ route('vehiculo.show', $vehiculo->id) }}">{{$vehiculo->num_movil}}</a>
              </td>
              <td class="text-center">{{$vehiculo->patente}}</td>
              <td class="text-center">{{count($vehiculo->materiales)}}</td>
              @if (Auth::user()->admin)
                <td class="text-center">
                @if (count($vehiculo->servicios)==0)
                {{ Form::open(['route' => ['vehiculo.destroy', $vehiculo->id], 'method' => 'delete']) }}
                  <button type="submit" class="glyphicon glyphicon-trash"></button>
                {{ Form::close() }}
                @else
                  <button type="submit" class="glyphicon glyphicon-ban-circle" title="Participo en Servicio"></button>
                @endif
                </td>
                <td class="text-center"><a class="glyphicon glyphicon-edit" href="{{ route('vehiculo.edit', $vehiculo->id) }}"></a></td>
              @else
                <td class="text-center" colspan="2">
                  <button type="submit" class="glyphicon glyphicon-ban-circle" title="Sin permisos para eliminar/modificar"></button>
                </td>
              @endif
            </tr>
          @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td class="text-center" colspan="5"> Lista de vehiculos</td>
            </tr>
          </tfoot>
          <br>
        </table>
        <div class="text-center">
          {{ $vehiculos->appends(Request::all())->render()}}
        </div>
    </div>
  </div>
</article>
@endsection
