@extends("layouts.plantillaEmpleados")

@section("pagina")
	Panel de administración del Personal
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
		Empleado <select id="empleado" name="empleado" onchange="cargarPerfil(this.value)">
			<option value='0'>Nuevo empleado</option>
			@foreach ($empleados as $empleado)
          		<option value='{{ $empleado->id }}'>{{ $empleado->name }}</option>
      		@endforeach
		</select><br>
		Nombre <input type="text" id="name" name="name" placeholder="Nombre"><br>
		Correo electrónico <input type="text" id="email" name="email" placeholder="Correo electrónico"><br>
		Contraseña <input type="password" name="password" placeholder="Contraseña"><br>
		Administrador <input type="radio" id="esAdmin0" name="esAdmin" value="0" checked="true"> No 
		<input type="radio" id="esAdmin1" name="esAdmin" value="1"> Si<br>
		Hora de entrada <input type="time" id="entrada" name="entrada" value="09:00:00" required step="300"><br>
		Inicio descanso <input type="time" id="inicioDescanso" name="inicioDescanso" value="13:00:00" required step="300"><br>
		Duración descanso <input type="time" id="duracionDescanso" name="duracionDescanso" value="00:30:00" required step="300"><br>
		Hora de salida <input type="time" id="salida" name="salida" value="17:00:00" required step="300"><br>
		Servicios<br>
		<div style="border: solid 1px;height: 150px;width: 300px; overflow-y: scroll;">
			@foreach ($servicios as $servicio)
				<input type="checkbox" name="servicios[]" value="{{ $servicio->id }}"> {{ $servicio->nombre }}<br>
			@endforeach
		</div>
		<input type="submit" value="{{ $submit }}">
	</form>
@endsection