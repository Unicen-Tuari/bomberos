@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-briefcase" aria-hidden="true"></span>
      <h4>Materiales</h4>
    </div>

    <div class="col-sm-12">
      <div class="col-md-7 col-sm-12 text-right" style="padding-top: 20px;">
        @php
          $rubro[0]="Rubro";
          $rubro=array_merge($rubro, config('selects.rubro'));
        @endphp
        {{Form::model(Request::all(),['route' => 'material.index', 'class' => 'form-horizontal', 'method' => 'GET'])}}
          <div class="col-sm-4">
            {{Form::select('rubro', $rubro,null, ['class' => 'form-control'])}}
          </div>
            <div class="col-sm-3">
              {{Form::select('movil', $vehiculos,null, ['class' => 'form-control'])}}
            </div>
          <div class="col-sm-4">
            {{Form::text('material', null, ['placeholder'=>"Buscar material", 'class' => 'form-control'])}}
          </div>
          <div class="col-sm-1">
            {{Form::submit('Buscar', ['class' => 'btn btn-primary']) }}
          </div>
        {{Form::close()}}
      </div>
    </div>

    <div class="panel-body">
      <table  class="table table-bordered">
        <thead><!--Titulos de la tabla-->
          <tr>
            <th class="text-center">
              Materiales
            </th>
            <th class="text-center">Vehiculo</th>
            <th class="text-center">Rubro</th>
            <th colspan="2"></th>
          </tr>
        </thead>
        <tbody><!--Contenido de la tabla-->
          @foreach ($materiales as $material)
            @if (!$material->mantenimiento)
            <tr>
            @else
            <tr class="danger">
            @endif
              <td class="text-center"><a href="{{ route('material.show', $material->id) }}">{{$material->nombre}}</a></td>
              @if ($material->vehiculo_id)
                <td class="text-center">{{$material->vehiculo->num_movil}}</td>
              @else
                <td class="text-center">En Depósito</td>
              @endif
              <th class="text-center">{{config('selects.rubro')[$material->rubro]}}</th>
              @if (Auth::user()->admin)
                <td class="text-center">
                  {{ Form::open(['route' => ['material.destroy', $material->id], 'method' => 'delete']) }}
                      <button type="submit" class="btn glyphicon glyphicon-trash simulara"></button>
                  {{ Form::close() }}
                </td>
                <td class="text-center"><a class="glyphicon glyphicon-edit" href="{{ route('material.edit', $material->id) }}"></a></td>
              @else
                <td class="text-center" colspan="2">
                  <button type="submit" class="btn glyphicon glyphicon-ban-circle ban" title="Sin permisos para eliminar/modificar"></button>
                </td>
              @endif
            </tr>
          @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td class="text-center" colspan="5"> Lista de materiales</td>
            </tr>
          </tfoot>
          <br>
        </table>
        <div class="text-center">
          {{ $materiales->appends(Request::only(['legajo']))->links()}}
        </div>
    </div>
  </div>
</article>
@endsection
