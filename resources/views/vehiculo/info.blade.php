@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Materiales de {{$vehiculo->patente}}
    </div>
    <div class="panel-body">
      <div class=" col-md-10 col-md-offset-1">
      <table  class="table table-bordered">
        <thead><!--Titulos de la tabla-->
          <tr>
            <th class="text-center">Materiales</th>
          </tr>
        </thead>
        <tbody><!--Contenido de la tabla-->
          @foreach ($vehiculo->materiales as $material)
            <tr>
              <td class="text-center">{{$material->nombre}}</td>
            </tr>
          @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td class="text-center" colspan="9">Detalle de Vehiculo</td>
            </tr>
          </tfoot>
          <br>
        </table>
      </div>
    </div>
  </div>
</article>
@endsection
