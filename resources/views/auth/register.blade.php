@extends('layouts.app')

@section('content')
<article class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading"> Registrarse </div>
        <div class="panel-body">
          {!! Form::open([ 'class' => 'form-horizontal', 'url' => 'register', 'method' => 'POST',]) !!}
            {{ csrf_field() }} {{-- Crea todo el campo TOKEN falsificación de petición en sitios cruzados --}}

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

            <div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }}">
              {!! Form::label('usuario', 'Nombre de usuario',['class' => 'col-md-4 control-label']) !!}
              <div class="col-md-6">
                  {!! Form::text('usuario', null, ['class' => 'form-control']) !!}

                  @if ($errors->has('usuario'))
                      <span class="help-block">
                          <strong>{{ $errors->first('usuario') }}</strong>
                      </span>
                  @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                {!! Form::label('password', 'Contraseña',['class' => 'col-md-4 control-label']) !!}

                <div class="col-md-6">
                  {!! Form::password('password', ['class' => 'form-control']) !!}

                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{  str_replace("password","contraseña",$errors->first('password')) }}</strong>
                      </span>
                  @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                {!! Form::label('password-confirm', 'Confirmar Contraseña',['class' => 'col-md-4 control-label']) !!}

                <div class="col-md-6">
                  {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

                  @if ($errors->has('password_confirmation'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password_confirmation') }}</strong>
                      </span>
                  @endif
                </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                {{-- {!!Form::submit('Registrar', ['class' => 'btn btn-primary']) !!} --}}
                <button type="submit" class="btn btn-primary">
                    <i class=" glyphicon glyphicon-user"></i> Registrar
                </button>
              </div>
            </div>

          {!! Form::close() !!}

        </div>
      </div>
    </div>
  </div>
</article>
@endsection
