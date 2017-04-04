@extends('layouts.app')

@section('content')

<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-users" aria-hidden="true"></span>
      <h4>Asistencia del {{\Carbon\Carbon::parse($reunion)->format('d-m-Y')}}</h4>
    </div>
    <div class="panel-body">

      <div class="form-group col-sm-12">
        {{ Form::label('Buscar', 'Buscar: ',['class' => 'control-label col-sm-2 col-sm-offset-2']) }}
        <div class="col-sm-4">
          {{Form::text('busqueda', null, ['placeholder'=>"Buscar por nombre",'id'=>"inputFilterPuntuacion",'class' => 'form-control'])}}
        </div>
      </div>

      <div class="form-group bomberosparticipantes">
        @foreach($bomberos as $bombero)
          @php
            $vino=$bombero->presente($reunion);
          @endphp
          @include('asistencia.asistieron')
        @endforeach
      </div>

    </div>
  </div>
</article>
@endsection
