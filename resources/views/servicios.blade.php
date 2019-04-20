@extends("layouts.plantilla")

@section("pagina")
	Servicios
@endsection

@section("contenido")
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
			<h3 style="text-align: center;">Servicios de su peluquería</h3>
		</div>
	</div>
	<hr>
	<div class="row">
	@foreach ($resultado as $nombre => $categoria)
		<div class="col-xs-12 col-sm-6 col-md-4 categoria" name="categoria"><div class="titulo-categoria">
			<h2 style="text-align: center; color: #CCCCCC">{{ $nombre }}</h2>
		</div>
		<div class="servicios-categoria"><br><ul>
		@foreach ($categoria as $trabajo)
			<li><p>{{ $trabajo->nombre }} - {{ $trabajo->precio }} €</p></li>
		@endforeach
		</ul></div></div>
		@if (($loop->iteration % 2) == 0)
			<div class="clearfix visible-sm-block"></div>
		@endif
		@if (($loop->iteration % 3) == 0)
			<div class="clearfix visible-md-block"></div>
			<div class="clearfix visible-lg-block"></div>
		@endif
	@endforeach
	</div>
<script type="text/javascript">
  var x = document.getElementsByName("categoria");

  for (i = 0; i < x.length; i++) {
    x[i].style.animationDelay = (i*0.3) + "s";
  }
</script>
@endsection