<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpleadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $consultaCitas = $user->citas()->get()->where('dia', date('Y-m-d'));
        $citas = array();

        $aux = new \DateTime("00:00:00");
        $apertura = new \DateTime("09:00:00");
        $cierre = new \DateTime("21:00:00");
        $hora = new \DateTime($apertura->format("H:i:s"));

        $tamDiv = 50;

        while ($hora <= $cierre) {
            $cita = new \stdClass();
            $cita->hora = $hora;
            $html = "";

            //  Cerrar div si es hora de salida
            $consulta = $consultaCitas->where('horaSalida', $hora->format("H:i:s"));
            if ($consulta->count() != 0) {
                $html .= "</div>";
            }

            //  Abrir div y añadir texto si es hora de entrada
            $consulta = $consultaCitas->where('horaEntrada', $hora->format("H:i:s"));
            if ($consulta->count() != 0) {
                $horaEntrada = (new \DateTime($consulta->first()->horaEntrada))->getTimestamp();
                $horaSalida = (new \DateTime($consulta->first()->horaSalida))->getTimestamp();
                $duracion = $horaSalida - $horaEntrada;
                $duracion /= 1000*60*5; // /5 minutos
                $cliente = $consulta->first()->cliente;
                $telefono = $consulta->first()->telefono;
                $trabajo = $consulta->first()->trabajo()->nombre;
                if ($consulta->first()->trabajo()->inicioReposo)
                $html .= "<div style=\"height:".($duracion*$tamDiv)."px\">";
                $html .= "<p>".$cliente."</p>";
                $html .= "<p>".$trabajo."</p>";
                $html .= "<p>".$telefono."</p>";
            }

            $cita->html = $html;

            array_push($citas, $cita);

            $suma = new \DateTime("00:05:00");
            $hora->add($aux->diff($suma));
        }

        return view('empleados', [
            'user' => $user,
            'citas' => $citas,
            'tamDiv' => $tamDiv
        ]);
    }
}
