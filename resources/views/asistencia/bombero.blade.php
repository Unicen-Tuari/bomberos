<div class="col-sm-6 control-label {{ $errors->has('bombero-'.$ingresado->bombero->id) ? ' has-error' : '' }}">
  {!! Form::label('bombero-'.$ingresado->bombero->id, $ingresado->bombero->nombre." ". $ingresado->bombero->apellido,['class' => 'col-sm-5 col-sm-offset-1 control-label']) !!}
  <div class="col-sm-4">
    {{Form::select('bombero-'.$ingresado->bombero->id,  $tipos_asist, 5,['class' => 'form-control'])}}

    @if ($errors->has('bombero-'.$ingresado->bombero->id))
        <span class="help-block">
            <strong>{{ $errors->first('bombero-'.$ingresado->bombero->id) }}</strong>
        </span>
    @endif
  </div>
</div>
