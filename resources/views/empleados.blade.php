@extends("layouts.plantillaEmpleados")

@section("pagina")
	Empleados
@endsection

@section("contenido")
<div class="container">
  <div class="row">
    <div class="col-sm-3">
        @foreach ($citas as $cita)
            
        @endforeach
    </div>
    <div class="col-sm-9">
        @foreach ($citas as $cita)

        @endforeach
    </div>
  </div>
</div>
@endsection