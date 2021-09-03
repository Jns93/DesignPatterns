<?php

namespace Strategy\Depois;

use Strategy\Depois\CalculadoraDeTicket;

class CalculadoraDeTicketShopping implements CalculadoraDeTicket
{
    public function calculate($dateCheckIn, $dateCheckOut)
    {
        $total = 0;
        $periodo = ($dateCheckIn->diffInHours($dateCheckOut));
        //Estacionamento no shopping é gratuiro entre 12H e 14H 
        if ($dateCheckIn->format('H') >= 12 && $dateCheckOut->format('H') <= 14) {
            $total = 0;
        } else {
            $total = $periodo * 3;
        }
        return $total;
    }
}