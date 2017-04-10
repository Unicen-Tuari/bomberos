@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-user" aria-hidden="true"></span>
      <h4>Cargar puntuacion</h4>
    </div>
    <div class="panel-body">
      {!! Form::open([ 'route' => 'puntuacion.store', 'class' => 'form-horizontal', 'method' => 'POST']) !!}

        <div class="form-group {{ $errors->has('id_bombero') ? ' has-error' : '' }}">
          {!! Form::label('id_bombero', 'Bombero',['class' => 'col-sm-4 control-label']) !!}
          <div class="col-sm-2">
            {{Form::select('id_bombero', $bomberos,null,['class' => 'selectMultiple'])}}
            @if ($errors->has('id_bombero'))
                <span class="help-block">
                    <strong>{{ $errors->first('id_bombero') }}</strong>
                </span>
            @endif
          </div>
        </div>

        <div id="resultado">

        </div>

        <div class="form-group {{ $errors->has('fecha') ? ' has-error' : '' }}">
          {!! Form::label('fecha', 'Fecha',['class' => 'col-sm-4 control-label']) !!}
          <div class="col-sm-1">
              {!! Form::text('fecha', \Carbon\Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->format('m/Y'), ['class' => 'form-control']) !!}

              @if ($errors->has('fecha'))
                  <span class="help-block">
                      <strong>{{ $errors->first('fecha') }}</strong>
                  </span>
              @endif
          </div>
        </div>
        <button type="submit" class="col-sm-offset-6 btn btn-lg glyphicon glyphicon-floppy-saved simulara"></button>

      {!! Form::close() !!}
    </div>
  </div>
</article>
@endsection

@section('js')
  {!! Html::script('assets/js/ajaxpuntuacion.js') !!}
@endsection
