<?php
require_once __DIR__ . '/../../public/assets/show/berserkerShow.php';
require_once __DIR__ . '/../../public/assets/show/wizardShow.php';
require_once __DIR__ . '/../../public/assets/show/archerShow.php';
require_once __DIR__ . '/../../public/assets/show/mainShow.php';
require_once __DIR__ . '/cleaner.php';
require_once __DIR__ . '/player.php';
require_once __DIR__ . '/classes/character.php';
require_once __DIR__ . '/classes/players.php';
require_once __DIR__ . '/classes/berserker.php';
require_once __DIR__ . '/classes/wizard.php';
require_once __DIR__ . '/classes/archer.php';
function menuCharacter()
{
    list($name1, $name2) = declarePlayer();
    $choice1 = loopSelection($name1);
    // Transforma o número no objeto correspondente (personagem)
    $characterPlayer1 = createCharacterInstance($choice1);

    $choice2 = loopSelection($name2);
    $characterPlayer2 = createCharacterInstance($choice2);

    $player1 = new Player($name1, $characterPlayer1);
    $player2 = new Player($name2, $characterPlayer2);

    return [$player1, $player2];
}

function createCharacterInstance($choice)
{
    return match ($choice) {
        1 => new Berserker(),
        2 => new Wizard(),
        3 => new Archer(),
        default => new Berserker(),
    };
}
