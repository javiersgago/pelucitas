@extends("layouts.plantillaEmpleados")

@section("pagina")
	Panel de administración de Servicios
@endsection

@section("contenido")
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
			<h3 style="text-align: center;">Panel de administración de Servicios</h3>
		</div>
	</div>
	<hr>
	<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
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
		<div class="form-group row">
			<label for="servicio" class="col-form-label col-sm-2">Servicio</label>
			<div class="col-sm-10">
				<select name="servicio" id="servicio" class="form-control" onchange="cargarServicio(this.value)">
				<option value='0'>Nuevo servicio</option>
					@foreach ($servicios as $servicio)
						<option value='{{ $servicio->id }}'>{{ $servicio->nombre }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="nombre" class="col-form-label col-sm-2">Nombre</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
			</div>
		</div>
		<div class="form-group row">
			<label for="categoria" class="col-form-label col-sm-2">Categoría</label>
			<div class="col-sm-10">
				<input list="categorias" class="form-control" name="categoria" placeholder="Categoría" />
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
				<input type="number" class="form-control" id="precio" name="precio" placeholder="Precio" step="0.01">
			</div>
		</div>
		<div class="form-group row">
			<label for="duracion" class="col-form-label col-sm-2">Duración</label>
			<div class="col-sm-10">
				<input type="time" class="form-control" id="duracion" name="duracion" value="00:00:00" required step="300">
			</div>
		</div>
		<div class="form-group row">
			<label for="inicioReposo" class="col-form-label col-sm-2">Inicio Reposo</label>
			<div class="col-sm-10">
				<input class="form-control" type="time" id="inicioReposo" name="inicioReposo" step="300">
			</div>
		</div>
		<div class="form-group row">
			<label for="duracionReposo" class="col-form-label col-sm-2">Duración Reposo</label>
			<div class="col-sm-10">
				<input class="form-control" type="time" id="duracionReposo" name="duracionReposo" step="300">
			</div>
		</div>
		<div class="form-group row">
			<button type="submit" id="enviar" class="btn btn-info col-xs-5 col-xs-offset-1 col-sm-4 col-sm-offset-3">{{ $submit }}</button>
		</div>
	</form>
@endsection