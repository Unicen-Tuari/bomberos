<table  class="table table-bordered">
  <thead><!--Titulos de la tabla-->
    <tr>
      <th colspan="2" class="text-center">Periodo {{config('selects.meses')[$mes].'-'.$año}}</th>
      <th colspan="3" class="text-center">ASIST OBLIG</th>
      <th colspan="2" class="text-center">ACCID. {{count($servicios)}}</th>
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
      <th colspan="2" class="text-center">Min/OI/Pts</th>
      <th class="text-center">ACAD</th>
      <th class="text-center">Cant.</th>
      <th class="text-center">Ptos.</th>
      <th class="text-center">OI ACAD</th>
      <th class="text-center">Min</th>
      <th class="text-center">Ptos.</th>
      <th class="text-center">Ptos.</th>
      <th class="text-center">Ptos.</th>
      <th class="text-center">Ptos.</th>
      <th class="text-center">Ptos.</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($bomberos as $bombero)
    <tr>
      <th class="text-center">{{$bombero->nro_legajo}}</th>
      <th class="text-center">{{$bombero->apellido.' '.$bombero->nombre}}</th>
      <th class="text-center">1320</th>
      <th class="text-center">12</th>
      <th class="text-center">5,00</th>
      <th class="text-center">{{count($bombero->cantServicios($mes,$año))}}</th>
      <th class="text-center">{{(40/count($servicios))*count($bombero->cantServicios($mes,$año))}}</th>
      <th class="text-center">15</th>
      <th class="text-center">430,00</th>
      <th class="text-center">10,00</th>
      <th class="text-center"> </th>
      <th class="text-center">35,00</th>
      <th class="text-center"> </th>
      <th class="text-center">452</th>
      <th class="text-center">30 dias lic. Anual </th>
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
