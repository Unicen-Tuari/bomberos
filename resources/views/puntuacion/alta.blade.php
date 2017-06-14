@php
  $ao_acad=$dedicacion=$especiales=$licencia=$castigo=0;
  $detalle=null;
@endphp
<div class="modal-body form-group grupo">
  {!! Form::open([ 'route' => 'puntuacion.store', 'class' => 'form-horizontal', 'method' => 'POST','id'=>'post']) !!}

    {!! Form::hidden('mes', $mes) !!}
    {!! Form::hidden('año', $año) !!}
    {!! Form::hidden('id_bombero', $bombero->id) !!}
    @include('puntuacion.form-puntuacion')
  {!! Form::close() !!}
  <div class="col-sm-12">
    <div class="col-sm-offset-10 col-sm-1">
      <button class="btn btn-lg glyphicon glyphicon-remove" data-dismiss="modal"></button>
    </div>
    <div class="col-sm-1">
      <button type="submit" bombero='{{$bombero->id}}' class="btn btn-lg glyphicon glyphicon-floppy-saved" data-dismiss="modal" id="save"></button>
    </div>
  </div>
  <br>
</div>

{!! Html::script('assets/js/puntuacion-post.js') !!}
