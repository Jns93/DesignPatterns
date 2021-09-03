<?php

namespace Strategy\Depois;

use Strategy\Depois\CalculadoraDeTicket;

class CalculadoraDeTicketAeroporto implements CalculadoraDeTicket
{
    public function calculate($dateCheckIn, $dateCheckOut)
    {
        //Estacionamento no aeroporto cobra periodo minimo de 3H por R$10 e R$3 por horas remanescentes
        $total = 10;
        $periodo = ($dateCheckIn->diffInHours($dateCheckOut));
        $horasRemanescentes = $periodo - 3;
        if ($horasRemanescentes > 0) $total += $horasRemanescentes * 3;
        return $total;
    }
}