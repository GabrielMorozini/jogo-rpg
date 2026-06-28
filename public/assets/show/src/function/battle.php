<?php
require_once __DIR__ . '/../../public/assets/show/fight/berserker.php';
require_once __DIR__ . '/../../public/assets/show/fight/wizard.php';
require_once __DIR__ . '/../../public/assets/show/fight/archer.php';
require_once __DIR__ . '/../../public/assets/show/fight/battleShow.php';
require_once __DIR__ . '/cleaner.php';

function getCharacterArt(Character $character)
{
    match (true) {
        $character instanceof Berserker => berserker(),
        $character instanceof Wizard     => wizard(),
        $character instanceof Archer      => archer(),
        default                          => null,
    };
}

function fight(Player $player1, Player $player2)
{
    $turn = 1;
    $activePlayer = $player1;
    $opponent = $player2;
    $logs = [];

    while ($player1->getCharacter()->getHp() > 0 && $player2->getCharacter()->getHp() > 0) {
        clearScreen();
        renderHeader($turn, $player1, $player2, $activePlayer);
        logBattle($logs);
        $activePlayer->getCharacter()->resetBuffer();

        $validAction = false;
        while (!$validAction) {
            status($activePlayer);
            $action = readKey();

            if (in_array($action, ['1', '2', '3'])) {
                $validAction = true;

                try {
                    switch ($action) {
                        case '1':
                            $dano = $activePlayer->getCharacter()->attackTarget($opponent->getCharacter());
                            $logs[] = "{$activePlayer->getName()} atacou e causou {$dano} de dano!";
                            break;
                        case '2':
                            $activePlayer->getCharacter()->defend();
                            $logs[] = "{$activePlayer->getName()} defendeu-se!";
                            break;
                        case '3':
                            $logs[] = $activePlayer->getCharacter()->specialSkill($opponent->getCharacter());
                            break;
                    }
                    $validAction = true;
                } catch (Exception $error) {
                    echo "Erro: " . $error->getMessage() . "\n";
                    sleep(2);
                }
            } else {
                echo "Opção inválida! Escolha 1, 2 ou 3.\n";
                sleep(1);

                clearScreen();
                getCharacterArt($activePlayer->getCharacter());
                renderHeader($turn, $player1, $player2, $activePlayer);
                logBattle($logs);
            }
        }

        $temp = $activePlayer;
        $activePlayer = $opponent;
        $opponent = $temp;
        $turn++;
    }

    echo "Fim de jogo! O vencedor foi ";
}
