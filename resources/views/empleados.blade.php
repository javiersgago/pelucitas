@extends("layouts.plantillaEmpleados")

@section("pagina")
	Empleados
@endsection

@section("contenido")
	@if (session('status'))
        {{ session('status') }}
    @endif
@endsection