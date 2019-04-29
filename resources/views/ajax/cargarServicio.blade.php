@csrf

<div class="form-group row">
			<label for="servicio" class="col-form-label col-sm-2">Servicio</label>
			<div class="col-sm-10">
				<select name="servicio" id="servicio" class="form-control" onchange="cargarServicio(this.value)">
				<option value='0'>Nuevo servicio</option>
			@foreach ($servicios as $servicio)
				@if ($servicio->id == $servicioActual)
					<option value='{{ $servicio->id }}' selected>{{ $servicio->nombre }}</option>
				@else
          			<option value='{{ $servicio->id }}'>{{ $servicio->nombre }}</option>
				@endif
      		@endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="nombre" class="col-form-label col-sm-2">Nombre</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{ $nombre }}">
			</div>
		</div>
		<div class="form-group row">
			<label for="categoria" class="col-form-label col-sm-2">Categoría</label>
			<div class="col-sm-10">
				<input list="categorias" class="form-control" name="categoria" placeholder="Categoría" value="{{ $categoriaActual }}" />
				<datalist id="categorias">
					@foreach ($categorias as $categoria)
						<option value="{{ $categoria->categoria }}">
					@endforeach
				</datalist>
			</div>
		</div>
		<div class="form-group row">
			<label for="precio" class="col-form-label col-sm-2">Precio</label>
			<div class="col-sm-10">
				<input type="number" class="form-control" id="precio" name="precio" placeholder="Precio" step="0.01" value="{{ $precio }}">
			</div>
		</div>
		<div class="form-group row">
			<label for="duracion" class="col-form-label col-sm-2">Duración</label>
			<div class="col-sm-10">
				<input type="time" class="form-control" id="duracion" name="duracion" required step="300" value="{{ $duracion }}">
			</div>
		</div>
		<div class="form-group row">
			<label for="inicioReposo" class="col-form-label col-sm-2">Inicio Reposo</label>
			<div class="col-sm-10">
				<input class="form-control" type="time" id="inicioReposo" name="inicioReposo" step="300" value="{{ $inicioReposo }}">
			</div>
		</div>
		<div class="form-group row">
			<label for="duracionReposo" class="col-form-label col-sm-2">Duración Reposo</label>
			<div class="col-sm-10">
				<input class="form-control" type="time" id="duracionReposo" name="duracionReposo" step="300" value="{{ $duracionReposo }}">
			</div>
		</div>
		<div class="form-group row">
			<button type="submit" id="enviar" class="btn btn-info col-xs-5 col-xs-offset-1 col-sm-4 col-sm-offset-3">{{ $submit }}</button>
			@if ($borrar)
			<button type="button" class="btn btn-danger col-xs-5 col-sm-4" onclick="borrarServicio({{ $servicioActual }})">Borrar</button>
			@endif
		</div>
