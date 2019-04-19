<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trabajo;

class ServiciosController extends Controller
{
    public function index() {
        $trabajos = Trabajo::all();
        $resultado = array();
        foreach($trabajos as $trabajo) {
            if ($trabajo->users()->first()) {
                if (! isset($resultado[$trabajo->categoria]))
                    $resultado[$trabajo->categoria] = array();
                $resultado2 = new \stdClass();
                $resultado2->nombre = $trabajo->nombre;
                $resultado2->precio = number_format($trabajo->precio, 2);
                array_push($resultado[$trabajo->categoria], $resultado2);
            }
        }
        return view("servicios", ["resultado" => $resultado]);
    }
}
