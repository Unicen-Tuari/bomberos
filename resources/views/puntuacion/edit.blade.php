@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-user" aria-hidden="true"></span>
      <h4>Modificar puntuacion de : {{$puntuacion->bombero->apellido .' '.$puntuacion->bombero->nombre .'- Nº '.$puntuacion->bombero->nro_legajo}}</h4>
    </div>
    <div class="panel-body">
      {!! Form::open([ 'route' => ['puntuacion.update',$puntuacion->id], 'class' => 'form-horizontal', 'method' => 'PUT']) !!}

        <div class="form-group">
          {!! Form::label('asistencia', 'Asistencia obligatoria',['class' => 'col-sm-4 control-label']) !!}
          {!! Form::label('asistencia', 'reuniones: '.$dias,['class' => 'col-sm-2 control-label']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('aocant', 'Cantidad asistidas',['class' => 'col-sm-4 control-label']) !!}
          <div class="col-sm-1">
            {!! Form::text('ao_cant', $asistencia , ['class' => 'form-control','disabled' => 'disabled']) !!}
          </div>

          {!! Form::label('ao_punt', 'Puntos',['class' => 'col-sm-1 control-label']) !!}
          <div class="col-sm-1">
            {!! Form::text('ao_punt', $puntasis , ['class' => 'form-control','disabled' => 'disabled']) !!}
          </div>

          <div class="{{$errors->has('ao_acad') ? ' has-error' : '' }}">
            {!! Form::label('aoacad', 'Academia',['class' => 'col-sm-1 control-label']) !!}
            <div class="col-sm-1">
              {!! Form::text('ao_acad', $puntuacion->ao_acad , ['class' => 'form-control','id'=>'ao_acad']) !!}
              @if ($errors->has('ao_acad'))
                  <span class="help-block">
                      <strong>{{ $errors->first('ao_acad') }}</strong>
                  </span>
              @endif
            </div>
          </div>

        </div>

        <div class="form-group">
          {!! Form::label('accidentales', 'Servicios Accidentales',['class' => 'col-sm-4 control-label']) !!}
          {!! Form::label('accidentales', 'realizados: '.$cantserv,['class' => 'col-sm-2 control-label']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('accid_cant', 'Cantidad asistidas',['class' => 'col-sm-4 control-label']) !!}
          <div class="col-sm-1">
            {!! Form::text('accid_cant', $accid , ['class' => 'form-control','disabled' => 'disabled']) !!}
          </div>

          {!! Form::label('accid_punt', 'Puntos',['class' => 'col-sm-1 control-label']) !!}
          <div class="col-sm-1">
            {!! Form::text('accid_punt', $puntaccid , ['class' => 'form-control','disabled' => 'disabled']) !!}
          </div>

        </div>

        <div class="form-group {{$errors->has('dedicacion') ? ' has-error' : '' }}">
          {!! Form::label('dedicacion', 'Dedicacion',['class' => 'col-sm-4 control-label']) !!}
          <div class="col-sm-1">
              {!! Form::text('dedicacion', $puntuacion->dedicacion , ['class' => 'form-control']) !!}

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
                {!! Form::text('especiales', $puntuacion->especiales , ['class' => 'form-control']) !!}

                @if ($errors->has('especiales'))
                    <span class="help-block">
                        <strong>{{ $errors->first('especiales') }}</strong>
                    </span>
                @endif
            </div>
          </div>

          <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
            {!! Form::label('accidentales', 'Servicios Guardias',['class' => 'col-sm-4 control-label']) !!}
            {!! Form::label('accidentales', 'realizados:'.$cantguar ,['class' => 'col-sm-2 control-label']) !!}
          </div>

          <div class="form-group">
            {!! Form::label('guar_cant', 'Cantidad asistidas',['class' => 'col-sm-4 control-label']) !!}
            <div class="col-sm-1">
              {!! Form::text('guar_cant', $guardia , ['class' => 'form-control','disabled' => 'disabled']) !!}
            </div>

            {!! Form::label('guar_punt', 'Puntos',['class' => 'col-sm-1 control-label']) !!}
            <div class="col-sm-1">
              {!! Form::text('guar_punt', $puntguar , ['class' => 'form-control','disabled' => 'disabled']) !!}
            </div>

          </div>

          <div class="form-group {{ $errors->has('licencia') ? ' has-error' : '' }}">
            {!! Form::label('licencia', 'Licencia',['class' => 'col-sm-4 control-label']) !!}
            <div class="col-sm-1">
                {!! Form::text('licencia', $puntuacion->licencia , ['class' => 'form-control']) !!}

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
                {!! Form::text('castigo', $puntuacion->castigo , ['class' => 'form-control']) !!}

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
                {!! Form::textarea('detalle', $puntuacion->detalle , ['class' => 'form-control' , 'rows' => '6']) !!}

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


        <div class="form-group">
          {!! Form::label('fecha', 'Fecha',['class' => 'col-sm-4 control-label']) !!}
          <div class="col-sm-1">
            {!! Form::text('fecha', \Carbon\Carbon::parse($puntuacion->fecha)->format('d/m/y') , ['class' => 'form-control','disabled' => 'disabled']) !!}
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

@section('js')
  {!! Html::script('assets/js/puntuacion-put.js') !!}
@endsection
