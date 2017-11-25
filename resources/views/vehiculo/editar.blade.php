@extends('layouts.app')

@section('content')
  <article class="col-md-12">
    <div class="panel panel-default">
      <div id="breadcrumb" class="panel-heading">
        <span class="fa fa-edit" aria-hidden="true"></span>
        <h4>Modificar vehiculo</h4>
      </div>
      <div class="panel-body">
        <form class='form-horizontal' action="{{route('vehiculo.update', $vehiculo)}}" method="POST">
          {{csrf_field()}}
          {{method_field('PUT')}}
          <div class="form-group {{ $errors->has('patente') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label" for="patente">Patente</label>
            <div class="col-md-4">
              <input class="form-control" type="text" name="patente" @if(old('patente')) value="{{old('patente')}}" @endif value="{{$vehiculo->patente}}">
                @if ($errors->has('patente'))
                  <span class="help-block">
                    <strong>{{ $errors->first('patente') }} Usar: AAA 999 o AA 999 AA</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group {{ $errors->has('num_movil') ? ' has-error' : '' }}">
              <label class="col-md-4 control-label" for="num_movil">Numero de Movil</label>
              <div class="col-md-4">
                <input class="form-control" type="text" name="num_movil" @if(old('num_movil')) value="{{old('num_movil')}}" @endif value="{{$vehiculo->num_movil}}">
                  @if ($errors->has('num_movil'))
                    <span class="help-block">
                      <strong>{{ $errors->first('num_movil') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="form-group {{ $errors->has('estado') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label" for="estado">Estado</label>
                <div class="col-md-4">
                  <select class="form-control" name="estado">
                    @foreach(config('selects.estadoVehiculo') as $key => $estadoVehiculo)
                      <option value="{{$key}}" @if ($key == old('estado')) value="{{old('estado')}}" selected="selected" @endif>{{$estadoVehiculo}}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('estado'))
                      <span class="help-block">
                        <strong>{{ $errors->first('estado') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group {{ $errors->has('detalle') ? ' has-error' : '' }}">
                  <label class="col-md-4 control-label" for="detalle">Detalle</label>
                  <div class="col-md-4">
                    <textarea class="form-control" name="detalle" cols="50" rows="8">{{$vehiculo->detalle}}</textarea>
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
                      <i class=" glyphicon glyphicon-floppy-save"></i> Registrar
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </article>
      @endsection
