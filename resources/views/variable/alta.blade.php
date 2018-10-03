@extends('layouts.app')

@section('content')
  <article class="col-sm-12">
    <div class="panel panel-default">
      <div id="breadcrumb" class="panel-heading">
        <span class="fa fa-pie-chart" aria-hidden="true"></span>
        <h4>Crear una nueva variable</h4>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" action="{{ route('variable.store') }}" method="POST">
          {{csrf_field()}}
          {{method_field('POST')}}
          <div class="form-group  {{ $errors->has('asistencia') ? ' has-error' : '' }}">
            <label for="asistencia" class="col-md-4 control-label">Orden interno: </label>
            <div class="col-md-2">
              <input type="number" class="form-control" min="0" name="asistencia" >
            </div>
            @if ($errors->has('asistencia'))
              <span class="help-block">
                <strong>{{ $errors->first('asistencia') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group  {{ $errors->has('accidentales') ? ' has-error' : '' }}">
            <label for="accidentales" class="col-md-4 control-label">Accidentales: </label>
            <div class="col-md-2">
              <input type="number" class="form-control" min="0" name="accidentales" >
            </div>
            @if ($errors->has('accidentales'))
              <span class="help-block">
                <strong>{{ $errors->first('accidentales') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group  {{ $errors->has('guardias') ? ' has-error' : '' }}">
            <label for="guardias" class="col-md-4 control-label">Guardias: </label>
            <div class="col-md-2">
              <input type="number" class="form-control" min="0" name="guardias" >
            </div>
            @if ($errors->has('guardias'))
              <span class="help-block">
                <strong>{{ $errors->first('guardias') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group  {{ $errors->has('year') ? ' has-error' : '' }}">
            <label for="year" class="col-md-4 control-label">Año: </label>
            <div class="col-md-2">
              <input type="number" class="form-control" min="0" name="year" >
            </div>
            @if ($errors->has('year'))
              <span class="help-block">
                <strong>{{ $errors->first('year') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary">
                <i class=" glyphicon glyphicon-floppy-saved"></i> Crear
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </article>
@endsection
