@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-share" aria-hidden="true"></span>
      <h4>Bomberos ingresados</h4>
    </div>
    <div class="panel-body">
      <table  class="table table-striped">
        <thead><!--Titulos de la tabla-->
          <tr>
            <th class="text-center">Bombero</th>
            <th class="text-center col-xs-6">Presencia</th>
          </tr>
        </thead>
        <tbody><!--Contenido de la tabla-->
          @foreach ($ingresados as $ingresado)
            <tr>
              <td class="text-center">{{$ingresado->bombero->nombre." ". $ingresado->bombero->apellido}}</td>
              <td class="text-center"> En el Cuartel</td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2" class="text-center">Bomberos ingresados</td>
          </tr>
        </tfoot>
        </table>
    </div>
  </div>
</article>
@endsection
