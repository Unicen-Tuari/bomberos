@extends('layouts.app')
@section('content')
    <h2>Bordered Table</h2>
    <p>The .table-bordered class adds borders to a table:</p>
    <div class="col-xs-12 col-md-12 table-responsive">
    <table class="table table-bordered">
        <tr>
          <td rowspan=2>B.V.</td>
          <td colspan=14 rowspan=2>TRENQUE LAUQUEN</td>
          <td colspan=2>INOBV</td>
          <td colspan=2>RENI</td>
          <td></td>
        </tr>
          <tr>
            <td colspan=1>3</td>
            <td colspan=1>3</td>
            <td colspan=3>BA</td>
          </tr>
        <tr>
          <td rowspan=2>PARTE DE SERVICIO</td>
          <td >01</td>
          <td >02</td>
          <td >03</td>
          <td >04</td>
          <td >05</td>
          <td >06</td>
          <td >07</td>
          <td >08</td>
          <td >09</td>
          <td >10</td>
          <td >11</td>
          <td >DIA</td>
          <td >MES</td>
          <td >AÑO</td>
          <td colspan=2 rowspan=2>P.S.N°</td>
          <td rowspan=2></td>
          <td rowspan=2></td>
          <td rowspan=2></td>
        </tr>
        <tr>
          <td><br></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>TIPO</td>
          <td colspan=14></td>
          <td colspan=2 rowspan=2>PRESENTE 01 AL 05</td>
          <td rowspan=2></td>
          <td rowspan=2></td>
          <td rowspan=2></td>
        </tr>
        <tr>
          <td>UBICACION</td>
          <td colspan=14></td>
        </tr>
        <tr>
          <td>HORA DE ALARMA</td>
          <td colspan=3>HORA DE SALIDA</td>
          <td colspan=2>MOVIL</td>
          <td colspan=7>A CARGO</td>
          <td colspan=2>HORA DE REGRESO</td>
          <td colspan=2 rowspan=2>DURACION EN MINUTOS</td>
          <td rowspan=2></td>
          <td rowspan=2></td>
          <td rowspan=2></td>
        </tr>
        <tr>
          <td><br></td>
          <td colspan=3></td>
          <td colspan=2></td>
          <td colspan=7></td>
          <td colspan=2></td>
        </tr>
        <tr>
          <td colspan=4>N° DE MOVILES</td>
          <td colspan=3>ILESOS</td>
          <td colspan=4>MUERTOS</td>
          <td colspan=2>LESIONADOS</td>
          <td colspan=2 rowspan=2>MINUTOS HOMBRE</td>
          <td colspan=1 rowspan=2></td>
          <td colspan=1 rowspan=2></td>
          <td rowspan=2></td>
          <td rowspan=2></td>
          <td rowspan=2></td>
        </tr>
        <tr>
          <td colspan=4 rowspan=3></td>
          <td colspan=3><br></td>
          <td colspan=4></td>
          <td colspan=2></td>
        </tr>
        <tr>
          <td colspan=3>SUP (HAS)</td>
          <td colspan=4>QUEMADOS</td>
          <td colspan=2>OTROS</td>
          <td colspan=2>COMBUSTIBLE</td>
          <td colspan=5>COLABORO CUARTEL</td>
        </tr>
        <tr>
          <td colspan=3><br></td>
          <td colspan=4></td>
          <td colspan=2></td>
          <td colspan=2></td>
          <td colspan=5></td>
        </tr>
        <tr>
          <td></td>
        </tr>
    </table>
      </div>
@endsection
