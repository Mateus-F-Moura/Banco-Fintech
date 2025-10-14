<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Model\ContaCorrente;
use App\Model\ContaPoupanca;
use App\Model\ContaBancaria;
use App\Service\GeradorDeRelatorio;

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Bancário - POO em PHP</title>
</head>
<body>

    <div class="container">
        <h1>Sistema Bancário - Atividade Prática de POO</h1>

        <div class="operacoes">
            <h2>Informações Gerais do Banco</h2>
            <p><?php ContaBancaria::mostrarLimite(); ?></p>
        </div>

        <hr>

        <h2>Conta Corrente - Titular: Carlos Pereira</h2>
        <?php $contaCarlos = new ContaCorrente("Carlos Pereira", "CC-55667-8"); ?>
        
        <div class="operacoes">
            <h3>Operações Realizadas:</h3>
            <p><?php $contaCarlos->depositar(5000.00); ?></p>
            <p><?php $contaCarlos->sacar(1500.00); ?></p>
            <p><?php $contaCarlos->sacar(4000.00); ?></p>
            <p><?php $contaCarlos->depositar(-200.00); ?></p>
            <p><strong>Saldo Final:</strong> R$ <?php echo number_format($contaCarlos->verSaldo(), 2, ',', '.'); ?></p>
        </div>

        <hr>

        <h2>Conta Poupança - Titular: Ana Costa</h2>
        <?php $contaAna = new ContaPoupanca("Ana Costa", "CP-11223-4"); ?>
        
        <div class="operacoes">
            <h3>Operações Realizadas:</h3>
            <p><?php $contaAna->depositar(12000.00); ?></p>
            <p><?php $contaAna->sacar(2500.00); ?></p>
            <p><?php $contaAna->aplicarRendimento(); ?></p>
            <p><strong>Saldo Final:</strong> R$ <?php echo number_format($contaAna->verSaldo(), 2, ',', '.'); ?></p>
        </div>

        <hr>

        <h2>Relatórios Finais das Contas</h2>

        <div class="relatorio">
            <?php
                $relatorioCarlos = new GeradorDeRelatorio($contaCarlos);
                $relatorioCarlos->gerar();
            ?>
        </div>

        <div class="relatorio">
            <?php
                $relatorioAna = new GeradorDeRelatorio($contaAna);
                $relatorioAna->gerar();
            ?>
        </div>

    </div>

</body>
</html>