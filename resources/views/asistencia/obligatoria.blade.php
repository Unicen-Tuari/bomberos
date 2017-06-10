@extends('layouts.app')

@section('content')

<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-users" aria-hidden="true"></span>
      <h4>Asistencia Obligatoria</h4>
    </div>
    <div class="panel-body">

      <div class="form-group col-sm-6">
        {{ Form::label('Buscar', 'Buscar: ',['class' => 'control-label col-sm-2 col-sm-offset-2']) }}
        <div class="col-sm-5">
          {{Form::text('busqueda', null, ['placeholder'=>"Buscar por nombre", 'class' => 'form-control inputFilter'])}}
        </div>
      </div>
      {!! Form::open([ 'route' => 'asistencia.store', 'class' => 'form-horizontal', 'method' => 'POST']) !!}

        <div class="form-group {{ $errors->has('fecha_reunion') ? ' has-error' : '' }}">
          {!! Form::label('fecha_reunion', 'Fecha reunion',['class' => 'col-sm-2 control-label']) !!}
          <div class="col-sm-3">
            {!! Form::date('fecha_reunion', \Carbon\Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires')) ,['class' => 'form-control']) !!}

            @if ($errors->has('fecha_reunion'))
                <span class="help-block">
                    <strong>{{ $errors->first('fecha_reunion') }}</strong>
                </span>
            @endif
          </div>
        </div>

        <div class="form-group bomberosparticipantes">
          @foreach($bomberos as $bombero)
            @php
              $vino=0;//como usasmos mismo tpl para editar en la alta asumismo que ninguno vino
            @endphp
            @include('asistencia.asistencia')
          @endforeach
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

@section('js')
  {!! Html::script('assets/js/ajaxpuntuacion.js') !!}
@endsection
