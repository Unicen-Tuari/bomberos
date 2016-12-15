@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-share" aria-hidden="true"></span>
      <h4>Bomberos ingresados</h4>
    </div>
    <div class="panel-body">
      <table  class="table table-bordered">
        {{-- <thead><!--Titulos de la tabla-->
          <tr>
            <th class="text-center">Numero Legajo</th>
            <th class="text-center">Jerarquia</th>
            <th class="text-center">Apellido</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Direccion</th>
            <th class="text-center">Telefono</th>
            <th class="text-center">Fecha nacimiento</th>
            <th colspan="2"></th>
          </tr>
        </thead> --}}
        <tbody><!--Contenido de la tabla-->
          @foreach ($ingresados as $ingresado)
            <tr>

              <td class="text-center">{{$ingresado->bombero->nombre." ". $ingresado->bombero->apellido}}</td>
              <td>{{Form::select('TipoAsistencia', $tipos_asist, 4,['class' => 'col-sm-3'])}}</td>
            </tr>
          @endforeach
          </tbody>
          <br>
        </table>
        <button type="button" class="btn btn-primary pull-right">
            <i class="glyphicon glyphicon-ok"></i> Finalizar
        </button>
    </div>
  </div>
</article>
@endsection
