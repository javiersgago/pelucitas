<?php

use Illuminate\Database\Seeder;
use App\Trabajo;

class TrabajosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // php artisan make:seeder TrabajosTableSeeder
    public function run()
    {
        $corteCab = new Trabajo;
        $corteCab->nombre = "Corte Caballero";
        $corteCab->categoria = "Cortes";
        $corteCab->precio = 10.00;
        $corteCab->duracion = "00:15:00";
        $corteCab->save();

        $tinte = new Trabajo;
        $tinte->nombre = "Tinte";
        $tinte->categoria = "Color";
        $tinte->precio = 20.00;
        $tinte->duracion = "00:50:00";
        $tinte->inicioReposo = "00:10:00";
        $tinte->duracionReposo = "00:30:00";
        $tinte->save();
    }
}
