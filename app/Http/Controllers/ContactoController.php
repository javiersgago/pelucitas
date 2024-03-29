<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacto;

class ContactoController extends Controller
{
    public function index() {
        return view("contacto", [
            "tipo" => "",
            "mensaje" => ""
        ]);
    }
    
    public function store(Request $request) {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'telefono' => 'required|regex:/[0-9]{9}/',
            'email' => 'required|email',
            'comentario' => 'required'
        ]);
        $contacto = new Contacto;
        $contacto->nombre = $request->nombre;
        $contacto->telefono = $request->telefono;
        $contacto->email = $request->email;
        $contacto->comentario = $request->comentario;
        $contacto->save();
        return view("contacto", [
            "tipo" => "confirma",
            "mensaje" => "Se han guardado sus datos. Le contactaremos lo antes posible."
        ]);
    }
}
