<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Trabajo;

class GestionServiciosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user();
        if (!$user->esAdmin)
            return redirect("/empleados");
        $servicios = Trabajo::orderBy('nombre', 'asc')->get();
        $categorias = Trabajo::orderBy('nombre', 'asc')->get()->unique('categoria');
        return view("gestionServicios", [
            "mensaje" => "",
            'user' => $user,
            "servicios" => $servicios,
            "categorias" => $categorias,
            "submit" => "Añadir"
        ]);
    }

    public function store(Request $request) {
        if ($request->inicioReposo || $request->duracionReposo)
            $validatedData = $request->validate([
                'nombre' => 'required',
                'categoria' => 'required',
                'precio' => 'required',
                'duracion' => 'required',
                'inicioReposo' => 'required',
                'duracionReposo' => 'required'
            ]);
        else
            $validatedData = $request->validate([
                'nombre' => 'required',
                'categoria' => 'required',
                'precio' => 'required',
                'duracion' => 'required'
            ]);
        if ($request->servicio) {
            $servicio = Trabajo::find($request->servicio);
            $mensaje = "Se han actualizado los datos del " . $servicio->nombre;
        }
        else {
            $servicio = new Trabajo;
            $mensaje = "Se ha registrado el " . $request->nombre . " como nuevo servicio";
        }

        $servicio->nombre = $request->nombre;
        $servicio->categoria = $request->categoria;
        $servicio->precio = $request->precio;
        $servicio->duracion = $request->duracion;
        $servicio->inicioReposo = $request->inicioReposo;
        $servicio->duracionReposo = $request->duracionReposo;
        $servicio->save();
        $servicios = Trabajo::orderBy('nombre', 'asc')->get();
        $categorias = Trabajo::orderBy('nombre', 'asc')->get()->unique('categoria');
        $user = Auth::user();
        return view("gestionServicios", [
            "mensaje" => $mensaje,
            'user' => $user,
            "servicios" => $servicios,
            "categorias" => $categorias,
            "submit" => "Añadir"
        ]);
    }
}
