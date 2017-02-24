@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-briefcase" aria-hidden="true"></span>
      <h4>Materiales</h4>
    </div>
    <div class="panel-body">
      <table  class="table table-bordered">
        <thead><!--Titulos de la tabla-->
          <tr>
            <th class="text-center">
              Materiales
            </th>
            <th class="text-center">Vehiculo</th>
            <th colspan="2"></th>
          </tr>
        </thead>
        <tbody><!--Contenido de la tabla-->
          @foreach ($materiales as $material)
            <tr>
              <td class="text-center"><a href="{{ route('material.info', $material->id) }}">{{$material->nombre}}</a></td>
              @if ($material->vehiculo_id)
                <td class="text-center">{{$material->vehiculo->patente}}</td>
              @else
                <td class="text-center">En Depósito</td>
              @endif
              <td class="text-center">
                {{ Form::open(['route' => ['material.destroy', $material->id], 'method' => 'delete']) }}
                    <button type="submit" class="btn glyphicon glyphicon-trash eliminar"></button>
                {{ Form::close() }}
              </td>
              <td class="text-center"><a class="glyphicon glyphicon-edit" href="{{ route('material.edit', $material->id) }}"></a></td>
            </tr>
          @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td class="text-center" colspan="4"> Lista de materiales</td>
            </tr>
          </tfoot>
          <br>
        </table>
        <div class="text-center">
          {{ $materiales->links()}}
        </div>
    </div>
  </div>
</article>
@endsection
