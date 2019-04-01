@extends("layouts.plantilla")

@section("pagina")
	Servicios
@endsection

@section("contenido")
	@foreach ($resultado as $nombre => $categoria)
		<div><h3>{{ $nombre }}</h3>
		@foreach ($categoria as $trabajo)
			<p>{{ $trabajo->nombre }} - {{ $trabajo->precio }} €</p>
		@endforeach
		</div>
	@endforeach
@endsection