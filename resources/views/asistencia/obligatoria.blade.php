@extends('layouts.app')

@section('content')

<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-users" aria-hidden="true"></span>
      <h4>Asistencia Obligatoria</h4>
    </div>
    <div class="panel-body">

      <div class="form-group col-sm-12">
        {{ Form::label('Buscar', 'Buscar: ',['class' => 'control-label col-sm-1 col-sm-offset-2']) }}
        <div class="col-sm-3">
          {{Form::text('busqueda', null, ['placeholder'=>"Buscar por nombre",'id'=>"inputFilterPuntuacion",'class' => 'form-control'])}}
        </div>
      </div>
      {!! Form::open([ 'route' => 'asistencia.store', 'class' => 'form-horizontal', 'method' => 'POST']) !!}

        <div class="form-group bomberosparticipantes">
          @foreach($bomberos as $bombero)
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
