<div class="form-group">
  <div class="col-sm-12">
    {!! Form::label('legajo', 'Nº Legajo: '.$bombero->nro_legajo().' - ',['class' => 'control-label']) !!}
    {!! Form::label('legajo', 'Apellido Nombre: '.$bombero->apellido.' '.$bombero->nombre,['class' => 'control-label']) !!}
  </div>
</div>
<div class="form-group">
  <div class="col-sm-5">
    {!! Form::label('legajo', 'Reuniones:'.$dias,['class' => 'col-sm-4']) !!}
    {!! Form::label('legajo3', 'Puntos',['class' => 'col-sm-4']) !!}
    {!! Form::label('legajo3', 'Academia',['class' => 'col-sm-4']) !!}
    {!! Form::hidden('ao_cant', $asistencia) !!}
    {!! Form::text('aocant', $asistencia , ['class' => 'control-label col-sm-4','disabled' => 'disabled']) !!}
    {!! Form::hidden('ao_punt', round($puntasis, 2)) !!}
    {!! Form::text('aopunt', round($puntasis, 2) , ['class' => 'control-label col-sm-4','disabled' => 'disabled', 'id' => 'asistencia' . $bombero->id]) !!}
    {!! Form::text('ao_acad', $ao_acad, ['class' => 'control-label col-sm-4 ao_acad','idacad'=>$bombero->id, 'id' => 'academia' . $bombero->id]) !!}
  </div>

  <div class="col-sm-5">
    {!! Form::label('legajo', 'Accidentales: '.$cantserv,['class' => 'col-sm-12 control-label']) !!}
    {!! Form::hidden('accid_cant', $accid) !!}
    {!! Form::text('accidcant', $accid , ['class' => 'control-label col-sm-6','disabled' => 'disabled']) !!}
    {!! Form::hidden('accid_punt', round($puntaccid, 2)) !!}
    {!! Form::text('accidpunt', round($puntaccid, 2) , ['class' => 'control-label col-sm-6','disabled' => 'disabled', 'id' => 'accidpunt' . $bombero->id]) !!}
  </div>

  <div class="col-sm-2">
    {!! Form::label('legajo', 'Dedicacion',['class' => 'col-sm-12 control-label']) !!}
    {!! Form::text('dedicacion',$dedicacion , ['class' => 'control-label col-sm-12 dedicacion','iddedicacion'=>$bombero->id, 'id' => 'dedicacion' . $bombero->id]) !!}
  </div>
  <div class="col-sm-4">
    {!! Form::label('legajo', 'Asistencias Guardias: '.$cantguar,['class' => 'col-sm-12 control-label']) !!}
    {!! Form::hidden('guar_cant', $guardia) !!}
    {!! Form::text('guarcant', $guardia , ['class' => 'control-label col-sm-6','disabled' => 'disabled']) !!}
    {!! Form::hidden('guar_punt', round($puntguar, 2)) !!}
    {!! Form::text('guarpunt', round($puntguar, 2) , ['class' => 'control-label col-sm-6','disabled' => 'disabled', 'id' => 'guardia' . $bombero->id]) !!}
  </div>

  <div class="col-sm-2">
    {!! Form::label('legajo', 'Especiales',['class' => 'col-sm-12 control-label']) !!}
    {!! Form::text('especiales',$especiales , ['class' => 'control-label col-sm-12 especiales','idespeciales'=>$bombero->id, 'id' => 'especiales' . $bombero->id]) !!}
  </div>

  <div class="col-sm-2">
    {!! Form::label('legajo', 'Licencia',['class' => 'col-sm-12 control-label']) !!}
    {!! Form::text('licencia', $licencia , ['class' => 'control-label col-sm-12 licencia','idlicencia'=>$bombero->id, 'id' => 'licencia' . $bombero->id]) !!}
  </div>

  <div class="col-sm-2">
    {!! Form::label('legajo', 'Castigo',['class' => 'col-sm-12 control-label']) !!}
    {!! Form::text('castigo', $castigo , ['class' => 'control-label col-sm-12 castigo','idcastigo'=>$bombero->id, 'id' => 'castigo' . $bombero->id]) !!}
  </div>

  <div class="col-sm-2">
    {!! Form::label('total', 'Total',['class' => 'col-sm-12 control-label']) !!}
    {!! Form::text('total', round($puntasis+$puntaccid+$puntguar+$ao_acad+$dedicacion+$especiales+$licencia-$castigo, 2) , ['class' => 'control-label col-sm-12', 'id' => 'total' . $bombero->id]) !!}
  </div>
</div>
<div class="form-group">
  {!! Form::label('detalle', 'Detalle:',['class' => 'col-sm-1 control-label']) !!}
  <div class="col-sm-12">
    {!! Form::textarea('detalle', $detalle, ['class' => 'form-control', 'rows' => '3']) !!}
  </div>
</div>
