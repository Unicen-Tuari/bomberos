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
          <form class='form-horizontal' action="{{route('material.index')}}" method='GET'>
            <div class="col-sm-4">
              <select class="form-control" name="rubro">
                <option value="0">RUBRO</option>
                @foreach(config('selects.rubro') as $key => $rubro_material)
                  <option value="{{$key}}">{{$rubro_material}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-3">
              <select class="form-control" name="movil">
                @foreach($vehiculos as $key => $vehiculo_material)
                  <option value="{{$key}}">{{$vehiculo_material}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-4">
              <input class="form-control" type="text" name="material" @if(old('material')) value="{{old('material')}}" @endif value="" placeholder="Buscar material">
              </div>
              <div class="col-sm-1">
                <input class="btn btn-primary" type="submit" name="buscar" value="Buscar">
              </div>
            </form>
          </div>
        </div>

        <div class="panel-body">
          <table  class="table table-bordered">
            <thead><!--Titulos de la tabla-->
              <tr>
                <th class="text-center">
                  Materiales
                </th>
                <th class="text-center">Nº Movil</th>
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
                        <form class="form-horizontal" action={{route('material.destroy', $material->id)}} method="POST">
                          {{csrf_field()}}
                          {{method_field('DELETE')}}
                          <button type="submit" class="glyphicon glyphicon-trash"></button>
                        </form>
                      </td>
                      <td class="text-center"><a class="glyphicon glyphicon-edit" href="{{ route('material.edit', $material->id) }}"></a></td>
                    @else
                      <td class="text-center" colspan="2">
                        <button type="submit" class="glyphicon glyphicon-ban-circle" title="Sin permisos para eliminar/modificar"></button>
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
              {{ $materiales->appends(Request::all())->links()}}
            </div>
          </div>
        </div>
      </article>
    @endsection
