@extends("layouts.plantilla")

@section("pagina")
	Inicio
@endsection

@section("contenido")
<div class="col-md-9 col-md-offset-1 col-lg-8 col-lg-offset-2">
	<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top: 10px">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
	  <a href="cita"><img src="https://usercontent1.hubstatic.com/13003500_f1024.jpg"></a>
	  <div class="carousel-caption">
        <h3 style="color:#888;">Pida su cita online</h3>
      </div>
    </div>

    <div class="item">
	<a href="servicios"><img src="https://www.inexa.com.ar/website/cms-images/8/maxsize/x_peluq.jpg"></a>
	  <div class="carousel-caption">
        <h3 style="color:#EEE;">Servicios ofrecidos</h3>
      </div>
    </div>

    <div class="item">
	<a href="contacto"><img src="https://xstek.net/images/new_design/images/contact-us.jpg"></a>
	  <div class="carousel-caption">
        <h3 style="color:#EEE;">Contacte con nosotros</h3>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
@endsection