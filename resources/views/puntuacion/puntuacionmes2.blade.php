<table  class="table table-bordered" id="tablaPuntuacion">
  <thead><!--Titulos de la tabla-->
    <tr>
      <th colspan="2" class="text-center">Periodo {{config('selects.meses')[$mes].'-'.$año}}</th>
      <th colspan="3" class="text-center">ASIST OBLIG</th>
      @php
        $cantserv=count($servicios);
      @endphp
      <th colspan="2" class="text-center">ACCID. {{$cantserv}}</th>
      <th class="text-center">Dedicación</th>
      <th colspan="2" class="text-center">Asist. Guardias</th>
      <th class="text-center">Especiales</th>
      <th class="text-center">Licencia</th>
      <th class="text-center">Castigo</th>
      <th class="text-center">Total</th>
      <th rowspan="2" class="text-center">Observaciones</th>
    </tr>
    <tr>
      <th class="text-center">leg.</th>
      <th class="text-center">Apellido Nombre</th>
      <th colspan="2" class="text-center">Cant./OI/Pts</th>
      <th class="text-center">ACAD</th>
      <th class="text-center">Cant.</th>
      <th class="text-center">Ptos.</th>
      <th class="text-center">OI ACAD</th>
      <th class="text-center">Cant.</th>
      <th class="text-center">Ptos.</th>
      <th class="text-center">Ptos.</th>
      <th class="text-center">Ptos.</th>
      <th class="text-center">Ptos.</th>
      <th class="text-center">Ptos.</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($bomberos as $bombero)
    @php
      $accid=$bombero->accidentales($mes,$año);
      $guardia=$bombero->guardias($mes,$año);
      $asistencia=$bombero->asistenciasmes($mes,$año);
      $puntasis=0;
      if ($dias!=0) {
        $puntasis=(10/$dias)*$asistencia;
      }
      $puntuacion=0;
      if ($accid!=0) {
        if ($cantserv<7 && $cantserv!=$accid) {
          $puntuacion=35-(5*($cantserv-$accid));
        }else {
          $puntuacion=(35/$cantserv)*$accid;
        }
      }
    @endphp
    <tr>
      <td class="text-center">{{$bombero->nro_legajo}}</td>
      <td class="text-center">{{$bombero->apellido.' '.$bombero->nombre}}</td>
      <td class="text-center">{{$asistencia}}</td>
      <td class="text-center">{{$puntasis}}</td>
      <td class="text-center">20,00</td>
      <td class="text-center">{{$accid}}</td>
      <td class="text-center">{{$puntuacion}}</td>
      <td class="text-center">15</td>
      <td class="text-center">{{$guardia}}</td>
      <td class="text-center">10,00</td>
      <td class="text-center">10,00</td>
      <td class="text-center">70,00</td>
      <td class="text-center"> </td>
      <td class="text-center">452</td>
      <td class="text-center">30 dias lic. Anual </td>
    </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td class="text-center" colspan="15"> lista de bomberos activos </td>
    </tr>
  </tfoot>
  <br>
</table>
