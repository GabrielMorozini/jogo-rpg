<?php
require_once __DIR__ . '../../../../src/function/cleaner.php';
require_once __DIR__ . '../../../../src/function/battle.php';

function showGameOver($winner,$loser,$turn) {
echo "========================================================\n";
    echo "                    FIM DE JOGO!                     \n";
    echo "========================================================\n\n";
    
    echo " O vencedor é: {$winner->getName()} ({$winner->getCharacter()->getClass()})!\n";
    echo " Turnos totais: {$turn}\n";
    echo " Vida restante: {$winner->getCharacter()->getHp()} HP\n\n";
    
    echo "--------------------------------------------------------\n";
    echo " Obrigado por jogar! Pressione qualquer tecla para sair.\n";
    echo "========================================================\n";
    
    // Pausa para o jogador ver o resultado
    readKey();
}