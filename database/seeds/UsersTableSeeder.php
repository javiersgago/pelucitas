<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // php artisan make:seeder UsersTableSeeder
    public function run()
    {
        $jefe = new User;
        $jefe->name = "Jefe";
        $jefe->email = "jefe@gmail.com";
        $jefe->password = bcrypt('1234');
        $jefe->esAdmin = 1;
        $jefe->entrada = "09:00:00";
        $jefe->inicioDescanso = "14:00:00";
        $jefe->duracionDescanso = "01:00:00";
        $jefe->salida = "21:00:00";
        $jefe->save();

        $empleado1 = new User;
        $empleado1->name = "Empleado Mañana";
        $empleado1->email = "empleado1@gmail.com";
        $empleado1->password = bcrypt('1234');
        $empleado1->esAdmin = 0;
        $empleado1->entrada = "09:00:00";
        $empleado1->inicioDescanso = "14:00:00";
        $empleado1->duracionDescanso = "00:30:00";
        $empleado1->salida = "18:00:00";
        $empleado1->save();

        $empleado2 = new User;
        $empleado2->name = "Empleado Tarde";
        $empleado2->email = "empleado2@gmail.com";
        $empleado2->password = bcrypt('1234');
        $empleado2->esAdmin = 0;
        $empleado2->entrada = "13:00:00";
        $empleado2->inicioDescanso = "17:00:00";
        $empleado2->duracionDescanso = "00:30:00";
        $empleado2->salida = "21:00:00";
        $empleado2->save();
    }
}