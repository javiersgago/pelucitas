@extends("layouts.plantilla")

@section("pagina")
	Contacto
@endsection

@section("contenido")
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
			<h3 style="text-align: center;">Formulario de contacto</h3>
		</div>
	</div>
	<hr>
	<div class="col-xs-12">
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
	<form method="POST" action="">
    	@csrf
		<div class="col-xs-12 col-sm-6">
			<div class="form-group">
				<input type="text" class="form-control" name="nombre" placeholder="Nombre"><br>
				<input type="text" class="form-control" name="telefono" placeholder="Teléfono"><br>
				<input type="email" class="form-control" name="email" placeholder="Email"><br>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="form-group">
				<textarea name="comentario" class="form-control" rows="6" id="comentario" placeholder="Comentario"></textarea>
			</div>
		</div>
		<div class="form-group row">
			<button type="submit" id="enviar" class="btn col-xs-10 col-xs-offset-1" style="background-color: #222222; color: #CCCCCC;">Enviar</button>
		</div>
		</form>
		<hr>
		<div><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14108.069436685015!2d-15.4244345!3d27.8707371!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xec2aca8742bb064f!2sCIFP+Villa+de+Ag%C3%BCimes!5e0!3m2!1ses!2ses!4v1555784635898!5m2!1ses!2ses" 
			class="col-xs-12" height="450px" frameborder="0"></iframe></div></div>
@endsection