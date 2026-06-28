<?php
require_once __DIR__ . '/../../../../src/function/cleaner.php';

function renderHeader($turn, $player1, $player2, $activePlayer)
{
    clearScreen();
    getCharacterArt($activePlayer->getCharacter());
    $character1 = $player1->getCharacter();
    $character2 = $player2->getCharacter();

    echo "\n{$player1->getName()} (HP: {$character1->getHp()} | MP: {$character1->getMana()}/{$character1->getManaMax()}) ";
    echo "VS ";
    echo "{$player2->getName()} (HP: {$character2->getHp()} | MP: {$character2->getMana()}/{$character2->getManaMax()})\n\n";
    echo "                                            === TURNO $turn ===\n";
}

function logBattle($logs)
{
    echo "         />_________________________________                                    _________________________________<\
[########[]_________________________________>  === HISTÓRICO DE COMBATE  ===   <_________________________________[][########]
         \>                                                                                                      </ \n";

    $lastLogs = array_slice($logs, -5);
    foreach ($lastLogs as $log) {
        echo "==> " . $log . "\n\n";
    }
}

function status($activePlayer)
{
    echo "É a vez de {$activePlayer->getName()}! O que deseja fazer?\n\n";
    echo "[1] Atacar | [2] Defender | [3] Habilidade Especial\n";
}
