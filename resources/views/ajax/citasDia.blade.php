<option selected disabled hidden>Hora</option>
@foreach ($opciones as $opcion)
	<option {{ $opcion->habilitado }}>{{ $opcion->hora }}</option>
@endforeach