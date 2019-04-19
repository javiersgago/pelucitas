@extends("layouts.plantillaEmpleados")

@section("pagina")
	Panel de administración de Servicios
@endsection

@section("contenido")
	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@else
		@if ($mensaje)
			<div class="alert alert-success">
				{{$mensaje}}
			</div>
		@endif
	@endif
	<form method="POST" action="" id="formulario">
    	@csrf
		Servicio <select id="servicio" name="servicio" onchange="cargarServicio(this.value)">
			<option value='0'>Nuevo servicio</option>
			@foreach ($servicios as $servicio)
          		<option value='{{ $servicio->id }}'>{{ $servicio->nombre }}</option>
      		@endforeach
		</select><br>
		Nombre <input type="text" id="nombre" name="nombre" placeholder="Nombre"><br>
		Categoria <input list="categorias" name="categoria" placeholder="Categoría" />
		<datalist id="categorias">
			@foreach ($categorias as $categoria)
				<option value="{{ $categoria->categoria }}">
			@endforeach
		</datalist><br>
		Precio <input type="number" id="precio" name="precio" placeholder="Precio" step="0.01"><br>
		Duración <input type="time" id="duracion" name="duracion" value="00:00:00" required step="300"><br>
		Inicio reposo <input type="time" id="inicioReposo" name="inicioReposo" step="300"><br>
		Duración reposo <input type="time" id="duracionReposo" name="duracionReposo" step="300"><br>
		<input type="submit" value="{{ $submit }}">
	</form>
@endsection