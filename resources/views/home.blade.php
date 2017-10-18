@extends('layouts.app')

@section('content')
  <article class="col-sm-12">
    <div class="panel panel-default">
      <div id="breadcrumb" class="panel-heading">
        <span class="fa fa-home" aria-hidden="true"></span>
        <h4>Ingreso/Egreso de bomberos</h4>
      </div>
      <div class="panel-body">
        <div class="col-sm-12">
          {{Form::open(['route' => 'ingreso.guardarIngreso', 'method' => 'POST'])}}
            <div class="col-sm-1">
              <button class="fa fa-sign-in" type="submit" title="Registrar ingreso"></button>
            </div>
            <div class="col-sm-3 {{$errors->has('id_bombero') ? ' has-error' : ''}}">
              {{Form::select('id_bombero', App\Bombero::getBomberosnoIngresados(), null,['class' => 'col-sm-2 selectMultiple'])}}
              @if ($errors->has('id_bombero'))
                <span class="help-block">
                    <strong>No se elijio bombero</strong>
                </span>
              @endif
            </div>
          {{Form::close()}}
        </div>
        @php
          $ingresados= App\Ingreso::getIngresados();
        @endphp
        @if(count($ingresados)<=6)
          <div class="col-sm-12 alto">
        @else
          <div class="col-sm-12">
        @endif
            @include('asistencia.ingresados')
          </div>
      </div>
    </div>
  </article>
@endsection
