<?php
require_once __DIR__ . '/character.php';
class Player
{
    private  $name;
    private  Character $character;

    public function __construct(string $name, Character $character)
    {
        $this->name = $name;
        $this->character = $character;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCharacter(): Character
    {
        return $this->character;
    }
}
