@extends('layouts.app')

@section('content')
<article class="col-sm-12">

<div class="panel panel-default">
    <div class="panel-heading">
      Responsable
    </div>

  <div class="panel-body">

  {!! Form::open([ 'route' => 'bombero.altaResponsable', 'class' => 'form-horizontal', 'method' => 'POST']) !!}

    <div class="form-group">

      <div class="col-sm-4 {{ $errors->has('vehiculos') ? ' has-error' : '' }}">
        {!! Form::label('vehiculos', 'Vehiculos Grupo A',['class' => 'col-sm-6 col-sm-offset-3 control-label']) !!}
        <div class="col-sm-3">
          {{Form::select('Vehiculos[]', $vehiculos, $vehiculosA,['class' => 'selectMultiple', 'multiple'=>'multiple'])}}
          @if ($errors->has('vehiculos'))
              <span class="help-block">
                  <strong>{{ $errors->first('vehiculos') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="col-sm-4 {{ $errors->has('BomberoResp') ? ' has-error' : '' }}">
        {!! Form::label('bombero', 'Bombero responsable',['class' => 'col-sm-6 control-label']) !!}
        <div class="col-sm-3">
          {{Form::select('BomberoResp', $bomberos,null,['class' => 'form-control selectMultiple'])}}
          @if ($errors->has('BomberoResp'))
              <span class="help-block">
                  <strong>{{ $errors->first('BomberoResp') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="col-sm-4 {{ $errors->has('BomberoAyud') ? ' has-error' : '' }}">
        {!! Form::label('bombero', 'Bombero ayudante',['class' => 'col-sm-6 control-label']) !!}
        <div class="col-sm-3">
          {{Form::select('BomberoAyud', $bomberos,null,['class' => 'form-control selectMultiple'])}}
          @if ($errors->has('BomberoAyud'))
              <span class="help-block">
                  <strong>{{ $errors->first('BomberoAyud') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <hr>

    <div class="form-group">

      <div class="col-sm-4 {{ $errors->has('vehiculos') ? ' has-error' : '' }}">
        {!! Form::label('vehiculos', 'Vehiculos Grupo B',['class' => 'col-sm-6 col-sm-offset-3 control-label']) !!}
        <div class="col-sm-3">
          {{Form::select('Vehiculos[]', $vehiculos, $vehiculosB,['class' => 'selectMultiple', 'multiple'=>'multiple'])}}
          @if ($errors->has('vehiculos'))
              <span class="help-block">
                  <strong>{{ $errors->first('vehiculos') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="col-sm-4 {{ $errors->has('BomberoResp') ? ' has-error' : '' }}">
        {!! Form::label('bombero', 'Bombero responsable',['class' => 'col-sm-6 control-label']) !!}
        <div class="col-sm-3">
          {{Form::select('BomberoResp', $bomberos,null,['class' => 'form-control selectMultiple'])}}
          @if ($errors->has('BomberoResp'))
              <span class="help-block">
                  <strong>{{ $errors->first('BomberoResp') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="col-sm-4 {{ $errors->has('BomberoAyud') ? ' has-error' : '' }}">
        {!! Form::label('bombero', 'Bombero ayudante',['class' => 'col-sm-6 control-label']) !!}
        <div class="col-sm-3">
          {{Form::select('BomberoAyud', $bomberos,null,['class' => 'form-control selectMultiple'])}}
          @if ($errors->has('BomberoAyud'))
              <span class="help-block">
                  <strong>{{ $errors->first('BomberoAyud') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <hr>

    <div class="form-group">


      <div class="col-sm-4 {{ $errors->has('materiales') ? ' has-error' : '' }}">
        {!! Form::label('materiales', 'Materiales Grupo A',['class' => 'col-sm-6 col-sm-offset-3 control-label']) !!}
        <div class="col-sm-2">
          {{Form::select('Materiales[]', $materiales,null,['class' => 'selectMultiple', 'multiple'=>'multiple'])}}
          @if ($errors->has('materiales'))
              <span class="help-block">
                  <strong>{{ $errors->first('vehiculos') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="col-sm-4 {{ $errors->has('BomberoResp') ? ' has-error' : '' }}">
        {!! Form::label('bombero', 'Bombero responsable',['class' => 'col-sm-6 control-label']) !!}
        <div class="col-sm-3">
          {{Form::select('BomberoResp', $bomberos,null,['class' => 'form-control selectMultiple'])}}
          @if ($errors->has('BomberoResp'))
              <span class="help-block">
                  <strong>{{ $errors->first('BomberoResp') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="col-sm-4 {{ $errors->has('BomberoAyud') ? ' has-error' : '' }}">
        {!! Form::label('bombero', 'Bombero ayudante',['class' => 'col-sm-6 control-label']) !!}
        <div class="col-sm-3">
          {{Form::select('BomberoAyud', $bomberos,null,['class' => 'form-control selectMultiple'])}}
          @if ($errors->has('BomberoAyud'))
              <span class="help-block">
                  <strong>{{ $errors->first('BomberoAyud') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <hr>

    <div class="form-group">

      <div class="col-sm-4 {{ $errors->has('materiales') ? ' has-error' : '' }}">
        {!! Form::label('materiales', 'Materiales Grupo B',['class' => 'col-sm-6 col-sm-offset-3 control-label']) !!}
        <div class="col-sm-2">
          {{Form::select('Materiales[]', $materiales,null,['class' => 'selectMultiple', 'multiple'=>'multiple'])}}
          @if ($errors->has('materiales'))
              <span class="help-block">
                  <strong>{{ $errors->first('vehiculos') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="col-sm-4 {{ $errors->has('BomberoResp') ? ' has-error' : '' }}">
        {!! Form::label('bombero', 'Bombero responsable',['class' => 'col-sm-6 control-label']) !!}
        <div class="col-sm-3">
          {{Form::select('BomberoResp', $bomberos,null,['class' => 'form-control selectMultiple'])}}
          @if ($errors->has('BomberoResp'))
              <span class="help-block">
                  <strong>{{ $errors->first('BomberoResp') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="col-sm-4 {{ $errors->has('BomberoAyud') ? ' has-error' : '' }}">
        {!! Form::label('bombero', 'Bombero ayudante',['class' => 'col-sm-6 control-label']) !!}
        <div class="col-sm-3">
          {{Form::select('BomberoAyud', $bomberos,null,['class' => 'form-control selectMultiple'])}}
          @if ($errors->has('BomberoAyud'))
              <span class="help-block">
                  <strong>{{ $errors->first('BomberoAyud') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <hr>
    <div class="form-group">

      <div class="col-sm-4 {{ $errors->has('vehiculos') ? ' has-error' : '' }}">
        {!! Form::label('vehiculos', 'Edificio sector C',['class' => 'col-sm-6 col-sm-offset-3 control-label']) !!}
      </div>

      <div class="col-sm-4 {{ $errors->has('BomberoResp') ? ' has-error' : '' }}">
        {!! Form::label('bombero', 'Bombero responsable',['class' => 'col-sm-6 control-label']) !!}
        <div class="col-sm-3">
          {{Form::select('BomberoResp', $bomberos,null,['class' => 'form-control selectMultiple'])}}
          @if ($errors->has('BomberoResp'))
              <span class="help-block">
                  <strong>{{ $errors->first('BomberoResp') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="col-sm-4 {{ $errors->has('BomberoAyud') ? ' has-error' : '' }}">
        {!! Form::label('bombero', 'Bombero ayudante',['class' => 'col-sm-6 control-label']) !!}
        <div class="col-sm-3">
          {{Form::select('BomberoAyud', $bomberos,null,['class' => 'form-control selectMultiple'])}}
          @if ($errors->has('BomberoAyud'))
              <span class="help-block">
                  <strong>{{ $errors->first('BomberoAyud') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <hr>

    <div class="form-group">

      <div class="col-sm-4 {{ $errors->has('vehiculos') ? ' has-error' : '' }}">
        {!! Form::label('vehiculos', 'Edificio sector D',['class' => 'col-sm-6 col-sm-offset-3 control-label']) !!}
      </div>

      <div class="col-sm-4 {{ $errors->has('BomberoResp') ? ' has-error' : '' }}">
        {!! Form::label('bombero', 'Bombero responsable',['class' => 'col-sm-6 control-label']) !!}
        <div class="col-sm-3">
          {{Form::select('BomberoResp', $bomberos,null,['class' => 'form-control selectMultiple'])}}
          @if ($errors->has('BomberoResp'))
              <span class="help-block">
                  <strong>{{ $errors->first('BomberoResp') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="col-sm-4 {{ $errors->has('BomberoAyud') ? ' has-error' : '' }}">
        {!! Form::label('bombero', 'Bombero ayudante',['class' => 'col-sm-6 control-label']) !!}
        <div class="col-sm-3">
          {{Form::select('BomberoAyud', $bomberos,null,['class' => 'form-control selectMultiple'])}}
          @if ($errors->has('BomberoAyud'))
              <span class="help-block">
                  <strong>{{ $errors->first('BomberoAyud') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>
    <hr>

    <div class="form-group">
      <div class="{{ $errors->has('fecha_inicio') ? ' has-error' : '' }}">
        {!! Form::label('fecha_inicio', 'Fecha de inicio',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-2">
          {!! Form::date('fecha_inicio', \Carbon\Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->toDateString(),['class' => 'form-control']) !!}

          @if ($errors->has('fecha_inicio'))
              <span class="help-block">
                  <strong>{{ $errors->first('fecha_inicio') }}</strong>
              </span>
          @endif
        </div>
      </div>
      <div class="{{ $errors->has('fecha_fin') ? ' has-error' : '' }}">
        {!! Form::label('fecha_fin', 'Fecha fin',['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-2">
          {!! Form::date('fecha_fin', \Carbon\Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->addMonth()->toDateString(),['class' => 'form-control']) !!}

          @if ($errors->has('fecha_fin'))
              <span class="help-block">
                  <strong>{{ $errors->first('fecha_fin') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <hr>

    <div class="col-sm-6 col-sm-offset-4">
      {{-- {!!Form::submit('Registrar', ['class' => 'btn btn-primary']) !!} --}}
      <button type="submit" class="btn btn-primary">
          <i class="glyphicon glyphicon-ok"></i> Finalizar
      </button>
    </div>

  {!! Form::close() !!}

    </div>
  </div>
</article>

@endsection
