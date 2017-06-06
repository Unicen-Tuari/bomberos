@extends('layouts.app')

@section('content')

<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-users" aria-hidden="true"></span>
      <h4>Asistencia del {{\Carbon\Carbon::parse($reunion)->format('d-m-Y')}}</h4>
    </div>
    <div class="panel-body">

      <div class="form-group">
        {{ Form::label('Buscar', 'Buscar: ',['class' => 'control-label col-sm-2 col-sm-offset-2']) }}
        <div class="col-sm-4">
          {{Form::text('busqueda', null, ['placeholder'=>"Buscar por apellido/nombre",'id'=>"inputFilterPuntuacion",'class' => 'form-control'])}}
        </div>
        <div class="col-sm-2">
          <a href="#" class="glyphicon glyphicon-ok-circle presentesOn" id="on"></a>
          <a href="#" class="glyphicon glyphicon-remove-circle presentesOff"id="off"></a>
          <a href="#" class="glyphicon glyphicon-ban-circle presentesall" id="all"></a>
        </div>
      </div>

      <div class="form-group">
      <table  class="table table-bordered">
        <thead><!--Titulos de la tabla-->
          <tr>
            <th class="text-center">Nº legajo</th>
            <th class="text-center">Apellido Nombre</th>
            <th class="text-center">asistió</th>
          </tr>
        </thead>
        <tbody id="tablaPuntuacion">
          @foreach ($bomberos as $bombero)
            <tr id = "modal{{$bombero->id}}">
              <td class="text-center">{{$bombero->nro_legajo}}</td>
              <td class="text-center">{{$bombero->apellido.' - '.$bombero->nombre}}</td>
              <td class="text-center">
                @if ($bombero->presente($reunion))
                  <a class="glyphicon glyphicon-ok-circle presentesOn" asistencia="onn"></a>
                @else
                  <a class="glyphicon glyphicon-remove-circle presentesOff" asistencia="off"></a>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td class="text-center" colspan="3"> lista de bomberos activos </td>
          </tr>
        </tfoot>
        <br>
      </table>
      </div>

    </div>
  </div>
</article>
@endsection

@section('js')
  {!! Html::script('assets/js/ajaxpuntuacion.js') !!}
@endsection
