@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-user" aria-hidden="true"></span>
      <h4>Alta Usuario</h4>
    </div>
    <div class="panel-body">
      {!! Form::open([ 'route' => 'usuario.store', 'class' => 'form-horizontal', 'method' => 'POST']) !!}

        <div hidden>
          {!! Form::checkbox('activo', 1) !!}
        </div>

        <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
          {!! Form::label('nombre', 'Nombre',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-6">
              {!! Form::text('nombre', null, ['class' => 'form-control']) !!}

              @if ($errors->has('nombre'))
                  <span class="help-block">
                      <strong>{{ $errors->first('nombre') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('apellido') ? ' has-error' : '' }}">
          {!! Form::label('apellido', 'Apellido',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-6">
              {!! Form::text('apellido', null, ['class' => 'form-control']) !!}

              @if ($errors->has('apellido'))
                  <span class="help-block">
                      <strong>{{ $errors->first('apellido') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('nro_legajo') ? ' has-error' : '' }}">
          {!! Form::label('usuario', 'usuario',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-6">
          {!! Form::text('usuario', null, ['class' => 'form-control']) !!}

              @if ($errors->has('usuario'))
                  <span class="help-block">
                      <strong>{{ $errors->first('usuario') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('jerarquia') ? ' has-error' : '' }}">
          {!! Form::label('password', 'Password',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-6">
          {{Form::select('password', config('selects.password'),6, ['class' => 'form-control'])}}

              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
          </div>
        </div>
        
      {!! Form::close() !!}
    </div>
  </div>
</article>
@endsection
