<?php
include_once __DIR__ . '/../src/function/selectCharacter.php';
include_once __DIR__ . '/../src/function/battle.php';
require_once __DIR__ . '/assets/show/winnerShow.php';

list($player1, $player2) = menuCharacter();

$battleResult = fight($player1, $player2);

showGameOver(
    $battleResult['winner'],
    $battleResult['loser'],
    $battleResult['turns']
);
