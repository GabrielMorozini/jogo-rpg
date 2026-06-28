<?php
require_once __DIR__ . '/character.php';
class Wizard extends Character
{
    public function __construct()
    {
        parent::__construct(
            "Wizard", //classe
            "Um velho sábio que domina as artes arcanas,\nse isolou da humanidade após uma falha catastrófica interdimensional provocando a atenção do cuthulhu.\nAgora ele busca mais conhecimento e não se importa com os seus métodos", //descrição
            "Tempestade Arcana: Causa dano mágico massivo a um oponente, ignorando sua defesa.", //habilidade
            300, //vida
            40, //ataque
            15, //defesa
            15  //mana
        );
    }

    public function specialSkill(Character $opponent): string
    {
        $cost = 15;
        if ($this->mana < $cost) {
            return "Mana insuficiente! Você precisa de {$cost} MP.";
        }

        $this->mana -= $cost;
        $roll = Dice::roll(20);

        $cure = $roll * 2;
        $this->hp = min($this->hp + $cure, $this->hpMax);

        if ($roll === 20) {
            return "CURA ARCANA CRÍTICA! Você rolou 20 e recuperou {$cure} de HP!";
        } elseif ($roll > 10) {
            return "Cura Arcana estável! Você recuperou {$cure} de HP.";
        } else {
            return "O feitiço foi instável, mas você recuperou {$cure} de HP.";
        }
    }
    public function getSpecialSkillCost(): int
    {
        return 100;
    }
}
