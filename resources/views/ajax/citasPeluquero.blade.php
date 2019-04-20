<option selected disabled hidden>Elija peluquero</option>
@foreach ($peluqueros as $peluquero)
	<option value="{{ $peluquero->id }}">{{ $peluquero->name }}</option>
@endforeach