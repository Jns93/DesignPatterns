<?php

namespace Strategy\Depois;

use Strategy\Depois\CalculadoraDeTicket;

class CalculadoraDeTicketPraia implements CalculadoraDeTicket
{
    public function calculate($dateCheckIn, $dateCheckOut)
    {
        //Estacionamentos na praia cobram 5 reais por hora
        $total = 0;
        $periodo = ($dateCheckIn->diffInHours($dateCheckOut));
        $total = $periodo * 5;
        return $total;
    }
}