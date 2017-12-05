@extends('layouts.app')

@section('content')
  <article class="col-md-12">
    <div class="panel panel-default">
      <div id="breadcrumb" class="panel-heading">
        <span class="fa fa-wrench" aria-hidden="true"></span>
        <h4>Alta de material</h4>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" action="{{ route('material.store') }}" method="POST">
          {{csrf_field()}}
          {{method_field('POST')}}
          <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
            <label for="nombre" class="col-md-4 control-label">Nombre: </label>
            <div class="col-md-6">
              <input type="text" name="nombre" class="form-control">
              @if ($errors->has('nombre'))
                <span class="help-block">
                  <strong>{{ $errors->first('nombre') }}</strong>
                </span>
              @endif
            </div>
          </div>
          <div class="form-group  {{ $errors->has('vehiculo_id') ? ' has-error' : '' }}">
            <label for="vehiculo_id" class="col-md-4 control-label">Esta en el vehiculo: </label>
            <div class="col-md-2">
              <select class="form-control" name="vehiculo_id">
                <option value="">Ninguno</option>
                @foreach($vehiculos as $key => $vehiculo_material)
                  <option value="{{$key}}">{{$vehiculo_material}}</option>
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
                  <option value="{{$key}}">{{$rubro_material}}</option>
                @endforeach
              </select>
            </div>
            @if ($errors->has('rubro'))
              <span class="help-block">
                <strong>{{ $errors->first('rubro') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group {{ $errors->has('detalle') ? ' has-error' : '' }}">
            <label for="detalle" class="col-md-4 control-label">Rubro: </label>
            <div class="col-sm-6">
              <textarea name="detalle" class="form-control" rows="8"></textarea>
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
                <i class=" glyphicon glyphicon-wrench"></i> Registrar
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </article>
@endsection
