@extends('layouts.app')

@section('content')

<article class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Ultimos servicios realizados
    </div>
    <div class="panel-body">
      <table  class="table table-bordered">
        <thead><!--Titulos de la tabla-->
          <tr>
            <th class="text-center">Tipo de servicio</th>
            <th class="text-center">Direccion</th>
            <th class="text-center">Hora de regreso</th>
            <th colspan="2"></th>
          </tr>
        </thead>
        <tbody><!--Contenido de la tabla-->
          @foreach ($servicios as $servicio)
            @if ($servicio->hora_regreso)
              <tr>
                <td class="text-center">{{$servicio->tipoServicio->nombre}}</td>
                <td class="text-center">{{$servicio->direccion}}</td>
                <td class="text-center">{{$servicio->hora_regreso}}</td>
                <td class="text-center">
                  {{ Form::open(['route' => ['servicio.destroy', $servicio->id], 'method' => 'delete']) }}
                      <button type="submit" class="btn glyphicon glyphicon-trash eliminar"></button>
                  {{ Form::close() }}
                </td>
                {{-- finalizarActivo implementar Update --}}
                <td class="text-center"><a class="glyphicon glyphicon-edit" href="{{ route('servicio.edit', $servicio->id) }}"></a></td>
              </tr>
            @endif
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</article>
@endsection
