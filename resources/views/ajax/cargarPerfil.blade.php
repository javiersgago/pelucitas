@csrf
<div class="form-group row">
	<label for="empleado" class="col-form-label col-sm-3">Empleado</label>
	<div class="col-sm-9">
		<select id="empleado" name="empleado" class="form-control" onchange="cargarPerfil(this.value)">
			<option value='0'>Nuevo empleado</option>
			@foreach ($empleados as $empleado)
				@if ($empleado->id == $user)
					<option value='{{ $empleado->id }}' selected>{{ $empleado->name }}</option>
				@else
					<option value='{{ $empleado->id }}'>{{ $empleado->name }}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="form-group row">
	<label for="nombre" class="col-form-label col-sm-3">Nombre</label>
	<div class="col-sm-9">
		<input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{ $name }}">
	</div>
</div>
<div class="form-group row">
	<label for="email" class="col-form-label col-sm-3">Correo electrónico</label>
	<div class="col-sm-9">
		<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $email }}">
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
	@if ($esAdmin)
		@if ($currentUser == $user)
			<label class="radio-inline"><input type="radio" id="esAdmin0" name="esAdmin" value="0" disabled>No</label>
			<label class="radio-inline"><input type="radio" id="esAdmin1" name="esAdmin" value="1" checked="true">Si</label>
		@else
			<label class="radio-inline"><input type="radio" id="esAdmin0" name="esAdmin" value="0">No</label>
			<label class="radio-inline"><input type="radio" id="esAdmin1" name="esAdmin" value="1" checked="true">Si</label>
		@endif
	@else
		<label class="radio-inline"><input type="radio" id="esAdmin0" name="esAdmin" value="0" checked="true">No</label>
		<label class="radio-inline"><input type="radio" id="esAdmin1" name="esAdmin" value="1">Si</label>
	@endif
	</div>
</div>
<div class="form-group row">
	<label for="duracion" class="col-form-label col-sm-3">Hora de entrada</label>
	<div class="col-sm-9">
		<input type="time" class="form-control" id="entrada" name="entrada" required step="300" value="{{ $entrada }}">
	</div>
</div>
<div class="form-group row">
	<label for="inicioDescanso" class="col-form-label col-sm-3">Inicio descanso</label>
	<div class="col-sm-9">
		<input type="time" class="form-control" id="inicioDescanso" name="inicioDescanso" required step="300"  value="{{ $inicioDescanso }}">
	</div>
</div>
<div class="form-group row">
	<label for="duracionDescanso" class="col-form-label col-sm-3">Duración descanso</label>
	<div class="col-sm-9">
		<input type="time" class="form-control" id="duracionDescanso" name="duracionDescanso" required step="300" value="{{ $duracionDescanso }}">
	</div>
</div>
<div class="form-group row">
	<label for="salida" class="col-form-label col-sm-3">Hora de salida</label>
	<div class="col-sm-9">
		<input type="time" class="form-control" id="salida" name="salida" required step="300" value="{{ $salida }}">
	</div>
</div>
<div class="form-group row">
	<label class="col-form-label col-sm-3">Servicios</label>
	<div class="col-sm-9 servicios">
		@foreach ($servicios as $id => $servicio)
			@if ($servicio->checked)
				<div class="checkbox">
					<label><input type="checkbox" name="servicios[]" value="{{ $id }}" checked="true">{{ $servicio->nombre }}</label>
				</div>
			@else
				<div class="checkbox">
					<label><input type="checkbox" name="servicios[]" value="{{ $id }}">{{ $servicio->nombre }}</label>
				</div>
			@endif
		@endforeach
	</div>
</div>
<div class="form-group row">
	<button type="submit" id="enviar" class="btn btn-info col-xs-5 col-xs-offset-1 col-sm-4 col-sm-offset-3">{{ $submit }}</button>
	@if ($borrar)
		<button class="btn btn-danger col-xs-5 col-sm-4" type="button" onclick="borrarPerfil({{ $user }})">Borrar</button>
	@endif
</div>