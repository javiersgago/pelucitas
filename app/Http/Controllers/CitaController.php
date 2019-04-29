<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cita;
use App\Trabajo;

class CitaController extends Controller
{
    public function index() {
        $trabajos = Trabajo::all();
        $resultado = array();
        foreach($trabajos as $trabajo) {
            if ($trabajo->users()->first()) {
                $resultado2 = new \stdClass();
                $resultado2->nombre = $trabajo->nombre;
                $resultado2->id = $trabajo->id;
                array_push($resultado, $resultado2);
            }
        }
        $manana = new \DateTime();
        $manana->modify('+1 day');
        return view("cita", [
            "mensaje" => "",
            "servicios" => $resultado,
            "manana" => $manana->format('Y-m-d')
        ]);
    }
    
    public function store(Request $request) {
        $validatedData = $request->validate([
            'cliente' => 'required|max:20',
            'telefono' => 'required|min:9|max:9|regex:/[0-9]/',
            'servicio' => 'required',
            'peluquero' => 'required',
            'dia' => 'required',
            'hora' => 'required'
        ]);

        $idTrabajo = $request->servicio;
        $trabajo = Trabajo::find($idTrabajo);
        $aux = new \DateTime("00:00:00");
        $horaEntrada = new \DateTime($request->hora . ":00");
        $cita = new Cita;
        $cita->horaEntrada = $horaEntrada->format("H:i:s");
        $cita->cliente = $request->cliente;
        $cita->telefono = $request->telefono;
        $cita->dia = $request->dia;
        $cita->user_id = $request->peluquero;
        $cita->trabajo_id = $idTrabajo;

        if (!$trabajo->inicioReposo) {
            $horaSalida = new \DateTime($trabajo->duracion);
            $horaSalida->add($aux->diff($horaEntrada));
            $cita->horaSalida = $horaSalida->format("H:i:s");
            $cita->save();
        } else {
            $horaSalida = new \DateTime($trabajo->inicioReposo);
            $horaSalida->add($aux->diff($horaEntrada));
            $cita->horaSalida = $horaSalida->format("H:i:s");
            $cita->save();

            $cita2 = new Cita;
            $horaEntrada2 = new \DateTime($trabajo->duracionReposo);
            $horaEntrada2->add($aux->diff($horaSalida));
            $cita2->horaEntrada = $horaEntrada2->format("H:i:s");
            $cita2->cliente = $request->cliente;
            $cita2->telefono = $request->telefono;
            $cita2->dia = $request->dia;
            $cita2->user_id = $request->peluquero;
            $cita2->trabajo_id = $idTrabajo;
            $horaSalida2 = new \DateTime($trabajo->duracion);
            $horaSalida2->add($aux->diff($horaEntrada));
            $cita2->horaSalida = $horaSalida2->format("H:i:s");
            $cita2->cita_id = $cita->id;
            $cita2->save();
        }
        
        $trabajos = Trabajo::all();
        $resultado = array();
        foreach($trabajos as $trabajo) {
            if ($trabajo->users()->first()) {
                $resultado2 = new \stdClass();
                $resultado2->nombre = $trabajo->nombre;
                $resultado2->id = $trabajo->id;
                array_push($resultado, $resultado2);
            }
        }

        $manana = new \DateTime();
        $manana->modify('+1 day');
        return view("cita", [
            "mensaje" => "Su cita se ha registrado",
            "servicios" => $resultado,
            "manana" => $manana->format('Y-m-d')
        ]);
    }
}
