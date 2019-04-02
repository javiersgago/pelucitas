<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Zona Empleados</title>
<link rel="stylesheet" type="text/css" href="css/app.css">
</head>
<body>
	<div>
		<a href="logout">Cerrar sesión</a>
		<h2>@yield("pagina")</h2>
		@if ($user->esAdmin)
			<ul>
				<li><a href="empleados">Agendas</a></li>
				<li><a href="gestionTrabajadores">Trabajadores</a></li>
				<li><a href="gestionServicios">Servicios</a></li>
				<li><a href="buzon">Buzón de contacto</a></li>
			</ul>
		@endif
	</div>
	<div>@yield("contenido")</div>
</body>
</html>