@extends('layouts.app')

@section('content')

<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-users" aria-hidden="true"></span>
      <h4>Presentes al Servicio N° {{$servicio}}</h4>
    </div>
    <div class="panel-body">
      {!! Form::open([ 'route' => 'servicio.guardar_presentes', 'class' => 'form-horizontal', 'method' => 'POST']) !!}

        {!! Form::hidden('servicio', $servicio) !!}

        @foreach($ingresados as $ingresado)
          <div class="col-sm-6 control-label {{ $errors->has('bombero-'.$ingresado->bombero->id) ? ' has-error' : '' }}">
            {!! Form::label('bombero-'.$ingresado->bombero->id, $ingresado->bombero->nombre." ". $ingresado->bombero->apellido,['class' => 'col-sm-5 col-sm-offset-1 control-label']) !!}
            <div class="col-sm-4">
              {{Form::select('bombero-'.$ingresado->bombero->id,  $tipos_asist, 5,['class' => 'form-control'])}}

              @if ($errors->has('bombero-'.$ingresado->bombero->id))
                  <span class="help-block">
                      <strong>{{ $errors->first('bombero-'.$ingresado->bombero->id) }}</strong>
                  </span>
              @endif
            </div>
          </div>
        @endforeach
        <div>

        </div>
        <div class="form-group">
          <div class="col-md-3 col-md-offset-6">
            <button type="submit" class="btn btn-primary">
                <i class="glyphicon glyphicon-bell"></i> Finalizar
            </button>
          </div>
        </div>

      {!! Form::close() !!}
    </div>
  </div>
</article>
@endsection
