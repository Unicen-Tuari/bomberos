<div class="col-lg-6 col-md-12 control-label {{ $errors->has('bombero-'.$bombero->id) ? ' has-error' : '' }}" id="bombero-{{$bombero->id}}">
  {!! Form::label('bombero-'.$bombero->id, $bombero->nombre." ". $bombero->apellido,['class' => 'col-lg-7 col-md-5 control-label']) !!}
  <div class="col-sm-4">
    {!! Form::checkbox('bombero-'.$bombero->id, 1) !!}

    @if ($errors->has('bombero-'.$bombero->id))
        <span class="help-block">
            <strong>{{ $errors->first('bombero-'.$bombero->id) }}</strong>
        </span>
    @endif
  </div>
</div>
