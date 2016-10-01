@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Finalizar servicio
    </div>
  <div class="panel-body">

  {!! Form::open([ 'route' => ['servicio.finalizar', $id], 'class' => 'form-horizontal', 'method' => 'PUT']) !!}

    <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
      {!! Form::label('bomberos', 'Bomberos involucrados',['class' => 'col-md-4 control-label']) !!}
      <div class="col-md-6">
        {{Form::select('Bomberos[]', $bomberos,null,['class' => 'selectMultiple', 'multiple'=>'multiple'])}}
        @if ($errors->has('nombre'))
            <span class="help-block">
                <strong>{{ $errors->first('nombre') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
      {!! Form::label('vehiculos', 'Vehiculos involucrados',['class' => 'col-md-4 control-label']) !!}
      <div class="col-md-6">
        {{Form::select('Vehiculos[]', $vehiculos,null,['class' => 'selectMultiple', 'multiple'=>'multiple'])}}
        @if ($errors->has('nombre'))
            <span class="help-block">
                <strong>{{ $errors->first('nombre') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
      {!! Form::label('descripcion', 'Descripcion',['class' => 'col-md-4 control-label']) !!}
      <div class="col-md-6">
        {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
      </div>
    </div>

    <div class="col-md-6 col-md-offset-4">
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
