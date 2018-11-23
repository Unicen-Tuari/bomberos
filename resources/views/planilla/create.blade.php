@extends('layouts.app')
@section('content')
  <article class="col-sm-10" >
  <div class="container" id="printeable">
      <div class="row">
        <div class="col-sm-10">
          <p>Jefe de Guardia N° --- responsable de las actividades del Orden Interno durante la semana del --- al --- de --- de 2015 designo y notifico al personal a mi cargo con las siguientes responsabilidades.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2 col-sm-offset-1">
          <div class="onBorder">
            <p>Vehiculo Grupo A:</p>
            <p>Móviles 3/6/21/22</p>
          </div>
        </div>
        <div class="col-sm-7">
          <table>
            <tr id="bgLight">
              <td>Responsable: </td>
              <td>Legajo: 30</td>
              <td>Nombre: Juan Leiva </td>
              <td>Firma: __________________________</td>
            </tr>
            <tr>
              <td>Ayudante: </td>
              <td>Legajo: 30</td>
              <td>Nombre: Juan Leiva </td>
              <td>Firma: __________________________</td>
            </tr>
          </table>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-2 col-sm-offset-1">
          <div class="onBorder">
            <p>Vehiculo Grupo A:</p>
            <p>Móviles 3/6/21/22</p>
          </div>
        </div>
        <div class="col-sm-7">
          <table>
            <tr id="bgLight">
              <td>Responsable: </td>
              <td>Legajo: 30</td>
              <td>Nombre: Juan Leiva </td>
              <td>Firma: __________________________</td>
            </tr>
            <tr>
              <td>Ayudante: </td>
              <td>Legajo: 30</td>
              <td>Nombre: Juan Leiva </td>
              <td>Firma: __________________________</td>
            </tr>
          </table>
        </div>       
      </div>


      <div class="col-sm-4 col-sm-offset-3">
        <table>
          <tr>
            <td>Legajo: 30</td>
            <td>Firma: _______________________</td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <div class="container">
      <div class="row" id="topSign">
        <div class="col-sm-2 col-sm-offset-1">
            <button onclick="Imprimir()" type="submit" class="btn btn-primary">
                <i class="fa fa-exchange"></i> Imprimir
            </button>
        </div>
      </div>
  </div>
</article>

<script>
function Imprimir(){
  var prtContent = document.getElementById("printeable");
  var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
  WinPrint.document.write(prtContent.innerHTML);
  WinPrint.document.close();
  WinPrint.focus();
  WinPrint.print();
  WinPrint.close();
}
</script>
@endsection

@section('js')
@endsection
