@extends("layouts.plantillaEmpleados")

@section("contenido")
<script>
function borrarMensaje(mensaje) {
	if (confirm("¿Seguro que desea borrar este mensaje?")) {
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				if (this.responseText.includes('Error')) {
					alert(this.responseText);
				} else {
					window.location.replace("../buzon");
				}
			}
		};
		xhr.open("POST", "../../borrarMensaje", true);
		xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		var parametros = "_token={{ csrf_token() }}";
		var parametros = parametros + "&mensaje=" + mensaje;
		xhr.send(parametros);
	} else
        return false;
}
</script>
<link rel="stylesheet" type="text/css" href="{{ url('/css/privada.css') }}">
<div class="row">
		<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
			<h3 style="text-align: center;">Mensaje</h3>
		</div>
	</div>
	<hr>
    <div class="container">
        <div class="row">
            <a href="{{ url('/empleados/buzon') }}" class="col-xs-1"><img src="../../images/back.png" width="25px" height="25px"></a>
            <a href="javascript:void(0)" onclick="borrarMensaje({{$mensaje->id}})" class='col-xs-1 col-xs-offset-10'><img src="../../images/trash.png" width="25px" height="25px"></a>
        </div><div class="row cabeceraMensaje">
            <p class="col-xs-12 col-md-4 col-sm-offset-1">Nombre - {{$mensaje->nombre}}</p>
            <p class="col-xs-12 col-md-3">Teléfono - {{$mensaje->telefono}}</p>
            <p class="col-xs-12 col-md-3">E-Mail - {{$mensaje->email}}</p>
        </div><div class="row cuerpoMensaje">
            <p class="col-xs-12 col-md-10 col-sm-offset-1">{{$mensaje->comentario}}</p>
        </div><div class="row pieMensaje">
            <p class="col-xs-12 col-md-5 col-sm-offset-7">Publicado el {{$mensaje->created_at}}</p>
        </div>
    </div>
    @endsection