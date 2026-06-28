<?php

require_once __DIR__ . '/character.php';

class Archer extends Character
{
    public function __construct()
    {
        parent::__construct(
            "Archer", // classe
            "Um caçador implacável das florestas profundas. Mestre do arco e da sobrevivência, ele usa sua agilidade para encontrar pontos fracos na armadura dos inimigos antes que consigam se aproximar.", // descrição
            "Chuva de Flechas: Dispara uma rajada veloz que atinge o oponente múltiplas vezes, ignorando parcialmente sua defesa.", // habilidade
            220, // vida
            65,  // ataque
            20,  // defesa
            50   // mana
        );
    }
    public function specialSkill(Character $opponent): string
    {
     
    $cost = 25;

        if ($this->mana < $cost) {
            throw new Exception("Energia insuficiente para desferir a Chuva de Flechas!");
        }
        
        $this->mana -= $cost;

        $defenseTotal = $opponent->getDefense() + $opponent->getBuffer();
        
        $damage = ($this->attack + 50) - $defenseTotal;

        if ($damage < 0) {
            $damage = 0;
        }
        
        $opponent->receiveDamage($damage);
 
        return "🏹 {$this->class} saltou para trás e disparou a habilidade especial [{$this->skill}] em {$opponent->getClass()}, cravando várias flechas e causando {$damage} de dano físico!";
    }
}