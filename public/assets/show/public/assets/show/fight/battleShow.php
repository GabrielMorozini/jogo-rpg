<?php
require_once __DIR__ . '/../../../../src/function/cleaner.php';

function renderHeader($turn, $player1, $player2, $activePlayer)
{
    clearScreen();
    getCharacterArt($activePlayer->getCharacter());
    echo "\n{$player1->getName()} (HP: {$player1->getCharacter()->getHp()}) VS {$player2->getName()} (HP: {$player2->getCharacter()->getHp()})\n\n";
        echo "                                            === TURNO $turn ===\n";

}

function logBattle($logs) {
    echo "         />_________________________________                                    _________________________________<\
[########[]_________________________________>  === HISTÓRICO DE COMBATE  ===   <_________________________________[][########]
         \>                                                                                                      </ \n";
    
    $lastLogs = array_slice($logs, -5);
    foreach ($lastLogs as $log) {
        echo "==> ". $log . "\n";
    }
}

function status($activePlayer)
{
    echo "É a vez de {$activePlayer->getName()}! O que deseja fazer?\n\n";
    echo "[1] Atacar | [2] Defender | [3] Habilidade Especial\n";
}

