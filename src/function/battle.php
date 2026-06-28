<?php
require_once __DIR__ . '/../../public/assets/show/fight/berserker.php';
require_once __DIR__ . '/../../public/assets/show/fight/wizard.php';
require_once __DIR__ . '/../../public/assets/show/fight/archer.php';
require_once __DIR__ . '/../../public/assets/show/fight/battleShow.php';
require_once __DIR__ . '/dice.php';
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
        $char = $activePlayer->getCharacter();
        $novaMana = min($char->getMana() + 5, $char->getManaMax());
        $char->setMana($novaMana);
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
                            $result = $activePlayer->getCharacter()->attackTarget($opponent->getCharacter());

                            $dano = $result['damage'];
                            $roll = $result['roll'];

                            $logs[] = "{$activePlayer->getName()} rolou [D20: $roll] e causou {$dano} de dano!";
                            $validAction = true;
                            break;

                        case '2':
                            $roll = $activePlayer->getCharacter()->defend();
                            $logs[] = "{$activePlayer->getName()} rolou [D20: $roll] na defesa e se preparou!";
                            $validAction = true;
                            break;

                        case '3':
                            $char = $activePlayer->getCharacter();
                            $custoMana = $char->getSpecialSkillCost();
                            if ($char->getMana() >= $custoMana) {
                                $skillLog = $activePlayer->getCharacter()->specialSkill($opponent->getCharacter());
                                $logs[] = "{$activePlayer->getName()} usou habilidade! (Custo: $custoMana MP) - $skillLog";
                                $validAction = true;
                            } else {
                                $logs[] = "Mana insuficiente! Você precisa de {$custoMana} MP.";

                                renderHeader($turn, $player1, $player2, $activePlayer);
                                logBattle($logs);
                                $validAction = false;
                            }
                            break;
                    }
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
    return [
        'winner' => ($player1->getCharacter()->getHp() > 0) ? $player1 : $player2,
        'loser'  => ($player1->getCharacter()->getHp() > 0) ? $player2 : $player1,
        'turns'  => $turn - 1
    ];
}
