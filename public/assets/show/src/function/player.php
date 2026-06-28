<?php
require_once __DIR__ . '/cleaner.php';
require_once __DIR__ . '/systemNavigation.php';
function declarePlayer()
{
  clearScreen();
  echo "=== CADASTRO DOS JOGADORES ===\n\n";

  echo "Digite o nome do Player 1 (ou aperte ENTER para 'Player 1'): ";
  $name1 = trim(fgets(STDIN));
  if ($name1 === '') $name1 = "Player 1";

  echo "Digite o nome do Player 2 (ou aperte ENTER para 'Player 2'): ";
  $name2 = trim(fgets(STDIN));
  if ($name2 === '') $name2 = "Player 2";
  return [$name1, $name2];
}

function loopSelection($playerNameCurrent)
{
  $characterSelected = 1;
  while (true) {
    clearScreen();
    menuShow();

    echo "Vez de $playerNameCurrent escolher seu personagem!\n";
    if ($characterSelected == 1) {
      berserkerShow();
    } elseif ($characterSelected == 2) {
      wizardShow();
    } elseif ($characterSelected == 3) {
      archerShow();
    }

    menuController();
    $comand = readKey();

    if ($comand === 'd') {
      $characterSelected = ($characterSelected == 3) ? 1 : $characterSelected + 1;
    } elseif ($comand === 'a') {
      $characterSelected = ($characterSelected == 1) ? 3 : $characterSelected - 1;
    } elseif ($comand === '') {
      return $characterSelected;
    }
  }
}