@php
  $noacargo=!$ingresado->bombero->acargo($servicio)||!$ingresado->bombero->acargo($servicio)->a_cargo;
@endphp
@if ($asistselec<6 || !$noacargo)
  <div class="col-lg-6 col-sm-12 control-label" id="bombero-{{$ingresado->bombero->id}}">
    @php $presente='presentesOn' @endphp
@else
  <div class="col-lg-6 col-sm-12 control-label" id="bombero-{{$ingresado->bombero->id}}">
    @php $presente='presentesOff' @endphp
@endif
    {!! Form::label('bombero-'.$ingresado->bombero->id, $ingresado->bombero->nombre." ". $ingresado->bombero->apellido,['class' => 'col-lg-6 col-sm-5 control-label']) !!}
    <div class="col-sm-4">
      @if ($noacargo)
        {{Form::select('bombero-'.$ingresado->bombero->id,   config('selects.tipoAsistencia'), $asistselec,['class' => 'form-control'])}}
      @else
        {{Form::select('bombero-'.$ingresado->bombero->id,  [2 =>'a cargo'],2,['class' => 'form-control'])}}
      @endif
    </div>
    <i class="col-sm-1 glyphicon glyphicon-ok-circle {{$presente}}"></i>
  </div>
