@extends('layouts.app')

@section('content')
<div class="container">
<div class="panel panel-default">
  <div class="panel-heading">
    Lista de bomberos
  </div>
  <div class="panel-body">
    <table  class="table table-bordered">
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
        @foreach ($bomberos as $bombero)
          <tr>
            <td class="text-center">{{$bombero->nro_legajo}}</td>
            <td class="text-center">{{$bombero->jerarquia}}</td>
            <td class="text-center">{{$bombero->apellido}}</td>
            <td class="text-center">{{$bombero->nombre}}</td>
            <td class="text-center">{{$bombero->direccion}}</td>
            <td class="text-center">{{$bombero->telefono}}</td>
            <td class="text-center">{{$bombero->fecha_nacimiento}}</td>
            <td class="text-center"><span class="glyphicon glyphicon-trash"></span></td>
            <td class="text-center"><span class="glyphicon glyphicon-edit"></span></td>
          </tr>
        @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td class="text-center" colspan="9"> lista de bomberos activos </td>
          </tr>
        </tfoot>
        <br>
      </table>
  </div>
</div>
</div>
@endsection
