@extends('layouts.app')

@section('content')

<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-users" aria-hidden="true"></span>
      <h4>Asistencia del {{\Carbon\Carbon::parse($reunion)->format('d-m-Y')}}</h4>
    </div>
    <div class="panel-body">

      <div class="form-group col-sm-12">
        {{ Form::label('Buscar', 'Buscar: ',['class' => 'control-label col-sm-2 col-sm-offset-2']) }}
        <div class="col-sm-4">
          {{Form::text('busqueda', null, ['placeholder'=>"Buscar por nombre",'id'=>"inputFilterPuntuacion",'class' => 'form-control'])}}
        </div>
      </div>

      <div class="form-group bomberosparticipantes">
        @foreach($bomberos as $bombero)
          <div class="col-lg-6 col-md-12 control-label {{ $errors->has('bombero-'.$bombero->id) ? ' has-error' : '' }}" id="bombero-{{$bombero->id}}">
            {!! Form::label('bombero-'.$bombero->id, $bombero->nombre." ". $bombero->apellido,['class' => 'col-lg-7 col-md-5 control-label']) !!}
            <div class="col-sm-4">
              @if ($bombero->presente($reunion))
                <i class="glyphicon glyphicon-ok-circle presentesOn"></i>
              @else
                <i class="glyphicon glyphicon-remove-circle presentesOff"></i>
              @endif
              @if ($errors->has('bombero-'.$bombero->id))
                  <span class="help-block">
                      <strong>{{ $errors->first('bombero-'.$bombero->id) }}</strong>
                  </span>
              @endif
            </div>
          </div>
        @endforeach
      </div>

    </div>
  </div>
</article>
@endsection
