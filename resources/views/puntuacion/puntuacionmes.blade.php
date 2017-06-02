{{-- <table  class="table table-bordered" id="tablaPuntuacion">
  <thead><!--Titulos de la tabla-->
    <tr>
      <th class="text-center">Nº legajo</th>
      <th class="text-center">Apellido Nombre</th>
      <th class="text-center">cargar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($bomberos as $bombero)
      @if (!$bombero->puntuo($mes,$año))
      <tr id = "modal{{$bombero->id}}">
        <td class="text-center">{{$bombero->nro_legajo}}</td>
        <td class="text-center">{{$bombero->apellido.' '.$bombero->nombre}}</td>
        <td class="text-center"><button idmodal={{$bombero->id}} type="button" class="btn btn-primary mp" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Puntuar</button></td>
      </tr>
      @endif
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td class="text-center" colspan="3"> lista de bomberos activos </td>
    </tr>
  </tfoot>
  <br>
</table> --}}

<div class="form-group" id="listaPuntuacion">
  @foreach ($bomberos as $bombero)
    @if (!$bombero->puntuo($mes,$año))
    <div class="col-sm-6" id = "modal{{$bombero->id}}">
      <p class="text-center col-sm-10">{{$bombero->nro_legajo.' - '.$bombero->apellido.' '.$bombero->nombre}}</p>
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
