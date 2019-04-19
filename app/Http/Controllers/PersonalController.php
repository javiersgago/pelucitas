<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user();
        if (!$user->esAdmin)
            return redirect("/empleados");
        $empleados = User::all();
        return view("personal", [
            "mensaje" => "",
            'user' => $user,
            "empleados" => $empleados,
            "submit" => "Añadir"
        ]);
    }

    public function store(Request $request) {
        if ($request->empleado) {
            $empleado = User::find($request->empleado);
            $mensaje = "Se han actualizado los datos de " . $empleado->name;
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$empleado->id,
                'esAdmin' => 'required',
                'entrada' => 'required',
                'inicioDescanso' => 'required',
                'duracionDescanso' => 'required',
                'salida' => 'required'
            ]);
        }
        else {
            $empleado = new User;
            $mensaje = "Se ha registrado a " . $request->name . " como nuevo empleado";
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'esAdmin' => 'required',
                'entrada' => 'required',
                'inicioDescanso' => 'required',
                'duracionDescanso' => 'required',
                'salida' => 'required'
            ]);
        }

        $empleado->name = $request->name;
        $empleado->email = $request->email;
        if ($request->password)
            $empleado->password = bcrypt($request->password);
        $empleado->esAdmin = $request->esAdmin;
        $empleado->entrada = $request->entrada;
        $empleado->inicioDescanso = $request->inicioDescanso;
        $empleado->duracionDescanso = $request->duracionDescanso;
        $empleado->salida = $request->salida;
        $empleado->save();
        $empleados = User::all();
        $user = Auth::user();
        return view("personal", [
            "mensaje" => $mensaje,
            'user' => $user,
            "empleados" => $empleados,
            "submit" => "Añadir"
        ]);
    }
}
