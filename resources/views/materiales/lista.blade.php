@extends('layouts.app')

@section('content')
<div class="container">
<div class="panel panel-default">
  <div class="panel-heading">
    Lista de materiales
  </div>
  <div class="panel-body">
    <table  class="table table-bordered">
      <thead><!--Titulos de la tabla-->
        <tr>
          <th>
            Materiales
          </th>
        </tr>
      </thead>
      <tbody><!--Contenido de la tabla-->
        @foreach ($materiales as $material)
          <tr>
            <td class="text-center">{{$material->nombre}}</td>
            <td class="text-center">{{$material->vehiculo_id}}</td>
            <td class="text-center">
              {{ Form::open(['route' => ['materiales.destroy', $material->id], 'method' => 'delete']) }}
                  <button type="submit" class="btn btn-danger btn-mini glyphicon glyphicon-trash"></button>
              {{ Form::close() }}
            </td>
            <td class="text-center"><a class="glyphicon glyphicon-edit" href="{{ route('materiales.edit', $material->id) }}"></a></td>
          </tr>
        @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td class="text-center" colspan="9"> Lista de materiales</td>
          </tr>
        </tfoot>
        <br>
      </table>
      <div class="text-center">
        {{ $materiales->render()}}
      </div>
  </div>
</div>
</div>
@endsection
