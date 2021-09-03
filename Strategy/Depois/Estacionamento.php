<?php 

namespace Strategy\Depois;

use Carbon\Carbon;
use Strategy\Depois\CalculadoraDeTicket;

class Estacionamento
{
    private $tickets = [];
    private $localidade = '';

    function __construct($localidade, CalculadoraDeTicket $calculadoraDeTicket) 
    {
        $this->calculadoraDeTicket = $calculadoraDeTicket;
        // 1- Invertendo a dependencia: 
        //   Esse modulo nao conhece o outro (calculadora de tickets)
        $this->tickets = [];
        $this->localidade = $localidade;
    }

    public function checkIn($placaDoCarro, $dateCheckIn)
    {
        $this->tickets[$placaDoCarro] = array(['placa' => $placaDoCarro, 'dateCheckIn' => $dateCheckIn]);
    }

    public function checkOut($placaDoCarro, $dateCheckOut)
    {
        //2- Single responsability
        //Pegou as coisas que mudam por motivos diferentes e extraiu
        if(array_key_exists($placaDoCarro, $this->tickets)) {
            $ticket = $this->tickets[$placaDoCarro];
        } else {
            throw new \Exception("Ticket not found");
        }
        foreach($ticket as $item) {
            $dateCheckIn = $item['dateCheckIn'];
        }
        $total = $this->calculadoraDeTicket->calculate($dateCheckIn, $dateCheckOut);
 
        return $total;
    }

}

