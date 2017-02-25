@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-list" aria-hidden="true"></span>
      <h4>Vehiculos</h4>
    </div>
    <div class="panel-body">
      <table  class="table table-bordered">
        <thead><!--Titulos de la tabla-->
          <tr>
            <th>
              Nro. de Unidad
            </th>
            <th>
              Patente
            </th>
            <th colspan="2">
            </th>
          </tr>
        </thead>
        <tbody><!--Contenido de la tabla-->
          @foreach ($vehiculos as $vehiculo)
            @if ($vehiculo->activo)
            <tr class="success">
            @else
            <tr class="danger">
            @endif
              <td class="text-center"><a href="{{ route('vehiculo.info', $vehiculo->id) }}">{{$vehiculo->num_movil}}</a></td>
              <td class="text-center">{{$vehiculo->patente}}</td>
              <td class="text-center">
                {{ Form::open(['route' => ['vehiculo.destroy', $vehiculo->id], 'method' => 'delete']) }}
                    <button type="submit" class="btn glyphicon glyphicon-trash eliminar"></button>
                {{ Form::close() }}
              </td>
              <td class="text-center"><a class="glyphicon glyphicon-edit" href="{{ route('vehiculo.edit', $vehiculo->id) }}"></a></td>
            </tr>
          @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td class="text-center" colspan="4"> Lista de vehiculos</td>
            </tr>
          </tfoot>
          <br>
        </table>
        <div class="text-center">
          {{ $vehiculos->render()}}
        </div>
    </div>
  </div>
</article>
@endsection
