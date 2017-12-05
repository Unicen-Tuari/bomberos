@extends('layouts.app')

@section('content')
  <article class="col-md-12">
    <div class="panel panel-default">
      <div id="breadcrumb" class="panel-heading">
        <span class="fa fa-edit" aria-hidden="true"></span>
        <h4>Editar material</h4>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" action="{{ route('material.update', $material) }}" method="POST" files="true">
          {{csrf_field()}}
          {{method_field('PUT')}}
          <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
            <label for="nombre" class="col-md-4 control-label">Nombre: </label>
            <div class="col-md-6">
              <input type="text" name="nombre" class="form-control" @if(old('nombre')) value="{{old('nombre')}}" @endif value="{{$material->nombre}}">
                @if ($errors->has('nombre'))
                  <span class="help-block">
                    <strong>{{ $errors->first('nombre') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group {{ $errors->has('vehiculo_id') ? ' has-error' : '' }}">
              <label for="vehiculo_id" class="col-md-4 control-label">Esta en el vehiculo: </label>
              <div class="col-md-2">
                <select class="form-control" name="vehiculo_id">
                  <option value="">Ninguno</option>
                  @foreach($vehiculos as $key => $vehiculo_material)
                    <option @if ($key == $material->vehiculo_id) selected="selected" @endif value="{{$key}}">{{$vehiculo_material}}</option>
                    @endforeach
                  </select>
                </div>
                @if ($errors->has('vehiculo_id'))
                  <span class="help-block">
                    <strong>{{ str_replace(" id "," ",$errors->first('vehiculo_id')) }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group  {{ $errors->has('rubro') ? ' has-error' : '' }}">
                <label for="rubro" class="col-md-4 control-label">Rubro: </label>
                <div class="col-md-2">
                  <select class="form-control" name="rubro">
                    @foreach(config('selects.rubro') as $key => $rubro_material)
                      <option @if ($key == $material->rubro) selected="selected" @endif value="{{$key}}">{{$rubro_material}}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('rubro'))
                      <span class="help-block">
                        <strong>{{ $errors->first('rubro') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <div class="{{ $errors->has('mantenimiento') ? ' has-error' : '' }}">
                    <label for="mantenimiento" class="col-md-4 control-label">Mantenimiento: </label>
                    <div class="col-md-2">
                      <input type="checkbox" name="mantenimiento" @if( $material->mantenimiento ) checked @endif>
                        @if ($errors->has('mantenimiento'))
                          <span class="help-block">
                            <strong>{{ $errors->first('mantenimiento') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                    <label for="reparado" class="col-md-4 control-label">Veces reparado: </label>
                    <div class="col-sm-1 ">
                      <input type="text" class="form-control" name="reparado" @if(old('reparado')) value="{{old('reparado')}}" @endif value="{{$material->reparado}}" disabled>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('detalle') ? ' has-error' : '' }}">
                      <label for="detalle" class="col-md-4 control-label">Detalle: </label>
                      <div class="col-sm-6">
                        <textarea name="detalle" class="form-control" rows="8">{{$material->detalle}}</textarea>
                        @if ($errors->has('detalle'))
                          <span class="help-block">
                            <strong>{{ $errors->first('detalle') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                          <i class=" glyphicon glyphicon-wrench"></i> Editar
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </article>
          @endsection
