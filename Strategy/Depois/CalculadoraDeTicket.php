<?php

namespace Strategy\Depois;

interface CalculadoraDeTicket
{
    public function calculate($dateCheckIn, $dateCheckOut);
}
