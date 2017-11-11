<table class="text-center table table-bordered">
	<tr>
		<td>Leg.</td>
		<td>Jerarquia</td>
		<td>Apellido y Nombre</td>
		<td>Cifra</td>
		<td>Firma</td>
	</tr>
	@foreach($bomberos as $clave => $bombero)
	<tr>
		<td>{{$bombero->nro_legajo}}</td>
		<td>{{config('selects.jerarquia')[$bombero->jerarquia]}}</td>
		<td>{{$bombero->apellido}}, {{$bombero->nombre}}</td>
		<td>&#160;&#160;&#160;</td>
		<td>&#160;&#160;&#160;</td>
	</tr>
@endforeach
</table>
