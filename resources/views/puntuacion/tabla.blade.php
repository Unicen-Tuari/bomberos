<table  class="table table-bordered">
  <thead><!--Titulos de la tabla-->
    <tr>
      <th class="text-center" colspan="2">Periodo {{config('selects.meses')[$mes].'-'.$año}}</th>
      <th class="text-center" colspan="3">ASIST OBLIG</th>
      <th class="text-center" colspan="2">ACCID. {{$cantserv}}</th>
      <th class="text-center">Dedicación</th>
      <th class="text-center" colspan="2">Asist. Guardias</th>
      <th class="text-center">Especiales</th>
      <th class="text-center">Licencia</th>
      <th class="text-center">Castigo</th>
      <th class="text-center">Total</th>
      <th class="text-center" rowspan="2">Observaciones</th>
    </tr>
    <tr>
      <th class="text-center">Legajo</th>
      <th class="text-center">Nombre completo</th>
      <th class="text-center" colspan="2">Cant./OI/Pts</th>
      <th class="text-center">ACAD</th>
      <th class="text-center">Cant.</th>
      <th class="text-center">Ptos.</th>
      <th class="text-center">OI ACAD</th>
      <th class="text-center">Cant.</th>
      <th class="text-center">Ptos.</th>
      <th class="text-center">Ptos.</th>
      <th class="text-center">Ptos.</th>
      <th class="text-center">Ptos.</th>
      <th class="text-center">Ptos.</th>
    </tr>
  </thead>
  <tbody class="tableFilter">
    @foreach ($bomberos as $bombero)
    @if ($bombero->puntuo($mes,$año))
    <tr>
      <td><a idmodal={{$bombero->puntuacion($mes,$año)->id}} href="" class="glyphicon glyphicon-edit mp" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
      </a> {{$bombero->nro_legajo}}</td>
      <td class="filtro text-center">{{$bombero->apellido.' '.$bombero->nombre}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->ao_cant}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->ao_punt}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->ao_acad}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->accid_cant}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->accid_punt}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->dedicacion}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->guar_cant}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->guar_punt}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->especiales}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->licencia}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->castigo}}</td>
      <td class="text-center">{{$bombero->puntuacion($mes,$año)->total}}</td>
      <th class="text-center">
        <a detalle='{{$bombero->puntuacion($mes,$año)->detalle}}'
        href="" class="glyphicon glyphicon-eye-open detalle" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo">
      </a></th>
    </tr>
    @else
    <tr>
      <td class="text-center">{{$bombero->nro_legajo}}</td>
      <td class="filtro text-center">{{$bombero->apellido.' '.$bombero->nombre}}</td>
      <td class="text-center">0</td>
      <td class="text-center">0</td>
      <td class="text-center">0</td>
      <td class="text-center">0</td>
      <td class="text-center">0</td>
      <td class="text-center">0</td>
      <td class="text-center">0</td>
      <td class="text-center">0</td>
      <td class="text-center">0</td>
      <td class="text-center">0</td>
      <td class="text-center">0</td>
      <td class="text-center">0</td>
      <td class="text-center"> </td>
    </tr>
    @endif
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td class="text-center" colspan="15"> lista de bomberos activos </td>
    </tr>
  </tfoot>
  <br>
</table>

{{-- Inicio MODAL --}}
<div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content form-horizontal">
      <div class="form-group">
        <h4 class="text-center" > Observaciones</h4>
        {!! Form::label('detalle', 'Detalle',['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-9">
          {!! Form::textarea('detalle', null, ['class' => 'form-control', 'rows' => '4','id'=>'detalle']) !!}
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-10 col-sm-1">
          <button class="btn btn-lg glyphicon glyphicon-remove" data-dismiss="modal"></button>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- Fin --}}

{!! Html::script('assets/js/ajaxmodal.js') !!}
