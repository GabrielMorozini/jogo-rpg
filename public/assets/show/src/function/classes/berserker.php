<?php
require_once __DIR__ . '/character.php';
class Berserker extends Character
{
    public function __construct()
    {
        parent::__construct(
            "Berserker", //classe
            "Um guerreiro selvagem criado nas terras gelidas da Noruega, 
            vítima de um ataque bárbaro de outra tribo. Ele busca vingança e dete-lo pode-lhe custar a vida", //descrição
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
            throw new Exception("Mana insuficiente para usar Fúria Incontrolável!");
        }
        $this->mana -= $cost;

        $defenseTotal = $opponent->getDefense() + $opponent->getBuffer();
        $damage = ($this->attack * 2) - $defenseTotal;

        if ($damage < 0) {
            $damage = 0;
        }
        $opponent->receiveDamage($damage);

        return "🔥 {$this->class} usou a habilidade especial [{$this->skill}] em {$opponent->getClass()} e causou {$damage} de dano massivo!";
    }
}
