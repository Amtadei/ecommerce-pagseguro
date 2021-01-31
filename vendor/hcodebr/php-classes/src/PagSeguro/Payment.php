<?php

namespace Hcode\PagSeguro;

use Exception;
use DOMDocument;
use DOMElement;
//use Hcode\PagSeguro\Sender;
//use Hcode\PagSeguro\Shipping;
//use Hcode\PagSeguro\Bank;
use Hcode\PagSeguro\Payment\Method;

class Payment {

    private $reference = "";
    private $sender;
    private $shipping;
    private $extraAmount = 0;
    private $mode = "default";
    private $currency = "BRL";
    private $items = [];
    private $method;
    private $creditCard;
    private $bank;   // Não existe mais

    public function __construct(
        string $reference,
        Sender $sender,
        Shipping $shipping,
        float $extraAmount = 0) 
    {
        
        $this->reference = $reference;
        $this->sender = $sender;
        $this->shipping = $shipping;
        $this->extraAmount = number_format($extraAmount,2, ".", "");

    }

    public function addItem(Item $item)
    {

        array_push($this->items, $item);

    }

    public function getDOMDocument():DOMDocument
    {

        $dom = new DOMDocument("1.0","ISO-8859-1");

        return  $dom;

    }

    public function setCreditCard(CreditCard $creditCard)
    {

        $this->creditCard = $creditCard;
        $this->method = Method::CREDIT_CARD;

    }

    public function setBank(Banck $bank)
    {

        $this->bank = $bank;
        $this->method = Method::DEBIT;

    }

    public function setBoleto()
    {

        $this->method = Method::BOLETO;

    }


}

?>