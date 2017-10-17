<div class="col-lg-6 col-md-12 control-label" id="bombero-{{$bombero->id}}">
  {!! Form::label('bombero-'.$bombero->id, $bombero->nombre." ". $bombero->apellido,['class' => 'col-lg-7 col-md-5 control-label filtro']) !!}
  <div class="col-sm-4">
    {!! Form::checkbox('bombero-'.$bombero->id, 1,$vino, ['data-toggle' => "toggle", 'data-onstyle'=>"success", 'data-offstyle'=>"danger", 'data-on' => 'Presente', 'data-off' => 'Ausente']) !!}
  </div>
</div>