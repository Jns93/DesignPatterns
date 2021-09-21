<?php 

namespace Adapter;

use Adapter\Transaction;
use Adapter\PaypalTransaction;

class PaypalTransactionAdapter implements Transaction
{
    public string $trackNumber;
    public float $amount;
    public string $status;

    function __construct(PaypalTransaction $paypalTransaction) 
    {
        //Conversao da linguagem obliqua do paypal para linguagem obliqua na minha app
        $this->trackNumber = $paypalTransaction->id;
        $this->amount = $paypalTransaction->amount;
        $this->status = $this->convertStatus($paypalTransaction->status);
    }

    private function convertStatus(string $statusPaypal)
    {
        //Api paypal me da um status em numero, tenho que converter esse numero para minha linguagem obliqua.
        //Ex: No paypal o status "pago" é 2.
        switch ($statusPaypal) {
            case "P": 
                return "waiting_payment";
            case "S":
                return "paid";
            case "F":
                return "cancelled";
            default:
                return "";
        }
    }
}

