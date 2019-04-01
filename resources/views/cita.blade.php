@extends("layouts.plantilla")

@section("pagina")
	Pedir Cita
@endsection

@section("contenido")
	<p class='{{ $tipo }}'>{{ $mensaje }}</p>
	<form method="POST" action="">
    	@csrf
    	<input type="text" name="cliente" placeholder="Su nombre"><br>
    	<input type="text" name="telefono" placeholder="Su teléfono de contacto"><br>
    	
    	<select name="peluquero" id="peluquero" onchange="citasPeluquero(this.value)">
    		<option selected disabled hidden>Peluquero</option>
    		@foreach ($peluqueros as $peluquero)
    			<option value='{{ $peluquero->id }}'>{{ $peluquero->name }}</option>
    		@endforeach
    	</select><br>
    	
    	<select name="servicio" id="servicio" disabled onchange="citasServicio()">
    		<option selected disabled hidden>Servicio</option>
    	</select><br>
    	
    	<input type="date" name="dia" id="dia" min="{{ date('Y-m-d') }}" disabled onchange="citasDia(this.value)"><br>
    	
    	<select name="hora" id="hora" disabled onchange="citasHora()">
    		<option selected disabled hidden>Hora</option>
    	</select><br>
    	
    	<button type="submit" id="enviar" disabled>Enviar</button>
    </form>
@endsection