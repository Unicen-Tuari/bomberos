@extends('layouts.app')

@section('content')

<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-users" aria-hidden="true"></span>
      <h4>Editar Asistencia</h4>
    </div>
    <div class="panel-body">

      <div class="form-group col-sm-6">
        {{ Form::label('Buscar', 'Buscar: ',['class' => 'control-label col-sm-2 col-sm-offset-2']) }}
        <div class="col-sm-5">
          {{Form::text('busqueda', null, ['placeholder'=>"Buscar por nombre",'id'=>"inputFilterPuntuacion",'class' => 'form-control'])}}
        </div>
      </div>
      {!! Form::open([ 'route' => ['asistencia.update',$reunion], 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
        <div class="form-group {{ $errors->has('fecha_reunion') ? ' has-error' : '' }}">
          {!! Form::label('fecha_reunion', 'Fecha reunion',['class' => 'col-sm-2 control-label']) !!}
          <div class="col-sm-3">
            {!! Form::label('fecha_reunion', \Carbon\Carbon::parse($reunion)->format('d-m-Y') ,['class' => 'control-label']) !!}
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
              $vino=$bombero->presente($reunion);
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
