@extends("layouts.plantilla")

@section("pagina")
	Contacto
@endsection

@section("contenido")
	<p class='{{ $tipo }}'>{{ $mensaje }}</p>
	<form method="POST" action="">
    	@csrf
    	<input type="text" name="nombre" placeholder="Nombre"><br>
    	<input type="text" name="telefono" placeholder="Teléfono"><br>
    	<input type="email" name="email" placeholder="Email"><br>
    	<textarea name="comentario" rows="10" cols="40" id="comentario" placeholder="Comentario"></textarea><br>
    	<button type="submit">Enviar</button>
    </form>
@endsection