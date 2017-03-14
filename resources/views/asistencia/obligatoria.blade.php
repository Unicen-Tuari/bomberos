@extends('layouts.app')

@section('content')

<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-users" aria-hidden="true"></span>
      <h4>Asistencia Obligatoria</h4>
    </div>
    <div class="panel-body">

      {!! Form::open([ 'route' => 'asistencia.presentes', 'class' => 'form-horizontal', 'method' => 'POST']) !!}

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
