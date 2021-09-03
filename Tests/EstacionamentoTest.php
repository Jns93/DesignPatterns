<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Carbon\Carbon;
use Strategy\Depois\Estacionamento;
use Strategy\Depois\CalculadoraDeTicketAeroporto;
use Strategy\Depois\CalculadoraDeTicketPraia;
use Strategy\Depois\CalculadoraDeTicketShopping;


class EstacionamentoTest extends TestCase
{
    public function testDeveCalcularValorDoTicketParaCarroEstacionado3HNaPraia()
    {
        $estacionamento = new Estacionamento("Praia", new CalculadoraDeTicketPraia());
        $estacionamento->checkIn("ABC-9876", Carbon::createFromDate("2020-10-10 10:00:00"));
        $ticket = $estacionamento->checkOut("ABC-9876",  Carbon::createFromDate("2020-10-10 13:00:00"));
        $this->assertEquals(15, $ticket);
    }

    public function testDeveCalcularValorDoTicketParaCarroEstacionado3HNoAeroporto()
    {
        $estacionamento = new Estacionamento("Aeroporto", new CalculadoraDeTicketAeroporto());
        $estacionamento->checkIn("ABC-9876", Carbon::createFromDate("2020-10-10 10:00:00"));
        $ticket = $estacionamento->checkOut("ABC-9876",  Carbon::createFromDate("2020-10-10 20:00:00"));
        $this->assertEquals(31, $ticket);
    }

    public function testDeveCalcularValorDoTicketParaCarroEstacionado2HNaHoraDoAlmoçoNoShopping()
    {
        $estacionamento = new Estacionamento("Shopping", new CalculadoraDeTicketShopping());
        $estacionamento->checkIn("ABC-9876", Carbon::createFromDate("2020-10-10 12:00:00"));
        $ticket = $estacionamento->checkOut("ABC-9876",  Carbon::createFromDate("2020-10-10 14:00:00"));
        $this->assertEquals(0, $ticket);
    }
}