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
        
        <div class="form-group bomberosparticipantes">
          {{--  esto tengo que acomodar: todos los bomberos--}}
          @foreach($bomberos as $bombero)
            @if ($bombero->ingresado)
              @php
                if ($acargo==$bombero->id) {
                  $asistselec=2;
                }else {
                  $asistselec=5;
                }
              @endphp
            @else
              @php
                $asistselec=10;
              @endphp
            @endif
            @php
              $ingresado = (object) array('bombero' => $bombero);
            @endphp
            @include('asistencia.bombero')
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
  {!! Html::script('assets/js/ajaxbombero.js') !!}
@endsection
