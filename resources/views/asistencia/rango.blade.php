@foreach ($reuniones as $key => $asistencias)
  <div class="form-group col-sm-6">
    <div class="col-sm-8 text-center">
      <a href="{{ route('asistencia.show', $asistencias->fecha_reunion) }}">{{\Carbon\Carbon::parse($asistencias->fecha_reunion)->format('d/m/Y')}}</a>
    </div>
    <div class="col-sm-4 text-center">
      @if (Auth::user()->admin)
        <div class="col-sm-3 col-sm-offset-2">
          <a class="glyphicon glyphicon-edit" href="{{ route('asistencia.edit', $asistencias->fecha_reunion) }}"></a>
        </div>
        <div class="col-sm-3">
          {{ Form::open(['route' => ['asistencia.destroy', $asistencias->fecha_reunion], 'method' => 'DELETE']) }}
              <button type="submit" class="glyphicon glyphicon-trash"></button>
          {{ Form::close() }}
        </div>
      @else
        <a class="btn glyphicon glyphicon-ban-circle ban" title="Sin permisos para eliminar/modificar"></a>
      @endif
    </div>
  </div>
@endforeach
