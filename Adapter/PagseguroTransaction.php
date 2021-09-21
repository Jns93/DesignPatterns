<?php 

namespace Adapter;


class PagseguroTransaction
{
    public $code;
    public $grossAmount;
    public $status;

    function __construct(string $code, float $grossAmount, int $status) 
    {
        $this->code = $code;
        $this->grossAmount = $grossAmount;
        $this->status = $status;
    }
}

