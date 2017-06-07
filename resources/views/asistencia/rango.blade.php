@foreach ($reuniones as $key => $asistencias)
  <div class="form-group col-sm-6">
    <div class="col-sm-8 text-center">
      <a href="{{ route('asistencia.show', $asistencias->fecha_reunion) }}">{{\Carbon\Carbon::parse($asistencias->fecha_reunion)->format('d/m/Y')}}</a>
    </div>
    <div class="col-sm-4 text-center">
      @if (Auth::user()->admin)
        <a class="glyphicon glyphicon-edit" href="{{ route('asistencia.edit', $asistencias->fecha_reunion) }}"></a>
      @else
        <button type="submit" class="btn glyphicon glyphicon-ban-circle ban" title="Sin permisos para eliminar/modificar"></button>
      @endif
    </div>
  </div>
@endforeach
