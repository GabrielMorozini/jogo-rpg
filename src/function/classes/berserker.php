<?php
require_once __DIR__ . '/character.php';
class Berserker extends Character
{
    public function __construct()
    {
        parent::__construct(
            "Berserker", //classe
            "Um guerreiro selvagem criado nas terras gelidas da Noruega,\nvítima de um ataque bárbaro de outra tribo.\nEle busca vingança e dete-lo pode-lhe custar a vida", //descrição
            "Fúria Berserker: Aumenta o ataque em 50%, mas reduz a defesa em 25% durante 3 turnos.", //habilidade
            270, //vida
            75, //ataque
            25, //defesa
            40  //mana
        );
    }

    public function specialSkill(Character $opponent): string
    {
        $cost = 40;
        if ($this->mana < $cost) {
            return "Você não consegue usar a habilidade, você precisa de {$cost} de mana!";
        }
        $this->mana -= $cost;
        $roll = Dice::roll(20);
        $danoBase = ($this->attack * 1.5) + ($roll * 5);

        $defenseTotal = $opponent->getDefense() + $opponent->getBuffer();
        $damage = (int)($danoBase - $defenseTotal);

        if ($damage < 0) $damage = 0;
        $opponent->receiveDamage($damage);

        if ($roll === 20) {
            return "CRÍTICO MASSIVO! {$this->class} atingiu {$opponent->getClass()} e causou {$damage} de dano!";
        } elseif ($roll > 10) {
            return "Golpe potente! {$this->class} causou {$damage} de dano.";
        } else {
            return "Golpe de raspão. {$this->class} causou apenas {$damage} de dano.";
        }
    }

    public function getSpecialSkillCost(): int
    {
        return 40;
    }
}
