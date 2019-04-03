<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cita;
use App\Agenda;
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

        $peluqueros = User::all();

        $agenda = new Agenda;
        $citas = $agenda->generar($user->id, date("Y-m-d"));

        return view('empleados', [
            'user' => $user,
            'citas' => $citas,
            'tamDiv' => $agenda->tamDiv,
            'peluqueros' => $peluqueros
        ]);
    }
}
