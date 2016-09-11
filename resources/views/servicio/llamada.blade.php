@extends('layouts.app')

@section('content')

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      Inicio Alerta
    </div>
    <div>
      {!! Form::open([ 'route' => 'servicio.store', 'class' => 'form-horizontal', 'method' => 'POST']) !!}
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
</div>
@endsection
