<?php
require_once __DIR__ . '/character.php';
class Wizard extends Character {
    public function __construct() {
        parent:: __construct(
            "Wizard", //classe
            "Um mago poderoso que domina as artes arcanas, capaz de conjurar feitiços 
            devastadores e manipular os elementos a seu favor", //descrição
            "Tempestade Arcana: Causa dano mágico massivo a um oponente, ignorando sua defesa.", //habilidade
            200, //vida
            90, //ataque
            15, //defesa
            60  //mana
        );
    }

    public function specialSkill(Character $opponent): string {
        $cost = 60;
       
        if ($this->mana < $cost) {
            throw new Exception("Mana insuficiente para usar Tempestade Arcana!");
        }
        $this->mana -= $cost;

        $damage = $this->attack * 2;

        $opponent->receiveDamage($damage);

        return "✨ {$this->class} usou a habilidade especial [{$this->skill}] em {$opponent->getClass()} e causou {$damage} de dano mágico massivo!";
    }
}
