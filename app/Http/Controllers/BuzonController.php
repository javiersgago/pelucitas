<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contacto;


class BuzonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user();
        if (!$user->esAdmin)
            return redirect("/empleados");
        $mensajes = Contacto::orderBy('created_at', 'desc')->get();
        return view("buzon", [
            "user" => $user,
            "mensajes" => $mensajes
        ]);
    }

    public function show($id) {
        $user = Auth::user();
        if (!$user->esAdmin)
            return redirect("/empleados");
        $mensaje = Contacto::find($id);
        $mensaje->leido = 1;
        $mensaje->save();
        return view("mensaje", [
            "user" => $user,
            "mensaje" => $mensaje
        ]);
    }
}
