@extends('layouts.app')
@section('content')
  <article class="col-sm-10" >
  <div class="container" id="printeable">
      <div class="row">
        <div class="col-sm-10">
          <p>Jefe de Guardia N°: {{$planilla->jefe_guardia}} 
          responsable de las actividades del Orden Interno durante la semana del 
          {{$planilla->inicio_semana}} al {{$planilla->fin_semana}} de 
          {{$planilla->mes}} de {{$planilla->year}} designo y notifico al personal a mi cargo con las siguientes responsabilidades.</p>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-2 col-sm-offset-1">
          <div class="onBorder">
            <p>{{$renglon->descripcion_responsabilidad}}</p>
            <p>Móviles {{$renglon->created_at}}</p>
          </div>
        </div>
        <div class="col-sm-7">
          <table>
            <tr id="bgLight">
              <td>Responsable: </td>
              <td>Legajo: {{$responsable->id}}</td>
              <td>Nombre: {{$responsable->apellido}}, {{$responsable->nombre}} </td>
              <td>Firma: __________________________</td>
            </tr>
            <tr>
              <td>Ayudante: </td>
              <td>Legajo: {{$ayudante->id}}</td>
              <td>Nombre: {{$ayudante->apellido}}, {{$ayudante->nombre}} </td>
              <td>Firma: __________________________</td>
            </tr>
          </table>
        </div>
      </div>

  <div class="container">
      <div class="row" id="topSign">
        <div class="col-sm-2 col-sm-offset-1">
        <a href="{{ route('planilla.imprimir', $planilla->id) }}" 
          class="glyphicon glyphicon-picture"></a>
        </div>
      </div>
  </div>

<script>
function Imprimir(){

  var mywindow = window.open('', 'PRINT', 'height=800,width=1200');
  mywindow.document.write('<!DOCTYPE html><html lang="en">');
  mywindow.document.write(document.getElementsByTagName('head')[0].innerHTML);
  mywindow.document.write('<body >');
  mywindow.document.write(document.getElementById("printeable").innerHTML);
  mywindow.document.write('</body></html>');

  mywindow.document.close();
  mywindow.focus();

  mywindow.print();
  mywindow.close();

}
</script>
@endsection

@section('js')
@endsection
