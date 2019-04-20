<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield("pagina")</title>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/app.css">

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

<link rel="stylesheet" type="text/css" href="css/publica.css">
<script>
function citasServicio(servicio) {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText.includes('Error')) {
				alert(this.responseText);
			} else {
				document.getElementById("peluquero").innerHTML = this.responseText;
				document.getElementById("peluquero").disabled = false;
				
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
	var parametros = parametros + "&servicio=" + servicio;
	xhr.send(parametros);
}

function citasPeluquero() {
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
	<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#colapsado">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<a href="{{ url('/') }}"><img src="http://www.monarchballroomdance.com/wp-content/uploads/2017/02/logo-placeholder.png" width="125px" height="50px"></a>
            </div>
            <div class="collapse navbar-collapse" id="colapsado">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="contacto" class="navbar-brand">Contacto</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="cita" class="navbar-brand">Pedir Cita</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="servicios" class="navbar-brand">Servicios</a></li>
				</ul>
            </div>
        </div>
	</nav>

	<div class="container principal">
		@yield("contenido")
	</div>
	<div class="pie">
		<div class="hidden-xs col-sm-4 col-sm-offset-0" style="text-align: center;padding: 10px;">
			<img src="http://www.monarchballroomdance.com/wp-content/uploads/2017/02/logo-placeholder.png"
			width="250" height="100">
		</div>
		<div class="col-xs-12 col-sm-3" style="padding: 10px;">
			<div class="col-xs-3 col-sm-6 col-md-3">
				<a href="https://es-es.facebook.com/" class="fa fa-facebook" style="text-decoration: none;"></a>
			</div><div class="col-xs-3 col-sm-6 col-md-3">
				<a href="https://twitter.com/" class="fa fa-twitter" style="text-decoration: none;"></a>
			</div><div class="col-xs-3 col-sm-6 col-md-3">
				<a href="https://www.youtube.com/" class="fa fa-youtube" style="text-decoration: none;"></a>
			</div><div class="col-xs-3 col-sm-6 col-md-3">
				<a href="https://www.instagram.com/?hl=es" class="fa fa-instagram" style="text-decoration: none;"></a>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4 col-xs-offset-0 col-sm-offset-0 col-md-offset-1" style="padding: 10px;">
			<p><span class="glyphicon glyphicon-envelope"></span> sunegocio@ejemplo.com</p>
			<p><span class="glyphicon glyphicon-earphone"></span> +34 928 23 23 23</p>
			<p><span class="glyphicon glyphicon-time"></span> L-S 09:00 a 21:00</p>
			<p><span class="glyphicon glyphicon-map-marker"></span> C/ Prueba, 4. 35110 - Las Palmas</p>
		</div>
	</div>
</body>
</html>