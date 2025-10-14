<?php

namespace App\Model;

use App\Contract\OperacoesBancarias;

abstract class ContaBancaria implements OperacoesBancarias
{
    public const LIMITE_SAQUE = 5000.00;

    private string $titular;
    private float $saldo;
    private string $numeroConta;

    public function __construct(string $titular, string $numeroConta)
    {
        $this->titular = $titular;
        $this->numeroConta = $numeroConta;
        $this->saldo = 0.0;
    }

    public function getTitular(): string
    {
        return $this->titular;
    }

    public function getNumeroConta(): string
    {
        return $this->numeroConta;
    }

    public function depositar(float $valor): void
    {
        if ($valor <= 0) {
            echo "Erro: O valor do depósito deve ser positivo.<br>";
            return;
        }
        $this->saldo += $valor;
        echo "Depósito de R$ " . number_format($valor, 2, ',', '.') . " realizado com sucesso.<br>";
    }

    public function sacar(float $valor): void
    {
        if ($valor <= 0) {
            echo "Erro: O valor do saque deve ser positivo.<br>";
            return;
        }
        if ($valor > self::LIMITE_SAQUE) {
            echo "Erro: O valor do saque excede o limite de R$ " . number_format(self::LIMITE_SAQUE, 2, ',', '.') . ".<br>";
            return;
        }
        if ($this->saldo < $valor) {
            echo "Erro: Saldo insuficiente para realizar o saque.<br>";
            return;
        }
        $this->saldo -= $valor;
        echo "Saque de R$ " . number_format($valor, 2, ',', '.') . " realizado com sucesso.<br>";
    }

    public function verSaldo(): float
    {
        return $this->saldo;
    }

    public static function mostrarLimite(): void
    {
        echo "O limite de saque padrão para todas as contas é: R$ " . number_format(self::LIMITE_SAQUE, 2, ',', '.') . "<br>";
    }

    abstract public function calcularTarifa(): float;
}