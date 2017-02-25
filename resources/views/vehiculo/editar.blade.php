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

        <div class="form-group">
          <div class="{{ $errors->has('activo') ? ' has-error' : '' }}">
            {!! Form::label('activo', "Activo", ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-2">
                {!! Form::checkbox('activo', 1,$vehiculo->activo,['id'=>'activo']) !!}

                @if ($errors->has('activo'))
                    <span class="help-block">
                        <strong>{{ $errors->first('activo') }}</strong>
                    </span>
                @endif
            </div>
          </div>

          <div class="{{ $errors->has('baja') ? ' has-error' : '' }}">
            {!! Form::label('baja', "Baja", ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-3">
                {!! Form::checkbox('baja', 1,$vehiculo->baja,['id'=>'baja']) !!}

                @if ($errors->has('baja'))
                    <span class="help-block">
                        <strong>{{ $errors->first('baja') }}</strong>
                    </span>
                @endif
            </div>
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
                <i class=" glyphicon glyphicon-user"></i> Editar
            </button>
          </div>
        </div>

      {!! Form::close() !!}
    </div>
  </div>
</article>
@endsection
