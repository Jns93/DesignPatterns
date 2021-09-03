<?php 

namespace Strategy\Antes;

use Carbon\Carbon;

class Estacionamento
{
    private $tickets = [];
    private $localidade = '';

    function __construct($localidade) 
    {
        $this->tickets = [];
        $this->localidade = $localidade;
    }

    public function checkIn($placaDoCarro, $dateCheckIn)
    {
        $this->tickets[$placaDoCarro] = array(['placa' => $placaDoCarro, 'dateCheckIn' => $dateCheckIn]);
    }

    public function checkOut($placaDoCarro, $dateCheckOut)
    {
        $total = 0;
        if(array_key_exists($placaDoCarro, $this->tickets)) {
            $ticket = $this->tickets[$placaDoCarro];
        } else {
            throw new \Exception("Ticket not found");
        }
        foreach($ticket as $item) {
            $dateCheckIn = $item['dateCheckIn'];
        }
        $periodo = ($dateCheckIn->diffInHours($dateCheckOut));
        if($this->localidade === "Praia") {
            //Estacionamentos na praia cobram 5 reais por hora
            $total = $periodo * 5;
        }
        if($this->localidade === "Aeroporto") {
            //Estacionamento no aeroporto cobra periodo minimo de 3H por R$10 e R$3 por horas remanescentes
            $total = 10;
            $horasRemanescentes = $periodo - 3;
            if ($horasRemanescentes > 0) $total += $horasRemanescentes * 3;
        }
        if($this->localidade === "Shopping") {
            //Estacionamento no shopping é gratuiro entre 12H e 14H 
            if ($dateCheckIn->format('H') >= 12 && $dateCheckOut->format('H') <= 14) {
                $total = 0;
            } else {
                $total = $periodo * 3;
            }
        }
        return $total;
    }

}

