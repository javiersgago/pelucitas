@extends("layouts.plantillaEmpleados")

@section("pagina")
	Buzón de contacto
@endsection

@section("contenido")
<script>
	$(document).ready( function () {
		$('#tabla').DataTable({
		language: {
			"decimal": "",
			"emptyTable": "No hay información",
			"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
			"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
			"infoFiltered": "(Filtrado de _MAX_ total entradas)",
			"infoPostFix": "",
			"thousands": ",",
			"lengthMenu": "Mostrar _MENU_ Entradas",
			"loadingRecords": "Cargando...",
			"processing": "Procesando...",
			"search": "Buscar:",
			"zeroRecords": "Sin resultados encontrados",
			"paginate": {
				"first": "Primero",
				"last": "Ultimo",
				"next": "Siguiente",
				"previous": "Anterior"
			}
		},
		order: [[ 4, "desc" ]],
		"columnDefs": [
    		{ "orderable": false, "targets": [0, 5] }
  		]
	})
});
</script>
<div class="row">
		<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
			<h3 style="text-align: center;">Buzón de contacto</h3>
		</div>
	</div>
	<hr>
<div class="container">
<table id="tabla" class="display">
    <thead>
        <tr>
			<th></th>
            <th class="col-xs-4">Nombre</th>
            <th class="col-xs-1">Teléfono</th>
			<th class="col-xs-4">Email</th>
            <th class="col-xs-2">Fecha</th>
			<th></th>
        </tr>
    </thead>
    <tbody>
		@foreach ($mensajes as $mensaje)
			<tr>
				<td onclick="window.location = 'buzon/{{$mensaje->id}}'">
					@if (!$mensaje->leido)
						<img src="../images/newmsg.png" width="20px" height="20px">
					@endif
				</td>
				<td onclick="window.location = 'buzon/{{$mensaje->id}}'">{{$mensaje->nombre}}</td>
				<td onclick="window.location = 'buzon/{{$mensaje->id}}'">{{$mensaje->telefono}}</td>
				<td onclick="window.location = 'buzon/{{$mensaje->id}}'">{{$mensaje->email}}</td>
				<td onclick="window.location = 'buzon/{{$mensaje->id}}'">{{$mensaje->created_at}}</td>
				<td><button onclick="borrarMensaje({{$mensaje->id}})" class='btn btn-danger btn-xs'>Borrar</button></td>
			</tr>
		@endforeach
    </tbody>
</table>
</div>
@endsection