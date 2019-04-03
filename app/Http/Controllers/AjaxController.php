<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cita;
use App\Trabajo;
use Illuminate\Support\Facades\Auth;
use App\Agenda;

class AjaxController extends Controller
{

    public function agenda(Request $request) {
        $user = Auth::user();
        $agenda = new Agenda;
        $citas = $agenda->generar($request->peluquero, $request->dia);
        echo view("ajax.agendaDia", [
            "user" => $user,
            "citas" => $citas,
            "tamDiv" => $agenda->tamDiv
        ]);
    }

    public function borrarCita(Request $request) {
        $cita = Cita::find($request->cita);
        $citaAsociada = Cita::where('cita_id', $cita->id);
        if ($citaAsociada->count() != 0) {
            $citaAsociada->first()->delete();
            $cita->delete();
        } else {
            $cita->delete();
        }   
    }

    public function citasPeluquero(Request $request)
    {
        $id = $request->peluquero;
        $trabajos = User::find($id)->trabajos()->get();
        echo view("ajax.citasPeluquero", [
            "trabajos" => $trabajos
        ]);
    }

    public function citasDia(Request $request)
    {
        // Recogemos datos de POST
        $dia = $request->dia;
        $idUser = $request->peluquero;
        $idTrabajo = $request->servicio;

        // Cogemos peluquero y servicio de la base de datos
        $user = User::find($idUser);
        $trabajo = Trabajo::find($idTrabajo);

        // Objeto DateTime auxiliar para hacer sumas de horas
        $aux = new \DateTime("00:00:00");

        // Recogemos horarios del peluquero
        $hora = new \DateTime($user->entrada); // Hora a comprobar
        $inicioDescanso = new \DateTime($user->inicioDescanso);
        $duracionDescanso = new \DateTime($user->duracionDescanso);
        $finDescanso = new \DateTime($inicioDescanso->format("H:i:s")); // Primero recogemos la hora a la que empieza el descanso
        $finDescanso->add($aux->diff($duracionDescanso)); // Y le sumamos su duración
        $salidaEmpleado = new \DateTime($user->salida);

        // Recogemos duración del trabajo
        $duracionTrabajo = new \DateTime($trabajo->duracion);
        $finTrabajo = new \DateTime($hora->format("H:i:s")); // Primero recogemos la hora a comprobar
        $finTrabajo->add($aux->diff($duracionTrabajo)); // Y le sumamos la duración del trabajo

        // Array en el que vamos a colocar todas las horas disponibles
        $opciones = array();

        while ($finTrabajo <= $salidaEmpleado) {
            $validacion = true;
            $citas = Cita::where('user_id', $idUser)->where('dia', $dia)
                ->where('horaEntrada', '<', $finTrabajo->format("H:i:s"))
                ->where('horaSalida', '>', $hora->format("H:i:s"));

            if (($finTrabajo > $inicioDescanso) && ($hora < $finDescanso)) { // ¿Está en el descanso?
                $validacion = false;
            } elseif ($citas->count() != 0) {
                if (isset($trabajo->inicioReposo)) {
                    $duracionInicioReposo = new \DateTime($trabajo->inicioReposo);
                    $inicioReposo = new \DateTime($hora->format("H:i:s"));
                    $inicioReposo->add($aux->diff($duracionInicioReposo));
                    $duracionReposo = new \DateTime($trabajo->duracionReposo);
                    $finReposo = new \DateTime($inicioReposo->format("H:i:s"));
                    $finReposo->add($aux->diff($duracionReposo));
                    $citasAntes = Cita::where('user_id', $idUser)->where('dia', $dia)
                        ->where('horaEntrada', '<', $inicioReposo->format("H:i:s"))
                        ->where('horaSalida', '>', $hora->format("H:i:s"));
                    $citasDespues = Cita::where('user_id', $idUser)->where('dia', $dia)
                        ->where('horaEntrada', '<', $finTrabajo->format("H:i:s"))
                        ->where('horaSalida', '>', $finReposo->format("H:i:s"));
                    if (($citasAntes->count() != 0) || ($citasDespues->count() != 0)) {
                        $validacion = false;
                    }
                } else
                    $validacion = false;
            }

            $opcion = new \stdClass();
            $opcion->hora = $hora->format("H:i");
            if ($validacion) {
                $opcion->habilitado = "enabled";
                array_push($opciones, $opcion);
            } else {
                $opcion->habilitado = "disabled";
                array_push($opciones, $opcion);
            }

            $suma = new \DateTime("00:05:00");
            $hora->add($aux->diff($suma));
            $finTrabajo = new \DateTime($hora->format("H:i:s"));
            $finTrabajo->add($aux->diff($duracionTrabajo));
        }

        echo view("ajax.citasDia", [
            "opciones" => $opciones
        ]);
    }
}
