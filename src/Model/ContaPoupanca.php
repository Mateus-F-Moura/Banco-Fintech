<?php

namespace App\Model;

class ContaPoupanca extends ContaBancaria
{
    private float $taxaRendimento;

    public function __construct(string $titular, string $numeroConta, float $taxaRendimento = 0.05) // 5%
    {
        parent::__construct($titular, $numeroConta);
        $this->taxaRendimento = $taxaRendimento;
    }

    public function aplicarRendimento(): void
    {
        $rendimento = $this->verSaldo() * $this->taxaRendimento;
        $this->depositar($rendimento);
        echo "Rendimento de R$ " . number_format($rendimento, 2, ',', '.') . " aplicado.<br>";
    }

    // Implementação obrigatória do método abstrato
    public function calcularTarifa(): float
    {
        return 0.0; // Contas poupança geralmente não têm tarifa de manutenção
    }
}