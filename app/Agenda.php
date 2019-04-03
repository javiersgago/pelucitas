<?php

namespace App;

class Agenda {

    public $tamDiv = 20;

    public function generar($userId, $dia) {
        $citas = array();

        $aux = new \DateTime("00:00:00");
        $apertura = new \DateTime("09:00:00");
        $cierre = new \DateTime("21:00:00");
        $hora = new \DateTime($apertura->format("H:i:s"));

        while ($hora < $cierre) {
            $cita = new \stdClass();
            $cita->hora = new \DateTime($hora->format("H:i:s"));
            $html = "";

            //  Cerrar div si es hora de salida
            $consulta = Cita::where('user_id', $userId)->where('dia', $dia)->where('horaSalida', $hora->format("H:i:s"));
            if ($consulta->count() != 0) {
                $html .= "</div>";
            }

            //  Abrir div y añadir texto si es hora de entrada
            $consulta = Cita::where('user_id', $userId)->where('dia', $dia)->where('horaEntrada', $hora->format("H:i:s"));
            if ($consulta->count() != 0) {
                $horaEntrada = (new \DateTime($consulta->first()->horaEntrada))->getTimestamp();
                $horaSalida = (new \DateTime($consulta->first()->horaSalida))->getTimestamp();
                $duracion = $horaSalida - $horaEntrada;
                $duracion /= 60*5; // /5 minutos
                $inicio = $horaEntrada - $apertura->getTimestamp();
                $inicio /= 60*5;
                $cliente = $consulta->first()->cliente;
                $telefono = $consulta->first()->telefono;
                $trabajo = $consulta->first()->trabajo()->get()->first()->nombre;
                $id = $consulta->first()->id;
                $html .= "<div class=\"col-xs-12\" style=\"height:".($duracion*$this->tamDiv)."px;top:".($inicio*$this->tamDiv)."px;position: absolute;border: solid 1px;\">";
                $html .= "<p style=\"font-size: 10px;height: 3px;\">".$cliente."</p>";
                $html .= "<p style=\"font-size: 10px;height: 3px;\">".$telefono."</p>";
                $html .= "<p style=\"font-size: 10px;height: 3px;\">".$trabajo." ";
                if (!$consulta->first()->cita_id)
                    $html .= "<button onclick=\"borrarCita(".$id.")\">X</button></p>";
                else
                    $html .= "(Continuación)</p>";
            }

            $cita->html = $html;

            array_push($citas, $cita);

            $suma = new \DateTime("00:05:00");
            $hora->add($aux->diff($suma));
        }

        return $citas;
    }
}