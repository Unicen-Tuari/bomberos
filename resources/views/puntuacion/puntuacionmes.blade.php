@foreach ($bomberos as $key => $bombero)
  @if (!$bombero->puntuo($mes,$año))
    <div class="col-sm-9 col-sm-offset-3" id = "modal{{$bombero->id}}">
      {!! Form::label('legajo', 'Nº legajo'.$bombero->nro_legajo.' - Apellido Nombre: '.$bombero->apellido.' '.$bombero->nombre,['class' => 'control-label']) !!}
      <button idmodal={{$bombero->id}} type="button" class="btn btn-primary mp" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Puntuar</button>
    </div>
  @endif
@endforeach

{{-- Inicio MODAL --}}
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="puntuacion">

    </div>
  </div>
</div>
{{-- Fin --}}


{!! Html::script('assets/js/ajaxmodal.js') !!}
