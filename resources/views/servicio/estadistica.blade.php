@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Lista de bomberos
    </div>
    <div class="panel-body">
      <table  class="table table-bordered">
        <thead><!--Titulos de la tabla-->
          <tr>
            <th class="text-center" rowspan="2">Nº servicio</th>
            <th class="text-center" rowspan="2">Fecha</th>
            <th class="text-center" rowspan="2">Hora alarma</th>
            <th class="text-center" rowspan="2">Hora regreso</th>
            <th class="text-center" rowspan="2">Cantidad Moviles</th>
            <th class="text-center" rowspan="2">Cantidad Combustible</th>
            <th class="text-center" rowspan="2">Presentes</th>
            <th class="text-center" rowspan="2">Duracion Minutos</th>
            <th class="text-center" rowspan="2">Minutos Hombres</th>
            <th class="text-center" scope="col" colspan="5">Victimas</th>
            <th class="text-center" scope="col" colspan="13">Tipos de servicios</th>
            <th class="text-center" rowspan="2">Descripcion</th>
          </tr>
          <tr>
            <th>V</th>
            <th>M</th>
            <th>Q</th>
            <th>L</th>
            <th>O</th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
            <th>10</th>
            <th>11</th>
            <th>Has</th>
            <th>G.</th>
          </tr>
        </thead>
        <tbody><!--Contenido de la tabla-->
          <th class="text-center">aa</th>
          <th class="text-center">aa</th>
          <th class="text-center">aa</th>
          <th class="text-center">aa</th>
          <th class="text-center">aa</th>
          <th class="text-center">aa</th>
          <th class="text-center">aa</th>
          <th class="text-center">aa</th>
          <th class="text-center">aa</th>
          <th class="text-center">0</th>
          <th class="text-center">0</th>
          <th class="text-center">0</th>
          <th class="text-center">0</th>
          <th class="text-center">0</th>
          <th class="text-center">X</th>
          <th class="text-center">X</th>
          <th class="text-center">X</th>
          <th class="text-center">X</th>
          <th class="text-center">X</th>
          <th class="text-center">X</th>
          <th class="text-center">X</th>
          <th class="text-center">X</th>
          <th class="text-center">X</th>
          <th class="text-center">X</th>
          <th class="text-center">X</th>
          <th class="text-center">X</th>
          <th class="text-center">X</th>
          <th class="text-center">aa</th>
          @foreach ($servicios as $servicio)
            @if($servicio->hora_regreso)
            <tr>
              <th class="text-center">{{$servicio->id}}</th>
              <th class="text-center">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->hora_alarma)->toDateString()}}</th>
              <th class="text-center">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->hora_alarma)->toTimeString()}}</th>
              <th class="text-center">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->hora_regreso)->toTimeString()}}</th>
              <th class="text-center">{{count($servicio->vehiculos)}}</th>
              <th class="text-center">{{$servicio->combustible}}</th>
              <th class="text-center">{{count($servicio->bomberos()}}</th>
              <th class="text-center">aa</th>
              <th class="text-center">aa</th>
              <th class="text-center">{{$servicio->ilesos}}</th>
              <th class="text-center">{{$servicio->muertos}}</th>
              <th class="text-center">{{$servicio->quemados}}</th>
              <th class="text-center">{{$servicio->lesionados}}</th>
              <th class="text-center">{{$servicio->otros}}</th>
              <th class="text-center">X</th>
              <th class="text-center">X</th>
              <th class="text-center">X</th>
              <th class="text-center">X</th>
              <th class="text-center">X</th>
              <th class="text-center">X</th>
              <th class="text-center">X</th>
              <th class="text-center">X</th>
              <th class="text-center">X</th>
              <th class="text-center">X</th>
              <th class="text-center">X</th>
              <th class="text-center">X</th>
              <th class="text-center">X</th>
              <th class="text-center">aa</th>
            </tr>
            @endif
          @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td class="text-center" colspan="9"> lista de bomberos activos </td>
            </tr>
          </tfoot>
          <br>
        </table>
        <div class="text-center">
          totales
        </div>
    </div>
  </div>
</article>
@endsection
