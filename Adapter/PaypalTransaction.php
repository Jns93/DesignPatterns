<?php 

namespace Adapter;


class PaypalTransaction
{
    public $id;
    public $amount;
    public $status;

    function __construct(string $id, float $amount, string $status) 
    {
        $this->id = $id;
        $this->amount = $amount;
        $this->status = $status;
    }
}

