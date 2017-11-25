@extends('layouts.app')

@section('content')
  <article class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Materiales del movil N° {{$vehiculo->num_movil}}
      </div>
      <div class="panel-body">
        <div class="col-sm-5 form-horizontal">
          <br>
          <div class="form-group">
            <label class="col-md-4 control-label" for="patente">Patente</label>
            <div class="col-md-7">
              <input class="form-control" type="text" name="patente" value="{{$vehiculo->patente}}" disabled>
            </div>
          </div>
          <div class="form-group ">
            <label class="col-md-4 control-label" for="num_movil">Numero de Movil</label>
            <div class="col-md-7">
              <input class="form-control" type="text" name="num_movil" value="{{$vehiculo->num_movil}}" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="estado">Estado</label>
            <div class="col-md-7">
              <select class="form-control" name="estado" disabled>{{$vehiculo->estado}}</select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label" for="detalle">Detalle</label>
            <div class="col-sm-7">
              <textarea class="form-control noResize" name="detalle" rows="10" cols="80" disabled>{{$vehiculo->detalle}}</textarea>
            </div>
          </div>
        </div>
        <div class=" col-sm-5">
          <table  class="table table-bordered">
            <thead><!--Titulos de la tabla-->
              <tr>
                <th colspan="2" class="text-center">Materiales</th>
              </tr>
            </thead>
            <tbody><!--Contenido de la tabla-->
              @foreach ($vehiculo->materiales as $material)
                <tr>
                  <td class="text-center"><a href="{{ route('material.show', $material->id) }}">{{$material->nombre}}</a></td>
                  @if (Auth::user()->admin)
                    <td class="text-center"><a class="glyphicon glyphicon-edit" href="{{ route('material.edit', $material->id) }}"></a></td>
                  @else
                    <td class="text-center">
                      <button type="submit" class="glyphicon glyphicon-ban-circle" title="Sin permisos para eliminar/modificar"></button>
                    </td>
                  @endif
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td colspan="2" class="text-center">Detalle de Vehiculo</td>
              </tr>
            </tfoot>
            <br>
          </table>
        </div>
      </div>
    </div>
  </article>
@endsection
