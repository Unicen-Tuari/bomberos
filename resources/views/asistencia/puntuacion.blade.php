@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-table" aria-hidden="true"></span>
      <h4>Puntuaciones</h4>
    </div>
    <div class="panel-body">
      <table  class="table table-bordered">
        <thead><!--Titulos de la tabla-->
          <tr>
            <th colspan="2" class="text-center">Periodo</th>
            <th colspan="3" class="text-center">asist Oblig</th>
            <th colspan="2" class="text-center">Accid 14</th>
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
          {{-- @foreach ($bomberos as $bombero) --}}
          <tr>
            <th class="text-center">033-041</th>
            <th class="text-center">Apellido Nombre</th>
            <th class="text-center">1320</th>
            <th class="text-center">12</th>
            <th class="text-center">5,00</th>
            <th class="text-center">13</th>
            <th class="text-center">25.57</th>
            <th class="text-center">15</th>
            <th class="text-center">430,00</th>
            <th class="text-center">10,00</th>
            <th class="text-center"> </th>
            <th class="text-center">35,00</th>
            <th class="text-center"> </th>
            <th class="text-center">452</th>
            <th class="text-center">15 dias lic. Anual </th>
          </tr>
          {{-- @endforeach --}}
        </tbody>
        <tfoot>
          <tr>
            <td class="text-center" colspan="9"> lista de bomberos activos </td>
          </tr>
        </tfoot>
        <br>
        </table>
        <div class="text-center">
        </div>
    </div>
  </div>
</article>
@endsection
