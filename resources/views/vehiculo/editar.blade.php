@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Editar vehiculo
    </div>
    <div class="panel-body">
      {!! Form::open([ 'route' => ['vehiculo.update', $vehiculo ], 'class' => 'form-horizontal', 'method' => 'PUT', 'files' => true]) !!}

        <div class="form-group {{ $errors->has('patente') ? ' has-error' : '' }}">
          {!! Form::label('patente', 'Patente',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-6">
              {!! Form::text('patente', $vehiculo->patente, ['class' => 'form-control']) !!}

              @if ($errors->has('patente'))
                  <span class="help-block">
                      <strong>{{ $errors->first('patente') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('num_movil') ? ' has-error' : '' }}">
          {!! Form::label('num_movil', 'Numero de Movil',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-6">
              {!! Form::text('num_movil', 1, ['class' => 'form-control']) !!}

              @if ($errors->has('num_movil'))
                  <span class="help-block">
                      <strong>{{ $errors->first('num_movil') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class=" glyphicon glyphicon-user"></i> Editar
            </button>
          </div>
        </div>

      {!! Form::close() !!}
    </div>
  </div>
</article>
@endsection
