@if ($asistselec<6)
  <div class="col-lg-6 col-md-12 control-label alert-success{{ $errors->has('bombero-'.$ingresado->bombero->id) ? ' has-error' : '' }}" id="bombero-{{$ingresado->bombero->id}}">
@else
  <div class="col-lg-6 col-md-12 control-label alert-danger{{ $errors->has('bombero-'.$ingresado->bombero->id) ? ' has-error' : '' }}" id="bombero-{{$ingresado->bombero->id}}">
@endif
  {!! Form::label('bombero-'.$ingresado->bombero->id, $ingresado->bombero->nombre." ". $ingresado->bombero->apellido,['class' => 'col-lg-7 col-md-5 control-label']) !!}
  <div class="col-sm-4">
    {{Form::select('bombero-'.$ingresado->bombero->id,   config('selects.tipoAsistencia'), $asistselec,['class' => 'form-control'])}}

    @if ($errors->has('bombero-'.$ingresado->bombero->id))
        <span class="help-block">
            <strong>{{ $errors->first('bombero-'.$ingresado->bombero->id) }}</strong>
        </span>
    @endif
  </div>
</div>
