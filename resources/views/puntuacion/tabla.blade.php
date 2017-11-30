<table  class="table table-bordered">
  <thead><!--Titulos de la tabla-->
    <tr>
      <th class="text-center" colspan="2">Periodo {{config('selects.meses')[$month].'-'.$year}}</th>
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
    @if ($bombero->puntuo($month,$year))
    <tr>
      <td><a idmodal={{$bombero->puntuacion($month,$year)->id}} href="" class="glyphicon glyphicon-edit mp" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
      </a> {{$bombero->nro_legajo}}</td>
      <td class="filtro text-center">{{$bombero->apellido.' '.$bombero->nombre}}</td>
      <td class="text-center">{{$bombero->puntuacion($month,$year)->ao_cant}}</td>
      <td class="text-center">{{$bombero->puntuacion($month,$year)->ao_punt}}</td>
      <td class="text-center">{{$bombero->puntuacion($month,$year)->ao_acad}}</td>
      <td class="text-center">{{$bombero->puntuacion($month,$year)->accid_cant}}</td>
      <td class="text-center">{{$bombero->puntuacion($month,$year)->accid_punt}}</td>
      <td class="text-center">{{$bombero->puntuacion($month,$year)->dedicacion}}</td>
      <td class="text-center">{{$bombero->puntuacion($month,$year)->guar_cant}}</td>
      <td class="text-center">{{$bombero->puntuacion($month,$year)->guar_punt}}</td>
      <td class="text-center">{{$bombero->puntuacion($month,$year)->especiales}}</td>
      <td class="text-center">{{$bombero->puntuacion($month,$year)->licencia}}</td>
      <td class="text-center">{{$bombero->puntuacion($month,$year)->castigo}}</td>
      <td class="text-center">{{$bombero->puntuacion($month,$year)->total}}</td>
      <th class="text-center">
        <a detalle='{{$bombero->puntuacion($month,$year)->detalle}}'
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
