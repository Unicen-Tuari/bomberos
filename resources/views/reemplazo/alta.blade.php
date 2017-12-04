@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-exchange" aria-hidden="true"></span>
      <h4>Alta reemplazo</h4>
    </div>
    <div class="panel-body">
      <form class="form-horizontal" action='{{route("reemplazo.store")}}' method="POST">
        {{csrf_field()}}
        {{method_field('POST')}}
        <div class="form-group {{ $errors->has('id_bombero') ? ' has-error' : '' }}">
          <label for="id_bombero" class="col-md-4 control-label">Bombero a reemplazar</label>
          <div class="col-md-6">
            <select class="form-control" name="id_bombero">
              <option value="">Bombero... </option>
              @foreach($bomberos as $bombero)
                <option value="{{$bombero->id}}">{{$bombero->apellido}}, {{$bombero->nombre}}</option>
              @endforeach
            </select>
            @if ($errors->has('id_bombero'))
                <span class="help-block">
                    <strong>{{$errors->first('id_bombero')}}</strong>
                </span>
            @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('id_bombero_reemplazo') ? ' has-error' : '' }}">
          <label for="id_bombero_reemplazo" class="col-md-4 control-label">Bombero reemplazo</label>
          <div class="col-md-6">
            <select class="form-control" name="id_bombero_reemplazo">
              <option value="">Bombero... </option>
              @foreach($bomberos as $bombero)
                <option value="{{$bombero->id}}">{{$bombero->apellido}}, {{$bombero->nombre}}</option>
              @endforeach
            </select>
            @if ($errors->has('id_bombero_reemplazo'))
                <span class="help-block">
                    <strong>{{$errors->first('id_bombero_reemplazo')}}</strong>
                </span>
            @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('fecha_inicio') ? ' has-error' : '' }}">
          <label for="fecha_inicio" class="col-md-4 control-label">Desde</label>
          <div class="col-md-2">
            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="{{@date('Y-m-d')}}" min="{{@date('Y-m-d')}}">
            @if ($errors->has('fecha_inicio'))
                <span class="help-block">
                    <strong>{{$errors->first('fecha_inicio')}}</strong>
                </span>
            @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('fecha_fin') ? ' has-error' : '' }}">
          <label for="fecha_fin" class="col-md-4 control-label">Hasta</label>
          <div class="col-md-2">
            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="">
            @if ($errors->has('fecha_fin'))
                <span class="help-block">
                    <strong>{{$errors->first('fecha_fin')}}</strong>
                </span>
            @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('razon') ? ' has-error' : '' }}">
          <label for="razon" class="col-md-4 control-label">Razon</label>
          <div class="col-md-6">
            <input type="text" name="razon" class="form-control" value="">
            @if ($errors->has('razon'))
                <span class="help-block">
                    <strong>{{$errors->first('razon')}}</strong>
                </span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-exchange"></i> Registrar
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</article>
@endsection
