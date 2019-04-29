@extends("layouts.plantillaEmpleados")

@section("pagina")
	Agenda
@endsection

@section("contenido")
<div class="row">
		<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
			<h3 style="text-align: center;">Agenda</h3>
		</div>
	</div>
	<hr>
<div class="container-fluid">
  <div class="row form-group">
    <div class="col-xs-12 col-sm-4  form-group">
      <input type="date" id="dia" class="form-control" onchange="agenda()" value="{{date('Y-m-d')}}">
    </div>
    <div class="col-xs-12 col-sm-4 form-group">
      @if ($user->esAdmin)
        <select id="peluquero" class="form-control" onchange="agenda()">
      @else
        <select id="peluquero" class="form-control" style="visibility:hidden;">
      @endif
      @foreach ($peluqueros as $peluquero)
        @if ($user->id == $peluquero->id)
          <option selected value='{{ $peluquero->id }}'>{{ $peluquero->name }}</option>
        @else
          <option value='{{ $peluquero->id }}'>{{ $peluquero->name }}</option>
        @endif
      @endforeach
      </select>
    </div>
    <div class="col-xs-12 col-sm-4 form-group">
      <a href="../cita" class="btn btn-info col-xs-12" role="button">Añadir Cita</a>
    </div>
  </div>
  <div class="row" id="agenda">
    <div class="col-xs-3">
      @foreach ($citas as $cita)
        <div class="col-xs-12 horas" style="height:{{$tamDiv}}px;"><p class="hora">{{$cita->hora->format("H:i")}}</p></div>
      @endforeach
    </div>
    <div class="col-xs-9">
      @foreach ($citas as $cita)
        {!! $cita->html !!}
      @endforeach
    </div>
  </div>
</div>
@endsection