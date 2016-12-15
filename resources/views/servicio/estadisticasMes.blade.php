<table  class="table table-striped">
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
  <tbody>
    <?php
      $cantVehiculos = $cantCombustible = $cantBomberos = $totalMinutos = $totalMinutosBomberos = $cantIlesos = $cantMuertos = $cantQuemados = $cantLesionados = $cantOtros =0;
      $tipo1 = $tipo2 = $tipo3 = $tipo4 = $tipo5 = $tipo6 = $tipo7 = $tipo8 = $tipo9 = $tipo10 = $tipo11 = 0;
    ?>
    @foreach ($servicios as $servicio)
      @if($servicio->hora_regreso)
        <tr>
          <th class="text-center">{{$servicio->id}}</th>
          <th class="text-center">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->hora_alarma)->toDateString()}}</th>
          <th class="text-center">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->hora_alarma)->toTimeString()}}</th>
          <th class="text-center">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->hora_regreso)->toTimeString()}}</th>
          <th class="text-center">{{count($servicio->vehiculos)}}</th>
          <th class="text-center">{{$servicio->combustible}}</th>
          <?php
            $cantVehiculos+= count($servicio->vehiculos);
            $cantCombustible+= $servicio->combustible;
            $bomberosPresentes= count($servicio->bomberos);
            $cantBomberos+=$bomberosPresentes;

            $cantMinutos=\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->hora_regreso)->diffInMinutes(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->hora_alarma));
            $totalMinutos+=$cantMinutos;
            $totalMinutosBomberos+=$cantMinutos*$bomberosPresentes;
            $cantIlesos+=$servicio->ilesos; $cantMuertos+=$servicio->muertos; $cantQuemados+=$servicio->quemados; $cantLesionados+=$servicio->lesionados; $cantOtros+=$servicio->otros;
          ?>
          <th class="text-center">{{$bomberosPresentes}}</th>
          <th class="text-center">{{$cantMinutos}}</th>
          <th class="text-center">{{$cantMinutos*$bomberosPresentes}}</th>
          <th class="text-center">{{$servicio->ilesos}}</th>
          <th class="text-center">{{$servicio->muertos}}</th>
          <th class="text-center">{{$servicio->quemados}}</th>
          <th class="text-center">{{$servicio->lesionados}}</th>
          <th class="text-center">{{$servicio->otros}}</th>
          @if($servicio->tipo_servicio_id==1)
            <th class="text-center">X</th>
            <?php $tipo1++; ?>
          @else
            <th></th>
          @endif
          @if($servicio->tipo_servicio_id==2)
            <th class="text-center">X</th>
            <?php $tipo2++; ?>
          @else
            <th></th>
          @endif
          @if($servicio->tipo_servicio_id==3)
            <th class="text-center">X</th>
            <?php $tipo3++; ?>
          @else
            <th></th>
          @endif
          @if($servicio->tipo_servicio_id==4)
            <th class="text-center">X</th>
            <?php $tipo4++; ?>
          @else
            <th></th>
          @endif
          @if($servicio->tipo_servicio_id==5)
            <th class="text-center">X</th>
            <?php $tipo5++; ?>
          @else
            <th></th>
          @endif
          @if($servicio->tipo_servicio_id==6)
            <th class="text-center">X</th>
            <?php $tipo6++; ?>
          @else
            <th></th>
          @endif
          @if($servicio->tipo_servicio_id==7)
            <th class="text-center">X</th>
            <?php $tipo7++; ?>
          @else
            <th></th>
          @endif
          @if($servicio->tipo_servicio_id==8)
            <th class="text-center">X</th>
            <?php $tipo8++; ?>
          @else
            <th></th>
          @endif
          @if($servicio->tipo_servicio_id==9)
            <th class="text-center">X</th>
            <?php $tipo9++; ?>
          @else
            <th></th>
          @endif
          @if($servicio->tipo_servicio_id==10)
            <th class="text-center">X</th>
            <?php $tipo10++; ?>
          @else
            <th></th>
          @endif
          @if($servicio->tipo_servicio_id==11)
            <th class="text-center">X</th>
            <?php $tipo11++; ?>
          @else
            <th></th>
          @endif
          @if($servicio->tipo_servicio_id==12)
            <th class="text-center">X</th>
          @else
            <th></th>
          @endif
          @if($servicio->tipo_servicio_id==13)
            <th class="text-center">X</th>
          @else
            <th></th>
          @endif
          <th class="text-center">{{$servicio->descripcion}}</th>
        </tr>
      @endif
    @endforeach
    </tbody>
    <tfoot>
      <tr>
          <th class="text-center" colspan="4">TOTAL</th>
          <th class="text-center">{{$cantVehiculos}}</th>
          <th class="text-center">{{$cantCombustible}}</th>
          <th class="text-center">{{$cantBomberos}}</th>
          <th class="text-center">{{$totalMinutos}}</th>
          <th class="text-center">{{$totalMinutosBomberos}}</th>
          <th class="text-center">{{$cantIlesos}}</th>
          <th class="text-center">{{$cantMuertos}}</th>
          <th class="text-center">{{$cantQuemados}}</th>
          <th class="text-center">{{$cantLesionados}}</th>
          <th class="text-center">{{$cantOtros}}</th>
          <th class="text-center">{{$tipo1}}</th>
          <th class="text-center">{{$tipo2}}</th>
          <th class="text-center">{{$tipo3}}</th>
          <th class="text-center">{{$tipo4}}</th>
          <th class="text-center">{{$tipo5}}</th>
          <th class="text-center">{{$tipo6}}</th>
          <th class="text-center">{{$tipo7}}</th>
          <th class="text-center">{{$tipo8}}</th>
          <th class="text-center">{{$tipo9}}</th>
          <th class="text-center">{{$tipo10}}</th>
          <th class="text-center">{{$tipo11}}</th>
          <th class="text-center">#</th>
          <th class="text-center">#</th>
          <th class="text-center"></th>
      </tr>
      <tr>
        <td class="text-center" colspan="28"> Estadisticas de #</td>
      </tr>
  </tfoot>
  <br>
</table>
