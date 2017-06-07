
@php
  $bombero=$puntuacion->bombero;
  $ao_acad=$puntuacion->ao_acad;
  $dedicacion=$puntuacion->dedicacion;
  $especiales=$puntuacion->especiales;
  $licencia=$puntuacion->licencia;
  $castigo=$puntuacion->castigo;
  $detalle=$puntuacion->detalle;
@endphp
<div class="modal-body form-group grupo">
  {!! Form::open([ 'route' => ['puntuacion.update',$puntuacion->id], 'class' => 'form-horizontal', 'method' => 'PUT','id'=>'put']) !!}
    @include('puntuacion.form-puntuacion')
  {!! Form::close() !!}
  <div class="col-sm-12">
    <div class="col-sm-offset-10 col-sm-1">
      <button class="btn btn-lg glyphicon glyphicon-remove simulara" data-dismiss="modal"></button>
    </div>
    <div class="col-sm-1">
      <button type="submit" bombero='{{$bombero->id}}' class="btn btn-lg glyphicon glyphicon-floppy-saved simulara" id="edit" data-dismiss="modal"></button>
    </div>
  </div>
</div>

{!! Html::script('assets/js/puntuacion-post.js') !!}
