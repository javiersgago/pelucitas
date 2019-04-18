@extends("layouts.plantillaEmpleados")

@section("pagina")
	Agenda
@endsection

@section("contenido")
<div class="container-fluid">
  <div class="row form-group">
    <div class="col-xs-12 col-sm-4">
      <input type="date" id="dia" class="form-control" onchange="agenda()" value="{{date('Y-m-d')}}">
    </div>
    <div class="col-xs-12 col-sm-4">
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
    <div class="col-xs-12 col-sm-4">
      <a href="../cita" class="btn btn-info col-xs-12" role="button">Añadir Cita</a>
    </div>
  </div>
  <div class="row" id="agenda">
    <div class="col-xs-3">
      @foreach ($citas as $cita)
        <div class="col-xs-12" style="height:{{$tamDiv}}px;border: solid 1px;">{{$cita->hora->format("H:i")}}</div>
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