@extends('layouts.app')

@section('content')

<article class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Inicio Alerta
    </div>
    <div class="panel-body">
      {!! Form::open([ 'route' => 'servicio.iniciado', 'class' => 'form-horizontal', 'method' => 'POST']) !!}
        <div class="form-group">
          {!! Form::label('Tipo', 'Tipo de servicio',['class' => 'col-md-2 col-md-offset-2 control-label']) !!}
          <div class="col-md-2">
            {{Form::select('Tipo', $tipos,null,['class' => 'form-control'])}}
          </div>
        </div>

        <div class="form-group {{ $errors->has('direccion') ? ' has-error' : '' }}">
          {!! Form::label('direccion', 'Direccion',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-6">
              {!! Form::text('direccion', null, ['class' => 'form-control']) !!}

              @if ($errors->has('direccion'))
                  <span class="help-block">
                      <strong>{{ $errors->first('direccion') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('descripcion') ? ' has-error' : '' }}">
          {!! Form::label('descripcion', 'Descripcion',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-6">
              {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => 2]) !!}

              @if ($errors->has('descripcion'))
                  <span class="help-block">
                      <strong>{{ $errors->first('descripcion') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('alarma') ? ' has-error' : '' }}">
          {!! Form::label('alarma', 'Hora alarma',['class' => 'col-sm-4 control-label']) !!}
          <div class="col-sm-2">
            {!! Form::date('alarma', \Carbon\Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->toDateTimeString(),['class' => 'form-control']) !!}

            @if ($errors->has('alarma'))
                <span class="help-block">
                    <strong>{{ $errors->first('alarma') }}</strong>
                </span>
            @endif
          </div>
        </div>


        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            {{-- {!!Form::submit('Registrar', ['class' => 'btn btn-primary']) !!} --}}
            <button type="submit" class="btn btn-primary">
                <i class="glyphicon glyphicon-bell"></i> Iniciar
            </button>
          </div>
        </div>

      {!! Form::close() !!}
    </div>
  </div>
</article>
@endsection
