@extends('layouts.app')

@section('content')
  <article class="col-sm-12">
    <div class="panel panel-default">
      <div id="breadcrumb" class="panel-heading">
        <span class="fa fa-edit" aria-hidden="true"></span>
        <h4>Material {{$material->nombre}} {{$material->id}}</h4>
      </div>
      <div class="panel-body form-horizontal">
        <div class="form-group">
          <label for="nombre" class="col-md-4 control-label">Nombre: </label>
          <div class="col-md-6">
            <input disabled type="text" name="nombre" class="form-control" @if(old('nombre')) value="{{old('nombre')}}" @endif value="{{$material->nombre}}">
            </div>
          </div>
          <div class="form-group">
            <label for="vehiculo_id" class="col-md-4 control-label">Esta en el vehiculo: </label>
            <div class="col-md-2">
              <select disabled class="form-control" name="vehiculo_id">
                <option value="">Ninguno</option>
                @foreach($vehiculos as $key => $vehiculo_material)
                  <option @if ($key == $material->vehiculo_id) selected="selected" @endif value="{{$key}}">{{$vehiculo_material}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="rubro" class="col-md-4 control-label">Rubro: </label>
              <div class="col-md-2">
                <select disabled class="form-control" name="rubro">
                  @foreach(config('selects.rubro') as $key => $rubro_material)
                    <option @if ($key == $material->rubro) selected="selected" @endif value="{{$key}}">{{$rubro_material}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="">
                  <label for="mantenimiento" class="col-md-4 control-label">Mantenimiento: </label>
                  <div class="col-md-2">
                    <input disabled type="checkbox" name="mantenimiento" @if( $material->mantenimiento ) checked @endif>
                    </div>
                  </div>
                  <label for="reparado" class="col-md-4 control-label">Veces reparado: </label>
                  <div class="col-sm-1 ">
                    <input disabled type="text" class="form-control" name="reparado" @if(old('reparado')) value="{{old('reparado')}}" @endif value="{{$material->reparado}}" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="detalle" class="col-md-4 control-label">Detalle: </label>
                    <div class="col-sm-6">
                      <textarea disabled name="detalle" class="form-control" rows="8">{{$material->detalle}}</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class=" col-sm-3 col-sm-offset-6">
                      <a href="{{route('material.index')}}" class="">
                        <button type="submit" class="btn btn-primary glyphicon glyphicon-ok">
                          Volver</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </article>
              @endsection
