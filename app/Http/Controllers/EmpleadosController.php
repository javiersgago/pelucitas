<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class EmpleadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $consultaCitas = User::find($user->id)->citas()->get()->where('dia', date('Y-m-d'));
        $citas = array();

        $aux = new \DateTime("00:00:00");
        $apertura = new \DateTime("09:00:00");
        $cierre = new \DateTime("21:00:00");
        $hora = new \DateTime($apertura->format("H:i:s"));


        return view('empleados', ['user' => $user]);

        while ($hora <= $cierre) {
            $cita = new \stdClass();
            $cita->hora = $hora;
            $cita->html = "";

            //  TODO
            //  Cerrar div si es hora de salida
            $consulta = $consultaCitas->where('horaSalida', $hora->format("H:i:s"));

            //  Abrir div y añadir texto si es hora de entrada

            array_push($citas, $cita);
        }
    }
}
