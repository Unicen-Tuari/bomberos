@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-edit" aria-hidden="true"></span>
      <h4>Modificar vehiculo</h4>
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
              {!! Form::text('num_movil', $vehiculo->num_movil, ['class' => 'form-control']) !!}

              @if ($errors->has('num_movil'))
                  <span class="help-block">
                      <strong>{{ $errors->first('num_movil') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('estado') ? ' has-error' : '' }}">
          {!! Form::label('estado', "Estado", ['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-2">
            {{Form::select('estado',config('selects.estadovehiculo'), $vehiculo->estado, ['class' => 'form-control'])}}

            @if ($errors->has('estado'))
                <span class="help-block">
                    <strong>{{ $errors->first('estado') }}</strong>
                </span>
            @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('detalle') ? ' has-error' : '' }}">
          {!! Form::label('detalle', 'Detalle',['class' => 'col-sm-4 control-label']) !!}
          <div class="col-sm-6">
              {!! Form::textarea('detalle',  $vehiculo->detalle, ['class' => 'form-control' , 'rows' => '8']) !!}

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
                <i class=" glyphicon glyphicon-floppy-save"></i> Editar
            </button>
          </div>
        </div>

      {!! Form::close() !!}
    </div>
  </div>
</article>
@endsection
