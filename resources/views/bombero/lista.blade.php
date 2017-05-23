@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-users" aria-hidden="true"></span>
      <h4>Bomberos</h4>
    </div>
    <div class="panel-body">
      <table class="table table-striped">
        <thead><!--Titulos de la tabla-->
          <tr>
            <th class="text-center">Numero Legajo</th>
            <th class="text-center">Jerarquia</th>
            <th class="text-center">Apellido</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Direccion</th>
            <th class="text-center">Telefono</th>
            <th class="text-center">Fecha nacimiento</th>
            <th colspan="2"></th>
          </tr>
        </thead>
        <tbody><!--Contenido de la tabla-->
          @php
            $jerarquias=[1 => 'Oficial Superior',2 => 'Oficial Jefe',3 => 'Oficial Subalterno',4 => 'Suboficial Superior',5 => 'Suboficial Subalterno',6 => 'Bombero',7 => 'Cadete',8 => 'Aspirante']
          @endphp
          @foreach ($bomberos as $bombero)
            @if ($bombero->activo)
            <tr>
            @else
            <tr class="danger">
            @endif
              <td class="text-center">{{$bombero->nro_legajo}}</td>
              <td class="text-center">{{$jerarquias[$bombero->jerarquia]}}</td>
              <td class="text-center">{{$bombero->apellido}}</td>
              <td class="text-center">{{$bombero->nombre}}</td>
              <td class="text-center">{{$bombero->direccion}}</td>
              <td class="text-center">{{$bombero->telefono}}</td>
              <td class="text-center">{{$bombero->fecha_nacimiento}}</td>
              @if (Auth::user()->admin)
                <td class="text-center">
                  {{ Form::open(['route' => ['bombero.destroy', $bombero->id], 'method' => 'DELETE']) }}
                      <button type="submit" class="btn glyphicon glyphicon-trash simulara"></button>
                  {{ Form::close() }}
                </td>
                <td class="text-center"><a class="glyphicon glyphicon-edit" href="{{ route('bombero.edit', $bombero->id) }}"></a></td>
              @else
                <td class="text-center" colspan="2">
                  <button type="submit" class="btn glyphicon glyphicon-ban-circle ban" title="Sin permisos para eliminar/modificar"></button>
                </td>
              @endif
            </tr>
          @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td class="text-center" colspan="9"> Bomberos activos </td>
            </tr>
          </tfoot>
          <br>
        </table>
        <div class="text-center">
          {{ $bomberos->render()}}
        </div>
    </div>
  </div>
</article>
@endsection
