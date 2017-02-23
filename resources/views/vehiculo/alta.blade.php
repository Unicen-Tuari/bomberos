@extends('layouts.app')

@section('content')
<article class="col-md-12">
<div class="panel panel-default">
  <div id="breadcrumb" class="panel-heading">
    <span class="fa fa-car" aria-hidden="true"></span>
    <h4>Alta de vehiculo</h4>
  </div>
  <div class="panel-body">
    {!! Form::open([ 'route' => 'vehiculo.store', 'class' => 'form-horizontal', 'method' => 'POST']) !!}

      <div class="form-group {{ $errors->has('patente') ? ' has-error' : '' }}">
        {!! Form::label('patente', 'Patente',['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('patente', null, ['class' => 'form-control']) !!}

            @if ($errors->has('patente'))
                <span class="help-block">
                    <strong>{{ $errors->first('patente') }} Usar: AAA 999 o AA 999 AA</strong>
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

      <div class="form-group {{ $errors->has('activo') ? ' has-error' : '' }}">
        {!! Form::label('activo', "Activo", ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::checkbox('activo', 1) !!}

            @if ($errors->has('activo'))
                <span class="help-block">
                    <strong>{{ $errors->first('activo') }}</strong>
                </span>
            @endif
        </div>
      </div>

      <div class="form-group {{ $errors->has('detalle') ? ' has-error' : '' }}">
        {!! Form::label('detalle', 'Detalle',['class' => 'col-sm-4 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::textarea('detalle', null, ['class' => 'form-control' , 'rows' => '8']) !!}

            @if ($errors->has('detalle'))
                <span class="help-block">
                    <strong>{{ $errors->first('detalle') }}</strong>
                </span>
            @endif
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
          {{-- {!!Form::submit('Registrar', ['class' => 'btn btn-primary']) !!} --}}
          <button type="submit" class="btn btn-primary">
              <i class=" glyphicon glyphicon-user"></i> Registrar
          </button>
        </div>
      </div>

    {!! Form::close() !!}
  </div>
</div>
</article>
@endsection
