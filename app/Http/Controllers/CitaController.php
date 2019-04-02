<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cita;
use App\Trabajo;

class CitaController extends Controller
{
    public function index() {
        $peluqueros = User::all();
        $manana = new \DateTime();
        $manana->modify('+1 day');
        return view("cita", [
            "tipo" => "",
            "mensaje" => "",
            "peluqueros" => $peluqueros,
            "manana" => $manana->format('Y-m-d')
        ]);
    }
    
    public function store(Request $request) {
        
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
        
        $peluqueros = User::all();
        $manana = new \DateTime();
        $manana->modify('+1 day');
        return view("cita", [
            "tipo" => "confirma",
            "mensaje" => "Su cita se ha registrado",
            "peluqueros" => $peluqueros,
            "manana" => $manana->format('Y-m-d')
        ]);
    }
}
