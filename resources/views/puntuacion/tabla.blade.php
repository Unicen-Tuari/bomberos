<table  class="table table-bordered" id="tablaPuntuacion">
  <thead><!--Titulos de la tabla-->
    <tr>
      <th colspan="2" class="text-center">Periodo {{config('selects.meses')[$mes].'-'.$año}}</th>
      <th colspan="3" class="text-center">ASIST OBLIG</th>
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
    @if ($bombero->puntuo($mes,$año))
    <tr>
      <td class="text-center">{{$bombero->nro_legajo}}
      <a class="glyphicon glyphicon-edit" href="{{ route('puntuacion.edit', $bombero->puntuacion($mes,$año)->id) }}"></a></td>
      <td class="text-center">{{$bombero->apellido.' '.$bombero->nombre}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->ao_cant}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->ao_punt}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->ao_acad}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->accid_cant}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->accid_punt}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->dedicacion}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->guar_cant}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->guar_punt}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->especiales}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->licencia}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->castigo}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->total}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->detalle}}</td>
    </tr>
    @else
    <tr>
      <td class="text-center">{{$bombero->nro_legajo}}</td>
      <td class="text-center">{{$bombero->apellido.' '.$bombero->nombre}}</td>
      <td class="text-center">0</td>
      <td class="text-center">0</td>
      <td class="text-center">0</td>
      <td class="text-center">0</td>
      <td class="text-center">0</td>
      <td class="text-center">0</td>
      <td class="text-center">0</td>
      <td class="text-center">0</td>
      <td class="text-center">0</td>
      <td class="text-center">0</td>
      <td class="text-center">0</td>
      <td class="text-center">0</td>
      <td class="text-center"> </td>
    </tr>
    @endif
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td class="text-center" colspan="15"> lista de bomberos activos </td>
    </tr>
  </tfoot>
  <br>
</table>
