<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Adapter\PagseguroTransaction;
use Adapter\PagseguroTransactionAdapter;
use Adapter\PaypalTransaction;
use Adapter\PaypalTransactionAdapter;

class TransactionTest extends TestCase
{
    public function testDeveFazerUmaTrasacaoNoPagseguro()
    {   
        $pagseguroTransaction = new PagseguroTransaction("ADDDNNG", 1000, 2);
        $transaction = new PagseguroTransactionAdapter($pagseguroTransaction);
        $this->assertEquals('paid', $transaction->status);
    }

    public function testDeveFazerUmaTrasacaoNoPaypal()
    {   
        $paypalTransaction = new PaypalTransaction("65164165165", 1000, "S");
        $transaction = new PaypalTransactionAdapter($paypalTransaction);
        $this->assertEquals('paid', $transaction->status);
    }
}