<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Matiz Peluqueros</title>
<link rel="stylesheet" type="text/css" href="css/app.css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
function citasPeluquero(peluquero) {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText.includes('Error')) {
				alert(this.responseText);
			} else {
				document.getElementById("servicio").innerHTML = this.responseText;
				document.getElementById("servicio").disabled = false;
				
				document.getElementById("dia").disabled = true;
				document.getElementById("dia").valueAsDate = null;
				
				document.getElementById("hora").disabled = true;
				document.getElementById("hora").innerHTML = "<option selected disabled hidden>Hora</option>";

				document.getElementById("enviar").disabled = true;
			}
		}
	};
	xhr.open("POST", "citasPeluquero", true);
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	var parametros = "_token={{ csrf_token() }}";
	var parametros = parametros + "&peluquero=" + peluquero;
	xhr.send(parametros);
}

function citasServicio() {
	document.getElementById("dia").disabled = false;
	document.getElementById("dia").valueAsDate = null;
				
	document.getElementById("hora").disabled = true;
	document.getElementById("hora").innerHTML = "<option selected disabled hidden>Hora</option>";

	document.getElementById("enviar").disabled = true;
}

function citasDia(dia) {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText.includes('Error')) {
				alert(this.responseText);
			} else {
				document.getElementById("hora").disabled = false;
				document.getElementById("hora").innerHTML = this.responseText;

				document.getElementById("enviar").disabled = true;
			}
		}
	};
	xhr.open("POST", "citasDia", true);
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	var parametros = "_token={{ csrf_token() }}";
	var parametros = parametros + "&dia=" + dia;
	var parametros = parametros + "&servicio=" + document.getElementById("servicio").value;
	var parametros = parametros + "&peluquero=" + document.getElementById("peluquero").value;
	xhr.send(parametros);
}

function citasHora() {
	document.getElementById("enviar").disabled = false;
}
</script>
</head>
<body>
	<div>
		<h2>@yield("pagina")</h2>
		<ul>
			<li><a href="{{ url('/') }}">Inicio</a></li>
			<li><a href="servicios">Servicios</a></li>
			<li><a href="cita">Pedir Cita</a></li>
			<li><a href="contacto">Contacto</a></li>
		</ul>
	</div>
	<div>@yield("contenido")</div>
</body>
</html>