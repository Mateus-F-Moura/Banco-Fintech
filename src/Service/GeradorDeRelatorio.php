<?php

namespace App\Service;

use App\Model\ContaBancaria;

class GeradorDeRelatorio
{
    private ContaBancaria $conta;
    public function __construct(ContaBancaria $conta)
    {
        $this->conta = $conta;
    }

    public function gerar(): void
    {
        echo "--- Relatório da Conta ---<br>";
        echo "Titular: " . $this->conta->getTitular() . "<br>";
        echo "Nº da Conta: " . $this->conta->getNumeroConta() . "<br>";
        echo "Saldo Atual: R$ " . number_format($this->conta->verSaldo(), 2, ',', '.') . "<br>";
        echo "Tarifa da conta: R$ " . number_format($this->conta->calcularTarifa(), 2, ',', '.') . "<br>";
        echo "--------------------------<br>";
    }
}