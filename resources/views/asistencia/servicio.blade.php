@extends('layouts.app')

@section('content')

<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-users" aria-hidden="true"></span>
      <h4>Presentes al Servicio N° {{$servicio}}</h4>
    </div>
    <div class="panel-body form-horizontal">
      <div class="form-group bomberosparticipantes">
        @foreach($bomberos as $ingresado)
          @php
            $asistselec=$ingresado->tipo_id;
          @endphp
          @include('asistencia.bombero')
        @endforeach
      </div>
      <div class="col-sm-3 col-sm-offset-6">
        <a href="{{route('servicio.index')}}" class="">
          <button type="submit" class="btn btn-primary glyphicon glyphicon-ok">
          Volver</button></a>
      </div>
    </div>
  </div>
</article>
@endsection

@section('js')
  {!! Html::script('assets/js/ajaxbombero.js') !!}
@endsection
