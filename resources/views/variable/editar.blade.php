@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-edit" aria-hidden="true"></span>
      <h4>Editar variables</h4>
    </div>
    <div class="panel-body">
        {!! Form::open([ 'route' => ['variable.update', $variable ], 'class' => 'form-horizontal', 'method' => 'PUT', 'files' => true]) !!}

        <div class="form-group  {{ $errors->has('asistencia') ? ' has-error' : '' }}">
          {!! Form::label('asistencia', 'Asistencia: ',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-2">
            {!! Form::number('asistencia', $variable->asistencia, ['class' => 'form-control', 'min'=>'0']) !!}
          @if ($errors->has('asistencia'))
            <span class="help-block">
              <strong>{{ $errors->first('asistencia') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <div class="form-group  {{ $errors->has('accidentales') ? ' has-error' : '' }}">
        {!! Form::label('accidentales', 'Accidentales: ',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-2">
          {!! Form::number('accidentales', $variable->accidentales, ['class' => 'form-control', 'min'=>'0']) !!}
          @if ($errors->has('accidentales'))
            <span class="help-block">
              <strong>{{ $errors->first('accidentales') }}</strong>
            </span>
          @endif
        </div>
      </div>

        <div class="form-group  {{ $errors->has('guardias') ? ' has-error' : '' }}">
          {!! Form::label('guardias', 'Guardias: ',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-2">
            {!! Form::number('guardias', $variable->guardias, ['class' => 'form-control','min'=>'0']) !!}
            @if ($errors->has('guardias'))
              <span class="help-block">
                <strong>{{ $errors->first('guardias') }}</strong>
              </span>
            @endif
        </div>
      </div>

        <div class="form-group  {{ $errors->has('anio') ? ' has-error' : '' }}">
          {!! Form::label('anio', 'Año: ',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-2">
            {!! Form::number('anio', $variable->anio, ['class' => 'form-control', 'min'=>'0']) !!}
          @if ($errors->has('anio'))
            <span class="help-block">
              <strong>{{ $errors->first('anio') }}</strong>
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

      {!! Form::close() !!}
    </div>
  </div>
</article>
@endsection
