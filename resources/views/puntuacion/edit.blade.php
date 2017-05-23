@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-user" aria-hidden="true"></span>
      <h4>Modificar puntuacion de : {{$bombero->apellido .' '.$bombero->nombre .'-'.$bombero->nro_legajo}}</h4>
    </div>
    <div class="panel-body">
      {!! Form::open([ 'route' => ['puntuacion.update',$puntuacion->id], 'class' => 'form-horizontal', 'method' => 'PUT']) !!}

          @php
            $accid=$bombero->accidentales($mes,$año);
            $guardia=$bombero->guardias($mes,$año);
            $asistencia=$bombero->asistenciasmes($mes,$año);
            $puntasis=0;
            if ($dias!=0) {
              $puntasis=(10/$dias)*$asistencia;
            }
            $puntaccid=0;
            if ($accid!=0) {
              if ($cantserv<7 && $cantserv!=$accid) {
                $puntaccid=35-(5*($cantserv-$accid));
              }else {
                $puntaccid=(35/$cantserv)*$accid;
              }
            }
            $puntguar=0;
            if ($guardia!=0) {
                $puntguar=(10/$cantguar)*$guardia;
            }
          @endphp

          <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
            {!! Form::label('asistencia', 'Asistencia Obligatoria: '.$dias,['class' => 'col-sm-4 control-label']) !!}
          </div>

          <div class="form-group">
            <div class="{{ $errors->has('ao_cant') ? ' has-error' : '' }}">
              {!! Form::label('ao_cant', 'Cantidad asistencia: '.$asistencia,['class' => 'col-sm-4 control-label']) !!}
              <div class="col-sm-1">
                {!! Form::hidden('ao_cant', $asistencia) !!}
                @if ($errors->has('ao_cant'))
                    <span class="help-block">
                        <strong>{{ $errors->first('ao_cant') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="{{ $errors->has('ao_punt') ? ' has-error' : '' }}">
              {!! Form::label('ao_punt', 'Puntos: '.$puntasis,['class' => 'col-sm-1 control-label']) !!}
              <div class="col-sm-1">
                {!! Form::hidden('ao_punt', $puntasis) !!}

                @if ($errors->has('ao_punt'))
                    <span class="help-block">
                        <strong>{{ $errors->first('ao_punt') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="{{ $errors->has('ao_acad') ? ' has-error' : '' }}">
              {!! Form::label('ao_acad', 'Academia',['class' => 'col-sm-1 control-label']) !!}
              <div class="col-sm-1">
                  {!! Form::text('ao_acad', 0 , ['class' => 'form-control']) !!}

                  @if ($errors->has('ao_acad'))
                      <span class="help-block">
                          <strong>{{ $errors->first('ao_acad') }}</strong>
                      </span>
                  @endif
              </div>
            </div>

          </div>

          <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
            {!! Form::label('accidentales', 'Accidentales: '.$cantserv,['class' => 'col-sm-4 control-label']) !!}
          </div>

          <div class="form-group">
            <div class="{{ $errors->has('accid_cant') ? ' has-error' : '' }}">
              {!! Form::label('accid_cant', 'Cantidad: '.$accid,['class' => 'col-sm-4 control-label']) !!}
              <div class="col-sm-1">
                {!! Form::hidden('accid_cant', $accid) !!}
                @if ($errors->has('accid_cant'))
                    <span class="help-block">
                        <strong>{{ $errors->first('accid_cant') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="{{ $errors->has('accid_punt') ? ' has-error' : '' }}">
              {!! Form::label('accid_punt', 'Puntos: '.$puntaccid,['class' => 'col-sm-1 control-label']) !!}
              <div class="col-sm-1">
                {!! Form::hidden('accid_punt', $puntaccid) !!}

                @if ($errors->has('accid_punt'))
                    <span class="help-block">
                        <strong>{{ $errors->first('accid_punt') }}</strong>
                    </span>
                @endif
              </div>
            </div>
          </div>

          <div class="form-group {{ $errors->has('dedicacion') ? ' has-error' : '' }}">
            {!! Form::label('dedicacion', 'Dedicacion',['class' => 'col-sm-4 control-label']) !!}
            <div class="col-sm-1">
                {!! Form::text('dedicacion', 0 , ['class' => 'form-control']) !!}

                @if ($errors->has('dedicacion'))
                    <span class="help-block">
                        <strong>{{ $errors->first('dedicacion') }}</strong>
                    </span>
                @endif
            </div>
          </div>

          <div class="form-group {{ $errors->has('especiales') ? ' has-error' : '' }}">
            {!! Form::label('especiales', 'Especiales',['class' => 'col-sm-4 control-label']) !!}
            <div class="col-sm-1">
                {!! Form::text('especiales', 0 , ['class' => 'form-control']) !!}

                @if ($errors->has('especiales'))
                    <span class="help-block">
                        <strong>{{ $errors->first('especiales') }}</strong>
                    </span>
                @endif
            </div>
          </div>

          <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
            {!! Form::label('accidentales', 'Asistencias Guardias: '.$cantguar,['class' => 'col-sm-4 control-label']) !!}
          </div>

          <div class="form-group">
            <div class="{{ $errors->has('guar_cant') ? ' has-error' : '' }}">
              {!! Form::label('guar_cant', 'Cantidad: '.$guardia,['class' => 'col-sm-4 control-label']) !!}
              <div class="col-sm-1">
                {!! Form::hidden('guar_cant', $guardia) !!}
                @if ($errors->has('guar_cant'))
                    <span class="help-block">
                        <strong>{{ $errors->first('guar_cant') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="{{ $errors->has('guar_punt') ? ' has-error' : '' }}">
              {!! Form::label('guar_punt', 'Puntos: '.$puntguar,['class' => 'col-sm-1 control-label']) !!}
              <div class="col-sm-1">
                {!! Form::hidden('guar_punt', $puntguar) !!}

                @if ($errors->has('guar_punt'))
                    <span class="help-block">
                        <strong>{{ $errors->first('guar_punt') }}</strong>
                    </span>
                @endif
              </div>
            </div>
          </div>

          <div class="form-group {{ $errors->has('licencia') ? ' has-error' : '' }}">
            {!! Form::label('licencia', 'Licencia',['class' => 'col-sm-4 control-label']) !!}
            <div class="col-sm-1">
                {!! Form::text('licencia', 0 , ['class' => 'form-control']) !!}

                @if ($errors->has('licencia'))
                    <span class="help-block">
                        <strong>{{ $errors->first('licencia') }}</strong>
                    </span>
                @endif
            </div>
          </div>

          <div class="form-group {{ $errors->has('castigo') ? ' has-error' : '' }}">
            {!! Form::label('castigo', 'Castigo',['class' => 'col-sm-4 control-label']) !!}
            <div class="col-sm-1">
                {!! Form::text('castigo', 0 , ['class' => 'form-control']) !!}

                @if ($errors->has('castigo'))
                    <span class="help-block">
                        <strong>{{ $errors->first('castigo') }}</strong>
                    </span>
                @endif
            </div>
          </div>

          <div class="form-group {{ $errors->has('detalle') ? ' has-error' : '' }}">
            {!! Form::label('detalle', 'Detalle',['class' => 'col-sm-4 control-label']) !!}
            <div class="col-sm-5">
                {!! Form::textarea('detalle', null, ['class' => 'form-control' , 'rows' => '6']) !!}

                @if ($errors->has('detalle'))
                    <span class="help-block">
                        <strong>{{ $errors->first('detalle') }}</strong>
                    </span>
                @endif
            </div>
          </div>

          <div class="form-group {{ $errors->has('total') ? ' has-error' : '' }}">
            {!! Form::label('total', 'Total',['class' => 'col-sm-4 control-label']) !!}
            <div class="col-sm-1">
                {!! Form::text('total', $puntuacion->total , ['class' => 'form-control']) !!}

                @if ($errors->has('total'))
                    <span class="help-block">
                        <strong>{{ $errors->first('total') }}</strong>
                    </span>
                @endif
            </div>
          </div>


        <div class="form-group {{ $errors->has('fecha') ? ' has-error' : '' }}">
          {!! Form::label('fecha', 'Fecha',['class' => 'col-sm-4 control-label']) !!}
          <div class="col-sm-1">
            {!! Form::label('fecha', $puntuacion->fecha, ['class' => 'form-control']) !!}

            @if ($errors->has('fecha'))
                <span class="help-block">
                    <strong>{{ $errors->first('fecha') }}</strong>
                </span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-offset-6">
            <button type="submit" class="btn btn-primary">
                <i class=" glyphicon glyphicon-floppy-saved"></i> Editar
            </button>
          </div>
        </div>

      {!! Form::close() !!}
    </div>
  </div>
</article>
@endsection
