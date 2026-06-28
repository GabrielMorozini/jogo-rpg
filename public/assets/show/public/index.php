<?php
include_once __DIR__ . '/../src/function/selectCharacter.php';
include_once __DIR__ . '/../src/function/battle.php';

list($player1, $player2) = menuCharacter();
fight($player1, $player2);