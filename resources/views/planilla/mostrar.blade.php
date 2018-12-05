@extends('layouts.app')
@section('content')
  <article class="col-sm-10" >
  <div class="container" id="printeable">
      <div class="row">
        <div class="col-sm-10">
          <p>Jefe de Guardia N° {{$jefe->apellido}}, {{$jefe->nombre}}
          responsable de las actividades del Orden Interno durante la semana del 
          {{$planilla->inicio_semana}} al {{$planilla->fin_semana}} de 
          {{$planilla->mes}} de {{$planilla->year}} designo y notifico al personal a mi cargo con las siguientes responsabilidades.</p>
        </div>
      </div>

      @foreach($renglones as $key=>$renglon)
      <div class="row rowEnter">
        <div class="col-sm-2 col-sm-offset-1">
          <div class="onBorder">
            <p>{{$renglon->descripcion_responsabilidad}}</p>
            <p>Móviles {{$renglon->created_at}}</p>
          </div>
        </div>
        <div class="col-sm-7" id="pdatos">
          <table>
            <tr id="bgLight">
              <td>Responsable: </td>
              <td>Legajo: {{$responsables[$key]->id}}</td>
              <td>Nombre: {{$responsables[$key]->apellido}}, {{$responsables[$key]->nombre}} </td>
              <td>Firma: __________________________</td>
            </tr>
            <tr>
              <td>Ayudante: </td>
              <td>Legajo: {{$ayudantes[$key]->id}}</td>
              <td>Nombre: {{$ayudantes[$key]->apellido}}, {{$ayudantes[$key]->nombre}} </td>
              <td>Firma: __________________________</td>
            </tr>
          </table>
        </div>
      </div>
      @endforeach
      
  <div class="row" id="topSign">
    <div class="col-sm-2 col-sm-offset-8">
    {{ Form::open(['route' => ['planilla.imprimir', $planilla->id], 'method' => 'GET']) }}
        <button type="submit" class="btn btn-primary">
          <i class="fa fa-exchange"></i> Imprimir
        </button>
    {{ Form::close() }}
    </div>
  </div>
@endsection

@section('js')
@endsection
