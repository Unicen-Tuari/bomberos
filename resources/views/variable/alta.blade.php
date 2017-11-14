@extends('layouts.app')

@section('content')
  <article class="col-sm-12">
    <div class="panel panel-default">
      <div id="breadcrumb" class="panel-heading">
        <span class="fa fa-pie-chart" aria-hidden="true"></span>
        <h4>Crear una nueva variable</h4>
      </div>
      <div class="panel-body">
        {!! Form::open([ 'route' => 'variable.store', 'class' => 'form-horizontal', 'method' => 'POST', 'files' => true]) !!}

        <div class="form-group  {{ $errors->has('asistencia') ? ' has-error' : '' }}">
          {!! Form::label('asistencia', 'Asistencia: ',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-2">
            {!! Form::number('asistencia', null, ['class' => 'form-control', 'min'=>'0']) !!}
          </div>
          @if ($errors->has('asistencia'))
            <span class="help-block">
              <strong>{{ $errors->first('asistencia') }}</strong>
            </span>
          @endif
        </div>

        <div class="form-group  {{ $errors->has('accidentales') ? ' has-error' : '' }}">
          {!! Form::label('accidentales', 'Accidentales: ',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-2">
            {!! Form::number('accidentales', null, ['class' => 'form-control', 'min'=>'0']) !!}
          </div>
          @if ($errors->has('accidentales'))
            <span class="help-block">
              <strong>{{ $errors->first('accidentales') }}</strong>
            </span>
          @endif
        </div>

        <div class="form-group  {{ $errors->has('guardias') ? ' has-error' : '' }}">
          {!! Form::label('guardias', 'Guardias: ',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-2">
            {!! Form::number('guardias', null, ['class' => 'form-control','min'=>'0']) !!}
          </div>
          @if ($errors->has('guardias'))
            <span class="help-block">
              <strong>{{ $errors->first('guardias') }}</strong>
            </span>
          @endif
        </div>

        <div class="form-group  {{ $errors->has('anio') ? ' has-error' : '' }}">
          {!! Form::label('anio', 'Año: ',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-2">
            {!! Form::number('anio', null, ['class' => 'form-control', 'min'=>'0']) !!}
          </div>
          @if ($errors->has('anio'))
            <span class="help-block">
              <strong>{{ $errors->first('anio') }}</strong>
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
        {!! Form::close() !!}
      </div>
    </div>
  </article>
@endsection
