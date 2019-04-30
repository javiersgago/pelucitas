<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Zona Empleados</title>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../css/app.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="../css/privada.css">
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
	xhr.open("POST", "../agenda", true);
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	var parametros = "_token={{ csrf_token() }}";
	var parametros = parametros + "&dia=" + document.getElementById("dia").value;
	var parametros = parametros + "&peluquero=" + document.getElementById("peluquero").value;
	xhr.send(parametros);
}
function borrarCita(cita) {
	if (confirm("¿Seguro que desea borrar esta cita?")) {
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
		xhr.open("POST", "../borrarCita", true);
		xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		var parametros = "_token={{ csrf_token() }}";
		var parametros = parametros + "&cita=" + cita;
		xhr.send(parametros);
	}
}
function cargarPerfil(user) {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText.includes('Error')) {
				alert(this.responseText);
			} else {
				document.getElementById("formulario").innerHTML = this.responseText;
			}
		}
	};
	xhr.open("POST", "../cargarPerfil", true);
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	var parametros = "_token={{ csrf_token() }}";
	var parametros = parametros + "&user=" + user;
	xhr.send(parametros);
}
function cargarServicio(servicio) {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText.includes('Error')) {
				alert(this.responseText);
			} else {
				document.getElementById("formulario").innerHTML = this.responseText;
			}
		}
	};
	xhr.open("POST", "../cargarServicio", true);
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	var parametros = "_token={{ csrf_token() }}";
	var parametros = parametros + "&servicio=" + servicio;
	xhr.send(parametros);
}
function borrarPerfil(user) {
	if (confirm("¿Seguro que desea borrar este empleado?")) {
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				if (this.responseText.includes('Error')) {
					alert(this.responseText);
				} else {
					window.location.replace("personal");
				}
			}
		};
		xhr.open("POST", "../borrarPerfil", true);
		xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		var parametros = "_token={{ csrf_token() }}";
		var parametros = parametros + "&user=" + user;
		xhr.send(parametros);
	}
}
function borrarServicio(servicio) {
	if (confirm("¿Seguro que desea borrar este servicio?")) {
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				if (this.responseText.includes('Error')) {
					alert(this.responseText);
				} else {
					window.location.replace("servicios");
				}
			}
		};
		xhr.open("POST", "../borrarServicio", true);
		xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		var parametros = "_token={{ csrf_token() }}";
		var parametros = parametros + "&servicio=" + servicio;
		xhr.send(parametros);
	}
}
function borrarMensaje(mensaje) {
	if (confirm("¿Seguro que desea borrar este mensaje?")) {
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				if (this.responseText.includes('Error')) {
					alert(this.responseText);
				} else {
					window.location.replace("buzon");
				}
			}
		};
		xhr.open("POST", "../borrarMensaje", true);
		xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		var parametros = "_token={{ csrf_token() }}";
		var parametros = parametros + "&mensaje=" + mensaje;
		xhr.send(parametros);
	}
}
</script>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#colapsado">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<span class="navbar-brand">Zona de empleados</span>
            </div>
            <div class="collapse navbar-collapse" id="colapsado">
				@if ($user->esAdmin)
				<ul class="nav navbar-nav">
					<li><a href="agenda">Agendas</a></li>
				</ul>
				<ul class="nav navbar-nav">
					<li><a href="personal">Trabajadores</a></li>
				</ul>
				<ul class="nav navbar-nav">
					<li><a href="servicios">Servicios</a></li>
				</ul>
				<ul class="nav navbar-nav">
					<li><a href="buzon">Buzón</a></li>
				</ul>
				@endif
				<ul class="nav navbar-nav navbar-right">
					<li><a href="..">Ver página</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="../logout">Cerrar sesión</a></li>
				</ul>
            </div>
        </div>
	</nav>
		
	<div class="container principal">
		@yield("contenido")
	</div>
</body>
</html>