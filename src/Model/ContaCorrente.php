<?php

namespace App\Model;

class ContaCorrente extends ContaBancaria
{
    private float $tarifaManutencao;

    public function __construct(string $titular, string $numeroConta, float $tarifaManutencao = 25.00)
    {
        parent::__construct($titular, $numeroConta);
        $this->tarifaManutencao = $tarifaManutencao;
    }
    
    public function calcularTarifa(): float
    {
        return $this->tarifaManutencao;
    }
}