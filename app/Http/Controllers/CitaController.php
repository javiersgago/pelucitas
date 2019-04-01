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
        return view("cita", [
            "tipo" => "",
            "mensaje" => "",
            "peluqueros" => $peluqueros
        ]);
    }
    
    public function store(Request $request) {
        $idTrabajo = $request->servicio;
        $trabajo = Trabajo::find($idTrabajo);
        $aux = new \DateTime("00:00:00");
        $horaEntrada = new \DateTime($request->hora . ":00");
        $horaSalida = new \DateTime($trabajo->duracion);
        $horaSalida->add($aux->diff($horaEntrada));
        
        $cita = new Cita;
        $cita->cliente = $request->cliente;
        $cita->telefono = $request->telefono;
        $cita->dia = $request->dia;
        $cita->horaEntrada = $horaEntrada->format("H:i:s");
        $cita->horaSalida = $horaSalida->format("H:i:s");
        $cita->user_id = $request->peluquero;
        $cita->trabajo_id = $idTrabajo;
        $cita->save();
        
        $peluqueros = User::all();
        return view("cita", [
            "tipo" => "confirma",
            "mensaje" => "Su cita se ha registrado",
            "peluqueros" => $peluqueros
        ]);
    }
}
