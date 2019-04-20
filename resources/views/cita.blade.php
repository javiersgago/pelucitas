@extends("layouts.plantilla")

@section("pagina")
	Pedir Cita
@endsection

@section("contenido")
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
			<h3 style="text-align: center;">Formulario de citas</h3>
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
	<form method="POST" action="">
		@csrf
		
		<div class="form-group row">
			<label for="cliente" class="col-form-label col-sm-2">Nombre</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="cliente" name="cliente" placeholder="Introduzca su nombre">
			</div>
		</div>
		<div class="form-group row">
			<label for="telefono" class="col-form-label col-sm-2">Teléfono</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="telefono" id="telefono" placeholder="Introduzca su teléfono de contacto">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="servicio" class="col-form-label col-sm-2">Servicio</label>
			<div class="col-sm-10">
			<select name="servicio" id="servicio" class="form-control" onchange="citasServicio(this.value)">
				<option selected disabled hidden>Elija un servicio</option>
				@foreach ($servicios as $servicio)
					<option value='{{ $servicio->id }}'>{{ $servicio->nombre }}</option>
				@endforeach
			</select>
		</div>
		</div>

		<div class="form-group row">
			<label for="peluquero" class="col-form-label col-sm-2">Peluquero</label>
			<div class="col-sm-10">
			<select name="peluquero" id="peluquero" class="form-control" disabled onchange="citasPeluquero()">
				<option selected disabled hidden>Elija peluquero</option>
			</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="dia" class="col-form-label col-sm-2">Día</label>
			<div class="col-sm-10">
			<input type="date" name="dia" id="dia" min="{{ $manana }}" class="form-control" disabled required onchange="citasDia(this.value)">
		</div>
		</div>
		
		<div class="form-group row">
			<label for="hora" class="col-form-label col-sm-2">Hora</label>
			<div class="col-sm-10">
			<select name="hora" id="hora" class="form-control" disabled onchange="citasHora()">
				<option selected disabled hidden>Hora</option>
			</select>
			</div>
		</div>
    	<div class="form-group row">
			<button type="submit" id="enviar" class="btn col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-3" style="background-color: #222222; color: #CCCCCC;" disabled>Enviar</button>
		</div>
	</form>
	</div>
@endsection