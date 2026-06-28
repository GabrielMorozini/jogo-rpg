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
    protected bool $isStunned = false;

    public function setStunned(bool $status): void
    {
        $this->isStunned = $status;
    }
    public function isStunned(): bool
    {
        return $this->isStunned;
    }

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
    }

    public function tryAction(int $difficultyClass): bool
    {
        return Dice::roll(20) >= $difficultyClass;
    }

    public function attackTarget(Character $opponent): array
    {
        $roll = Dice::roll(20);

        if ($roll === 20) {
            $baseDamage = ($this->attack + 20) * 2;
        } elseif ($roll === 1) {
            $baseDamage = (int)($this->attack / 2);
        } else {
            $baseDamage = $this->attack + $roll;
        }

        $opponent->receiveDamage($baseDamage);
        return [
            'damage' => $baseDamage,
            'roll' => $roll
        ];
    }

    public function calculateAttackPower(): int
    {
        return $this->attack + (int)(Dice::roll(20) / 2);
    }

    public function defend(): int
    {
        $roll = Dice::roll(20);

        $this->buffer = (int)($roll / 2);

        return $roll;
    }

    public function receiveDamage(int $damage): void
    {
        $totalDefense = $this->defense + $this->buffer;
        $mitigation = (int)($totalDefense * 1.5);
        $finalDamage = $damage - $mitigation;
        if ($finalDamage < 0) {
            $finalDamage = 0;
        }
        $this->hp -= $finalDamage;
        if ($this->hp < 0) {
            $this->hp = 0;
        }
    }

    public function resetBuffer(): void
    {
        $this->buffer = 0;
    }

    abstract public function specialSkill(Character $opponent);
    public function getClass(): string
    {
        return $this->class;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getSkill(): string
    {
        return $this->skill;
    }
    abstract public function getSpecialSkillCost(): int;
    public function getHp(): int
    {
        return $this->hp;
    }
    public function getHpMax(): int
    {
        return $this->hpMax;
    }
    public function getAttack(): int
    {
        return $this->attack;
    }
    public function getDefense(): int
    {
        return $this->defense;
    }
    public function getMana(): int
    {
        return $this->mana;
    }
    public function getManaMax(): int
    {
        return $this->manaMax;
    }

    public function setMana(int $mana): void
    {
        $this->mana = max(0, $mana);
    }

    public function getBuffer(): int
    {
        return $this->buffer;
    }

    public function show(): void
    {
        echo "\n--- Ficha de Personagem: {$this->getClass()} ---\n";
        echo "Descrição: {$this->getDescription()}\n";
        echo "Habilidade Especial: {$this->getSkill()}\n";
        echo "-------------------------------------------\n";
        echo "Vida: {$this->getHp()}/{$this->getHpMax()} | Mana: {$this->getMana()}/{$this->getManaMax()}\n";
        echo "Ataque: {$this->getAttack()} | Defesa: {$this->getDefense()}\n";
        echo "-------------------------------------------\n";
    }
}
