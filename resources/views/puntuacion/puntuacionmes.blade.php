
<div class="form-group col-sm-11 tableFilter">
  @foreach ($bomberos as $bombero)
    @if (!$bombero->puntuo($mes,$año))
    <div class="form-group col-sm-6 " id = "modal{{$bombero->id}}">
      <p class="text-center col-sm-10 filtro">{{$bombero->nro_legajo.' - '.$bombero->apellido.' '.$bombero->nombre}}</p>
      <button idmodal={{$bombero->id}} type="button" class="col-sm-2 btn btn-primary mp" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Puntuar</button>
    </div>
    @endif
  @endforeach
</div>

{{-- Inicio MODAL --}}
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="puntuacion">

    </div>
  </div>
</div>
{{-- Fin --}}


{!! Html::script('assets/js/ajaxmodal.js') !!}
