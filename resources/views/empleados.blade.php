@extends("layouts.plantillaEmpleados")

@section("pagina")
	Empleados
@endsection

@section("contenido")
<input type="date" id="dia" onchange="agenda()" value="{{date('Y-m-d')}}"><br>
@if ($user->esAdmin)
  <select id="peluquero" onchange="agenda()">
@else
  <select id="peluquero" style="visibility:hidden;">
@endif
@foreach ($peluqueros as $peluquero)
  @if ($user->id == $peluquero->id)
    <option selected value='{{ $peluquero->id }}'>{{ $peluquero->name }}</option>
  @else
    <option value='{{ $peluquero->id }}'>{{ $peluquero->name }}</option>
  @endif
@endforeach
</select>
<div class="container">
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