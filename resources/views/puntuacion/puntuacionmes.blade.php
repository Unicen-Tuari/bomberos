
  @foreach ($bomberos as $bombero)
  <div class="col-sm-12 form-group grupo" id="bloque{{$bombero->id}}">
    {!! Form::open([ 'route' => 'puntuacion.store', 'class' => 'form-horizontal', 'method' => 'POST', 'id' => 'save-'.$bombero->id]) !!}

    {!! Form::hidden('mes', $mes) !!}
    {!! Form::hidden('año', $año) !!}
    {!! Form::hidden('id_bombero', $bombero->id) !!}
    <div class="col-sm-11 form-group">
      {!! Form::label('legajo', 'Nº Legajo: '.$bombero->nro_legajo.' - ',['class' => 'control-label']) !!}
      {!! Form::label('legajo', 'Apellido Nombre: '.$bombero->apellido.' '.$bombero->nombre,['class' => 'control-label']) !!}
    </div>
    @php
      $accid=$bombero->accidentales($mes,$año);
      $guardia=$bombero->guardias($mes,$año);
      $asistencia=$bombero->asistenciasmes($mes,$año);
      $puntasis=10;
      if ($dias!=0) {
        $puntasis=($puntasis/$dias)*$asistencia;
      }
      $puntuacion=0;
      if ($cantserv<7) {
        $puntuacion=35-(5*($cantserv-$accid));
      }else {
        if ($accid!=0) {
          $puntuacion=(35/$cantserv)*$accid;
        }
      }
      $puntguar=0;
      if ($guardia!=0) {
          $puntguar=(10/$cantguar)*$guardia;
      }
    @endphp
    <div class="col-sm-12 form-group">
      <div class="col-sm-12">
        <div class="col-sm-2">
          {!! Form::label('legajo', 'Reuniones: '.$dias.' Pts. ACCAD',['class' => 'control-label']) !!}
        </div>

        <div class="col-sm-2">
          {!! Form::label('legajo', 'Accidentales: '.$cantserv,['class' => 'control-label']) !!}
        </div>

        <div class="col-sm-1">
          {!! Form::label('legajo', 'Dedicacion',['class' => 'control-label']) !!}
        </div>

        <div class="col-sm-2">
          {!! Form::label('legajo', 'Asistencias Guardias: '.$cantguar,['class' => 'control-label']) !!}
        </div>

        <div class="col-sm-1">
          {!! Form::label('legajo', 'Especiales',['class' => 'control-label']) !!}
        </div>

        <div class="col-sm-1">
          {!! Form::label('legajo', 'Licencia',['class' => 'control-label']) !!}
        </div>

        <div class="col-sm-1">
          {!! Form::label('legajo', 'Castigo',['class' => 'control-label']) !!}
        </div>

        <div class="col-sm-1">
          {!! Form::label('total', 'Total',['class' => 'control-label']) !!}
        </div>
      </div>
      <div class="col-sm-12">
        <div class="col-sm-2">
          {!! Form::hidden('ao_cant', $asistencia) !!}
          {!! Form::text('aocant', $asistencia , ['class' => 'control-label col-sm-4','disabled' => 'disabled']) !!}
          {!! Form::hidden('ao_punt', round($puntasis, 2)) !!}
          {!! Form::text('aopunt', round($puntasis, 2) , ['class' => 'control-label col-sm-4','disabled' => 'disabled']) !!}
          {!! Form::text('ao_acad', 0, ['class' => 'control-label col-sm-4 ao_acad','idacad'=>$bombero->id]) !!}
        </div>

        <div class="col-sm-2">
          {!! Form::hidden('accid_cant', $accid) !!}
          {!! Form::text('accidcant', $accid , ['class' => 'control-label col-sm-6','disabled' => 'disabled']) !!}
          {!! Form::hidden('accid_punt', round($puntuacion, 2)) !!}
          {!! Form::text('accidpunt', round($puntuacion, 2) , ['class' => 'control-label col-sm-6','disabled' => 'disabled']) !!}
        </div>

        <div class="col-sm-1">
          {!! Form::text('dedicacion', 0 , ['class' => 'control-label col-sm-12 dedicacion','iddedicacion'=>$bombero->id]) !!}
        </div>

        <div class="col-sm-2">
          {!! Form::hidden('guar_cant', $guardia) !!}
          {!! Form::text('guarcant', $guardia , ['class' => 'control-label col-sm-6','disabled' => 'disabled']) !!}
          {!! Form::hidden('guar_punt', round($puntguar, 2)) !!}
          {!! Form::text('guarpunt', round($puntguar, 2) , ['class' => 'control-label col-sm-6','disabled' => 'disabled']) !!}
        </div>

        <div class="col-sm-1">
          {!! Form::text('especiales', 0 , ['class' => 'control-label col-sm-12 especiales','idespeciales'=>$bombero->id]) !!}
        </div>

        <div class="col-sm-1">
          {!! Form::text('licencia', 0 , ['class' => 'control-label col-sm-12 licencia','idlicencia'=>$bombero->id]) !!}
        </div>

        <div class="col-sm-1">
          {!! Form::text('castigo', 0 , ['class' => 'control-label col-sm-12 castigo','idcastigo'=>$bombero->id]) !!}
        </div>

        <div class="col-sm-1">
          {!! Form::hidden('total', round($puntasis+$puntuacion+$puntguar, 2),['id'=>'total'.$bombero->id]) !!}
          {!! Form::text('tota', round($puntasis+$puntuacion+$puntguar, 2) , ['class' => 'control-label col-sm-12','disabled' => 'disabled','id'=>'totalv'.$bombero->id]) !!}
        </div>
      </div>
    </div>

    <div class="col-sm-11 form-group">
      {!! Form::label('detalle', 'Detalle:',['class' => 'col-sm-1 control-label']) !!}

      <div class="col-sm-11 form-group{{ $errors->has('detalle') ? ' has-error' : '' }}">
        {!! Form::textarea('detalle', null, ['class' => 'form-control', 'rows' => '3']) !!}
        @if ($errors->has('detalle'))
            <span class="help-block">
                <strong>{{ $errors->first('detalle') }}</strong>
            </span>
        @endif
      </div>
    </div>

  {!! Form::close() !!}
  <button type="submit" class="col-sm-1 btn btn-lg glyphicon glyphicon-floppy-saved simulara save" bombero={{$bombero->id}}></button>
  </div>
  @endforeach

  {!! Html::script('assets/js/post.js') !!}
