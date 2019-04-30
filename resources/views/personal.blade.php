@extends("layouts.plantillaEmpleados")

@section("pagina")
	Panel de administración del Personal
@endsection

@section("contenido")
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
			<h3 style="text-align: center;">Panel de administración del Personal</h3>
		</div>
	</div>
	<hr>
	<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-8 col-md-offset-2">
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
				<label for="empleado" class="col-form-label col-sm-3">Empleado</label>
				<div class="col-sm-9">
					<select id="empleado" name="empleado" class="form-control" onchange="cargarPerfil(this.value)">
						<option value='0'>Nuevo empleado</option>
						@foreach ($empleados as $empleado)
							<option value='{{ $empleado->id }}'>{{ $empleado->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="nombre" class="col-form-label col-sm-3">Nombre</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
				</div>
			</div>
			<div class="form-group row">
				<label for="email" class="col-form-label col-sm-3">Correo electrónico</label>
				<div class="col-sm-9">
					<input type="email" class="form-control" id="email" name="email" placeholder="Email">
				</div>
			</div>
			<div class="form-group row">
				<label for="password" class="col-form-label col-sm-3">Contraseña</label>
				<div class="col-sm-9">
					<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label col-sm-3">Administrador</label>
				<div class="col-sm-9">
					<label class="radio-inline"><input type="radio" id="esAdmin0" name="esAdmin" value="0" checked="true">No</label>
					<label class="radio-inline"><input type="radio" id="esAdmin1" name="esAdmin" value="1">Si</label>
				</div>
			</div>
			<div class="form-group row">
				<label for="duracion" class="col-form-label col-sm-3">Hora de entrada</label>
				<div class="col-sm-9">
					<input type="time" class="form-control" id="entrada" name="entrada" value="09:00:00" required step="300">
				</div>
			</div>
			<div class="form-group row">
				<label for="inicioDescanso" class="col-form-label col-sm-3">Inicio descanso</label>
				<div class="col-sm-9">
					<input type="time" class="form-control" id="inicioDescanso" name="inicioDescanso" value="13:00:00" required step="300">
				</div>
			</div>
			<div class="form-group row">
				<label for="duracionDescanso" class="col-form-label col-sm-3">Duración descanso</label>
				<div class="col-sm-9">
					<input type="time" class="form-control" id="duracionDescanso" name="duracionDescanso" value="00:30:00" required step="300">
				</div>
			</div>
			<div class="form-group row">
				<label for="salida" class="col-form-label col-sm-3">Hora de salida</label>
				<div class="col-sm-9">
					<input type="time" class="form-control" id="salida" name="salida" value="17:00:00" required step="300">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label col-sm-3">Servicios</label>
				<div class="col-sm-9 servicios">
					@foreach ($servicios as $servicio)
						<div class="checkbox">
							<label><input type="checkbox" name="servicios[]" value="{{ $servicio->id }}">{{ $servicio->nombre }}</label>
						</div>
					@endforeach
				</div>
			</div>
			<div class="form-group row">
				<button type="submit" id="enviar" class="btn btn-info col-xs-5 col-xs-offset-1 col-sm-4 col-sm-offset-3">{{ $submit }}</button>
			</div>
		</form>
	</div>
@endsection