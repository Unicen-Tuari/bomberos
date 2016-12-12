@extends('layouts.app')

@section('content')
<article class="container">
      <div class="" id="logoHome">
        <img src="assets/images/logo.png" alt=""/>
      </div>

      <div class="col-md-offset-1 col-md-10 ">
          <div id="panelLogin" class="panel panel-default">
              <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                      {{ csrf_field() }}

                      <div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }}">

                          <div class="col-md-offset-3 col-md-6">
                              <input id="usuario" type="text" class="form-control" name="usuario" placeholder="Usuario" value="{{ old('usuario') }}">

                              @if ($errors->has('usuario'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('usuario') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                          <div class="col-md-offset-3 col-md-6">
                              <input id="password" type="password" class="form-control" placeholder="Contraseña" name="password">

                              @if ($errors->has('password'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-3">
                              <div class="checkbox">
                                  <label>
                                      <input type="checkbox" name="remember"> Mantener sesión iniciada
                                  </label>
                              </div>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-3">
                              <button type="submit" class="btn btn-primary">
                                  <i class="glyphicon glyphicon-log-in"></i> Iniciar sesión
                              </button>

                              <a class="btn btn-link" href="{{ url('/password/reset') }}">¿Has olvidado la contraseña?</a>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
</article>
@endsection
