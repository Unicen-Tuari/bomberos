@php
  $noacargo=!$ingresado->bombero->acargo($servicio)||!$ingresado->bombero->acargo($servicio)->a_cargo;
@endphp
@if ($asistselec<6 || !$noacargo)
  <div class="col-lg-6 col-md-12 control-label {{ $errors->has('bombero-'.$ingresado->bombero->id) ? ' has-error' : '' }}" id="bombero-{{$ingresado->bombero->id}}">
      <i class="glyphicon glyphicon-ok-circle presentesOn"></i>
@else
  <div class="col-lg-6 col-md-12 control-label {{ $errors->has('bombero-'.$ingresado->bombero->id) ? ' has-error' : '' }}" id="bombero-{{$ingresado->bombero->id}}">
      <i class="glyphicon glyphicon-remove-circle presentesOff"></i>
@endif
  {!! Form::label('bombero-'.$ingresado->bombero->id, $ingresado->bombero->nombre." ". $ingresado->bombero->apellido,['class' => 'col-lg-7 col-md-5 control-label']) !!}
  <div class="col-sm-4">
    @if ($noacargo)
      {{Form::select('bombero-'.$ingresado->bombero->id,   config('selects.tipoAsistencia'), $asistselec,['class' => 'form-control'])}}
    @else
      {{Form::select('bombero-'.$ingresado->bombero->id,  [2 =>'a cargo'],2,['class' => 'form-control'])}}
    @endif

    @if ($errors->has('bombero-'.$ingresado->bombero->id))
        <span class="help-block">
            <strong>{{ $errors->first('bombero-'.$ingresado->bombero->id) }}</strong>
        </span>
    @endif
  </div>
</div>
