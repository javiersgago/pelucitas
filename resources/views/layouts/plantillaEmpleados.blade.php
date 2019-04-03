<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Zona Empleados</title>
<link rel="stylesheet" type="text/css" href="css/app.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
function agenda() {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText.includes('Error')) {
				alert(this.responseText);
			} else {
				document.getElementById("agenda").innerHTML = this.responseText;
			}
		}
	};
	xhr.open("POST", "agenda", true);
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	var parametros = "_token={{ csrf_token() }}";
	var parametros = parametros + "&dia=" + document.getElementById("dia").value;
	var parametros = parametros + "&peluquero=" + document.getElementById("peluquero").value;
	xhr.send(parametros);
}
function borrarCita(cita) {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText.includes('Error')) {
				alert(this.responseText);
			} else {
				agenda();
			}
		}
	};
	xhr.open("POST", "borrarCita", true);
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	var parametros = "_token={{ csrf_token() }}";
	var parametros = parametros + "&cita=" + cita;
	xhr.send(parametros);
}
</script>
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