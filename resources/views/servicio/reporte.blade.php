@extends('layouts.app')
@section('content')
    <h2>Bordered Table</h2>
    <p>The .table-bordered class adds borders to a table:</p>
    <div class="col-xs-12 col-md-12 table-responsive">
    <table class="table table-bordered">
        <tr>
          <td rowspan=2>B.V.</td>
          <td rowspan=2>TRENQUE LAUQUEN</td>
          <td colspan=2>INOBV</td>
          <td>RENI</td>
          <td></td>
        </tr>
          <tr>
            <td>3</td>
            <td>3</td>
            <td colspan=2>BA</td>
          </tr>
          <tr>
            <td rowspan=2>PARTE DE SERVICIO</td>
          </tr>
    </table>

    <table class="table table-bordered">
      <tr>
        <tr>
          <td rowspan=2>B.V.</td>
          <td rowspan=2>TRENQUE LAUQUEN</td>
          <td colspan=2>INOBV</td>
          <td>RENI</td>
          <td></td>
        </tr>
          <tr>
            <td>3</td>
            <td>3</td>
            <td colspan=2>BA</td>
          </tr>
      </tr>
          <tr>
            <td rowspan=2>PARTE DE SERVICIO</td>
            <td rowspan=2>PARTE DE SERVICIO</td>
            <td rowspan=2>PARTE DE SERVICIO</td>
            <td rowspan=2>PARTE DE SERVICIO</td>
          </tr>
    </table>
      </div>
@endsection
