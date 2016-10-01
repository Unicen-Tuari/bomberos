@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Lista de vehiculos
    </div>
    <div class="panel-body">
      <table  class="table table-bordered">
        <thead><!--Titulos de la tabla-->
          <tr>
            <th>
              Vehiculos
            </th>
          </tr>
        </thead>
        <tbody><!--Contenido de la tabla-->
          @foreach ($vehiculos as $vehiculo)
            <tr>
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
              <td class="text-center" colspan="9"> Lista de vehiculos</td>
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
