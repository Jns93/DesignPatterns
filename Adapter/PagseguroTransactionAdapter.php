<?php 

namespace Adapter;

use Adapter\Transaction;
use Adapter\PagseguroTransaction;

class PagseguroTransactionAdapter implements Transaction
{
    public string $trackNumber;
    public float $amount;
    public string $status;

    function __construct(PagseguroTransaction $pagseguroTransaction) 
    {
        //Conversao da linguagem obliqua do pagseguro para linguagem obliqua na minha app
        $this->trackNumber = $pagseguroTransaction->code;
        $this->amount = $pagseguroTransaction->grossAmount;
        $this->status = $this->convertStatus($pagseguroTransaction->status);
    }

    private function convertStatus(int $statusPagseguro)
    {
        //Api Pagseguro me da um status em numero, tenho que converter esse numero para minha linguagem obliqua.
        //Ex: No pag seguro o status "pago" é 2.
        switch ($statusPagseguro) {
            case 1: 
                return "waiting_payment";
            case 2:
                return "paid";
            case 3:
                return "cancelled";
            default:
                return "";
        }
    }
}

