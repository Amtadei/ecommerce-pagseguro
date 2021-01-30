<?php

namespace Hcode\PagSeguro;

class Item {

    private $id;
    private $description;
    private $quantity;   
    private $amount;

    public function __construct(
        int $id,
        string $description,
        int $quantity,
        float $amount) {

        if (!$id || !$id > 0) 
        {
            throw new Expection("Informe o ID do item.");
        }

        if (!$idescription) 
        {
            throw new Expection("Informe a descrição do item.");
        }

        if (!$amount || !$amount > 0) 
        {
            throw new Expection("Informe o valor total do item.");
        }

        if (!$quantity || !$quantity > 0) 
        {
            throw new Expection("Informe a quantidade do item.");
        }

        $this->id = $id;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->amount = $amount;

    }

    public function getDOMElement():DOMElement
    {

        $dom = new DOMDocument();

        $item = $dom->createElement("item");
        $item = $dom->appendChild($item);

        $amount = $dom->createElement("amount", number_format($this->amount,2,".",""));
        $amount = $item->appendChild($amount);

        $quantity = $dom->createElement("quantity", $this->quantity);
        $quantity = $item->appendChild($quantity);

        $description = $dom->createElement("description", $this->description);
        $description = $item->appendChild($description);

        $id = $dom->createElement("id", $this->id);
        $id = $item->appendChild($id);

        return $item;

    }


}

?>