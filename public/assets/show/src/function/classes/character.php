<?php
abstract class character
{
    protected string $class;
    protected string $description;
    protected string $skill;
    protected int $hp;
    protected int $hpMax;
    protected int $attack;
    protected int $defense;
    protected int $mana;
    protected int $manaMax;
    protected int $buffer;
    protected int $nerf;

    public function __construct(
        string $class,
        string $description,
        string $skill,
        int $hp,
        int $attack,
        int $defense,
        int $mana
    ) {
        $this->class = $class;
        $this->description = $description;
        $this->skill = $skill;
        $this->hp = $hp;
        $this->hpMax = $hp;
        $this->attack = $attack;
        $this->defense = $defense;
        $this->mana = $mana;
        $this->manaMax = $mana;
        $this->buffer = 0;
        $this->nerf = 0;
    }
 
public function attackTarget(Character $opponent): int
    {
        $defenseTotal = $opponent->getDefense() + $opponent->getBuffer();
        $damage = $this->attack - $defenseTotal;

        if ($damage < 0) {
            $damage = 0;
        }

        $opponent->receiveDamage($damage);
        return $damage;
    }

    public function defend(): void
    {
        $this->buffer = 5;
    }

    public function receiveDamage(int $damage): void
    {
        $this->hp -= $damage;
        if ($this->hp < 0) {
            $this->hp = 0;
        }
    }

    public function resetBuffer(): void
    {
        // Limpa o bônus de defesa no começo/fim do turno do personagem
        $this->buffer = 0;
    }

    abstract public function specialSkill(Character $opponent);
    public function getClass(): string { return $this->class; }
    public function getDescription(): string { return $this->description; }
    public function getSkill(): string { return $this->skill; }
    public function getHp(): int { return $this->hp; }
    public function getHpMax(): int { return $this->hpMax; }
    public function getAttack(): int { return $this->attack; }
    public function getDefense(): int { return $this->defense; }
    public function getMana(): int { return $this->mana; }
    public function getManaMax(): int { return $this->manaMax; }
    public function getBuffer(): int { return $this->buffer; }
    public function getNerf(): int { return $this->nerf; }

    public function setMana(int $mana): void { $this->mana = max(0, $mana); }
    public function setNerf(int $nerf): void { $this->nerf = $nerf; }
}