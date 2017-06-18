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
  <tbody>
    @php
      // variables para la sumatorias total del mes
      $cantVehiculos = $cantCombustible = $cantBomberos = $totalMinutos = $totalMinutosBomberos = $cantIlesos = $cantMuertos = $cantQuemados = $cantLesionados = $cantOtros =0;
      $tipo1 = $tipo2 = $tipo3 = $tipo4 = $tipo5 = $tipo6 = $tipo7 = $tipo8 = $tipo9 = $tipo10 = $tipo11 = $has= $general = 0;
    @endphp
    @foreach ($servicios as $servicio)
      @if($servicio->hora_regreso)
        <tr>
          <th class="text-center">{{$servicio->id}}</th>
          <th class="text-center">{{\Carbon\Carbon::parse($servicio->hora_alarma)->format('d/m/y')}}</th>
          <th class="text-center">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->hora_alarma)->toTimeString()}}</th>
          <th class="text-center">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->hora_regreso)->toTimeString()}}</th>
          <th class="text-center">{{count($servicio->vehiculos)}}</th>
          <th class="text-center">{{round($servicio->combustible, 2)}}</th>
          @php
            $cantVehiculos+= count($servicio->vehiculos);
            $cantCombustible+= $servicio->combustible;
            $bomberosPresentes= count($servicio->bomberos);
            $cantBomberos+=$bomberosPresentes;

            $cantMinutos=\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->hora_regreso)->diffInMinutes(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->hora_alarma));
            $totalMinutos+=$cantMinutos;
            $totalMinutosBomberos+=$cantMinutos*$bomberosPresentes;
            $cantIlesos+=$servicio->ilesos; $cantMuertos+=$servicio->muertos; $cantQuemados+=$servicio->quemados; $cantLesionados+=$servicio->lesionados; $cantOtros+=$servicio->otros;
          @endphp
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
            @php $tipo1++; @endphp
          @else
            <th class="text-center">-</th>
          @endif
          @if($servicio->tipo_servicio_id==2)
            <th class="text-center">X</th>
            @php $tipo2++; @endphp
          @else
            <th class="text-center">-</th>
          @endif
          @if($servicio->tipo_servicio_id==3)
            <th class="text-center">X</th>
            @php $tipo3++; @endphp
          @else
            <th class="text-center">-</th>
          @endif
          @if($servicio->tipo_servicio_id==4)
            <th class="text-center">X</th>
            @php $tipo4++; @endphp
          @else
            <th class="text-center">-</th>
          @endif
          @if($servicio->tipo_servicio_id==5)
            <th class="text-center">X</th>
            @php $tipo5++; @endphp
          @else
            <th class="text-center">-</th>
          @endif
          @if($servicio->tipo_servicio_id==6)
            <th class="text-center">X</th>
            @php $tipo6++; @endphp
          @else
            <th class="text-center">-</th>
          @endif
          @if($servicio->tipo_servicio_id==7)
            <th class="text-center">X</th>
            @php $tipo7++; @endphp
          @else
            <th class="text-center">-</th>
          @endif
          @if($servicio->tipo_servicio_id==8)
            <th class="text-center">X</th>
            @php $tipo8++; @endphp
          @else
            <th class="text-center">-</th>
          @endif
          @if($servicio->tipo_servicio_id==9)
            <th class="text-center">X</th>
            @php $tipo9++; @endphp
          @else
            <th class="text-center">-</th>
          @endif
          @if($servicio->tipo_servicio_id==10)
            <th class="text-center">X</th>
            @php $tipo10++; @endphp
          @else
            <th class="text-center">-</th>
          @endif
          @if($servicio->tipo_servicio_id==11)
            <th class="text-center">X</th>
            @php $tipo11++; @endphp
          @else
            <th class="text-center">-</th>
          @endif
          @php
            $has+=$servicio->Superficie;
          @endphp
          <th class="text-center">{{$servicio->Superficie}}</th>
          @if($servicio->tipo_alarma==3)
            <th class="text-center">X</th>
            @php $general++ @endphp
          @else
            <th class="text-center">-</th>
          @endif
          <th class="text-center">
            <a reconocimiento='{{$servicio->reconocimiento}}' disposiciones='{{$servicio->disposiciones}}'
            href="" class="glyphicon glyphicon-eye-open descripcion" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
          </a></th>
        </tr>
      @endif
    @endforeach
    </tbody>
    <tfoot>
      <tr>
          <th class="text-center" colspan="4">TOTAL</th>
          <th class="text-center">{{$cantVehiculos}}</th>
          <th class="text-center">{{round($cantCombustible, 2)}}</th>
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
          <th class="text-center">{{$has}}</th>
          <th class="text-center">{{$general}}</th>
          <th class="text-center">{{count($servicios)}}</th>
      </tr>
      <tr>
        <td class="text-center" colspan="28"> Estadisticas de {{config('selects.meses')[$mes].' - '.$año}}</td>
      </tr>
  </tfoot>
  <br>
</table>

{{-- Inicio MODAL --}}
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content form-horizontal" id="puntuacion">
      <div class="form-group">
        <h4 class="text-center" > Descripcion</h4>
        {!! Form::label('disposiciones', 'Reconocimiento',['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-9">
          {!! Form::textarea('reconocimiento', null, ['class' => 'form-control', 'rows' => '4','id'=>'reconocimiento']) !!}
        </div>
        <div class="form-group"></div>
        {!! Form::label('disposiciones', 'Disposiciones',['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-9">
          {!! Form::textarea('disposiciones', null, ['class' => 'form-control', 'rows' => '4','id'=>'disposiciones']) !!}
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-10 col-sm-1">
          <button class="glyphicon glyphicon-remove" data-dismiss="modal"></button>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- Fin --}}

{!! Html::script('assets/js/ajaxmodal.js') !!}
