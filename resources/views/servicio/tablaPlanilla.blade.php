@if($servicio)
<table class="text-center table table-bordered">
		<tr>
			<td rowspan=2>B.V.</td>
			<td class="text-center" colspan=14 rowspan=2>TRENQUE LAUQUEN</td>
			<td colspan=2>INOBV</td>
			<td colspan=2>RENI</td>
			<td></td>
		</tr>
		<tr>
			<td colspan=1>3</td>
			<td colspan=1>3</td>
			<td class="col-md-2" colspan=3>BA</td>
		</tr>
		<tr>
			<td rowspan=2>PARTE DE SERVICIO</td>
    @for($i = 1; $i<=11; $i++)
      <td> {{sprintf("%'.02d\n", $i)}} </td>
    @endfor
			<td>DIA</td>
			<td>MES</td>
			<td>AÑO</td>
			<td colspan=2 rowspan=2>P.S.N°</td>
			<td class="col-md-1" rowspan=2></td>
			<td class="col-md-1" rowspan=2></td>
			<td class="col-md-1" rowspan=2></td>
		</tr>
		<tr>
			@for ($i = 1; $i <= 11; $i++)
				@if($servicio->tipo_servicio_id==$i)
				 <td colspan=1 class="text-center">X</td>
			 @else
				 <td class="text-center">-</td>
			 @endif
			@endfor
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>TIPO</td>
			<td class="text-left" colspan=14>{{config('selects.tipoServicio')[$servicio->tipo_servicio_id]}}</td>
			<td colspan=2 rowspan=2>PRESENTE 01 AL 05</td>
			<td rowspan=2></td>
			<td rowspan=2></td>
			<td rowspan=2></td>
		</tr>
		<tr>
			<td>UBICACION</td>
			<td class="text-left" colspan=14>{{$servicio->direccion}}</td>
		</tr>
		<tr>
			<td>HORA DE ALARMA</td>
			<td colspan=3>HORA DE SALIDA</td>
			<td colspan=2>MOVIL</td>
			<td colspan=7>A CARGO</td>
			<td colspan=2>HORA DE REGRESO</td>
			<td colspan=2 rowspan=2><p>DURACION EN MINUTOS</p> </td>
			<td rowspan=2></td>
			<td rowspan=2></td>
			<td rowspan=2></td>
		</tr>
		<tr>
			<td>{{$servicio->hora_alarma}}</td>
			<td colspan=3>{{$servicio->hora_salida}}</td>
			<td colspan=2></td>
			<td colspan=7>{{$bombero->nombre}}, {{$bombero->apellido}}</td>
			<td colspan=2>{{$servicio->hora_regreso}}</td>
		</tr>
		<tr>
			<td colspan=4>N° DE MOVILES</td>
			<td colspan=3>ILESOS</td>
			<td colspan=4>MUERTOS</td>
			<td colspan=2>LESIONADOS</td>
			<td colspan=2 rowspan=2>MINUTOS HOMBRE</td>
			<td colspan=1 rowspan=2></td>
			<td colspan=1 rowspan=2></td>
			<td rowspan=2></td>
			<td rowspan=2></td>
			<td rowspan=2></td>
		</tr>
		<tr>
			<td colspan=4 rowspan=3>@foreach ($vehiculos as $vehiculo)
				{{$vehiculo->vehiculo_id}}
			@endforeach</td>
			<td colspan=3>{{$servicio->ilesos}}</td>
			<td colspan=4>{{$servicio->muertos}}</td>
			<td colspan=2>{{$servicio->lesionados}}</td>
		</tr>
		<tr>
			<td colspan=3>SUP (HAS)</td>
			<td colspan=4>QUEMADOS</td>
			<td colspan=2>OTROS</td>
			<td colspan=2>COMBUSTIBLE</td>
			<td colspan=5>COLABORO CUARTEL</td>
		</tr>
		<tr>
			<td colspan=3>{{$servicio->Superficie}}</td>
			<td colspan=4>{{$servicio->quemados}}</td>
			<td colspan=2>{{$servicio->otros}}</td>
			<td colspan=2>{{$servicio->combustible}}</td>
			<td colspan=5></td>
		</tr>
		<tr>
			<td class="text-left" colspan=1>ALARMA</td>
			<td class="text-left" colspan=2>GRAL.</td>
			<td class="text-left" colspan=2>SEL. </td>
			<td class="text-left" colspan=2>INT.</td>
			<td class="text-left" colspan=15>AUTOR LLAMADA</td>
		</tr>
		<tr>
			<td class="col-md-1 text-left" colspan=20>RECONOCIMIENTO: {{$servicio->reconocimiento}}</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td class="col-md-1 text-left" colspan=20>DISPOSICIONES: {{$servicio->reconocimiento}}</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td class="col-md-1" colspan=20>&#160;</td>
		</tr>
		<tr>
			<td colspan=11> OPERADOR DE COMANDO</td>
			<td colspan=9>JEFE DEL SERVICIO</td>
		</tr>
		<tr>
			<td colspan=11><br><br><br></td>
			<td colspan=9><br><br><br></td>
		</tr>
		<tr>
			<td colspan=11>FIRMA Y N° DE LEGAJO</td>
			<td colspan=9>FIRMA Y N° DE LEGAJO</td>
		</tr>
	</table>
@else
 <h4 class="text-center text-danger">No existe el servicio</h4>
@endif
@section('js')
	{!! Html::script('assets/js/imprimirreporte.js') !!}
@endsection
