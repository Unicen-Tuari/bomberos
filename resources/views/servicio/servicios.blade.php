@extends('layouts.app')

@section('content')

<article class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Inicio Alerta
    </div>
    <div class="panel-body">
      <table  class="table table-bordered">
        <thead><!--Titulos de la tabla-->
          <tr>
            <th class="text-center">Tipo de servicio</th>
            <th class="text-center">Direccion</th>
            <th class="text-center">Hora de alarma</th>
            <th colspan="2"></th>
          </tr>
        </thead>
        <tbody><!--Contenido de la tabla-->
          @foreach ($servicios as $servicio)
            <tr>
              <td class="text-center">{{$servicio->tipo_servicio_id}}</td>
              <td class="text-center">{{$servicio->direccion}}</td>
              <td class="text-center">{{$servicio->hora_alarma}}</td>
              <td class="text-center">
                {{ Form::open(['route' => ['servicio.destroy', $servicio->id], 'method' => 'delete']) }}
                    <button type="submit" class="btn glyphicon glyphicon-trash eliminar"></button>
                {{ Form::close() }}
              </td>
              <td class="text-center"><a class="glyphicon glyphicon-edit" href="{{ route('servicio.mostrar', $servicio->id) }}"></a></td>
            </tr>
          @endforeach
        </tbody>
          <tfoot>
            <tr>
              <td class="text-center" colspan="5"> Lista de bomberos activos </td>
            </tr>
          </tfoot>
          <br>
        </table>
    </div>
  </div>
</article>
@endsection
