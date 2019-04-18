@csrf
Empleado <select id="empleado" name="empleado" onchange="cargarPerfil(this.value)">
	<option value='0'>Nuevo empleado</option>
	@foreach ($empleados as $empleado)
		@if ($empleado->id == $user)
			<option value='{{ $empleado->id }}' selected>{{ $empleado->name }}</option>
		@else
			<option value='{{ $empleado->id }}'>{{ $empleado->name }}</option>
		@endif
	@endforeach
</select><br>
Nombre <input type="text" id="name" name="name" placeholder="Nombre" value="{{ $name }}"><br>
Correo electrónico <input type="text" id="email" name="email" placeholder="Correo electrónico" value="{{ $email }}"><br>
Contraseña <input type="password" id="password" name="password" placeholder="Contraseña"><br>
@if ($esAdmin)
	Administrador <input type="radio" id="esAdmin0" name="esAdmin" value="0"> No 
	<input type="radio" id="esAdmin1" name="esAdmin" value="1" checked="true"> Si<br>
@else
	Administrador <input type="radio" id="esAdmin0" name="esAdmin" value="0" checked="true"> No 
	<input type="radio" id="esAdmin1" name="esAdmin" value="1"> Si<br>
@endif
Hora de entrada <input type="time" id="entrada" name="entrada" value="{{ $entrada }}" required><br>
Inicio descanso <input type="time" id="inicioDescanso" name="inicioDescanso" value="{{ $inicioDescanso }}" required><br>
Duración descanso <input type="time" id="duracionDescanso" name="duracionDescanso" value="{{ $duracionDescanso }}" required><br>
Hora de salida <input type="time" id="salida" name="salida" value="{{ $salida }}" required><br>
<input type="submit" value="Enviar">