<?php

require_once __DIR__ . '/character.php';

class Archer extends Character
{
    public function __construct()
    {
        parent::__construct(
            "Archer", // classe
            "Há rumores de que ele não seja um homem e que provavelmente tenha orelhas pontudas.\nPouco se sabe sobre seu passado, alguns dizem que sua antiga aldeia habitava nas florestas de Lothlórien\n e que ele ou ela foi obrigado a aprender a usar o arco para sobreviver. Agora, passa seus dias como caçador de recompensa.", // descrição
            "Chuva de Flechas: Dispara uma rajada veloz que atinge o oponente múltiplas vezes, ignorando parcialmente sua defesa.", // habilidade
            220, // vida
            65,  // ataque
            20,  // defesa
            35   // mana
        );
    }
    public function specialSkill(Character $opponent): string
    {
        $cost = 35;
        echo "\nDEBUG: Mana atual: {$this->mana} | Custo: {$cost}\n";

        if ($this->mana < $cost) {
            return "Você não consegue usar a habilidade, você precisa de {$cost} de mana!";
        }

        $this->mana -= $cost;

        $roll = Dice::roll(20);

        $defenseIgnorada = (int)(($opponent->getDefense() + $opponent->getBuffer()) / 2);

        $danoBase = ($this->attack + ($roll * 3));
        $damage = (int)($danoBase - $defenseIgnorada);

        if ($damage < 0) $damage = 0;
        $opponent->receiveDamage($damage);

        if ($roll === 20) {
            return "DISPARO PERFEITO! {$this->class} atingiu os pontos vitais e causou {$damage} de dano!";
        } elseif ($roll > 10) {
            return "Chuva de flechas precisa! {$this->class} causou {$damage} de dano.";
        } else {
            return "Flechas de raspão. {$this->class} causou {$damage} de dano.";
        }
    }
    public function getSpecialSkillCost(): int
    {
        return 25;
    }
}
