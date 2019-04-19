@csrf
		Servicio <select id="servicio" name="servicio" onchange="cargarServicio(this.value)">
			<option value='0'>Nuevo servicio</option>
			@foreach ($servicios as $servicio)
				@if ($servicio->id == $servicioActual)
					<option value='{{ $servicio->id }}' selected>{{ $servicio->nombre }}</option>
				@else
          			<option value='{{ $servicio->id }}'>{{ $servicio->nombre }}</option>
				@endif
      		@endforeach
		</select><br>
		Nombre <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="{{ $nombre }}"><br>
		Categoria <input list="categorias" name="categoria" placeholder="Categoría" value="{{ $categoriaActual }}"/>
		<datalist id="categorias">
			@foreach ($categorias as $categoria)
				<option value="{{ $categoria->categoria }}">
			@endforeach
		</datalist><br>
		Precio <input type="number" id="precio" name="precio" placeholder="Precio" step="0.01" value="{{ $precio }}"><br>
		Duración <input type="time" id="duracion" name="duracion" required step="300" value="{{ $duracion }}"><br>
		Inicio reposo <input type="time" id="inicioReposo" name="inicioReposo" step="300" value="{{ $inicioReposo }}"><br>
		Duración reposo <input type="time" id="duracionReposo" name="duracionReposo" step="300" value="{{ $duracionReposo }}"><br>
		<input type="submit" value="{{ $submit }}">
		@if ($borrar)
	<button type="button" onclick="borrarServicio({{ $servicioActual }})">Borrar</button>
@endif