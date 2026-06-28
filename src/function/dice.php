<?php

class Dice
{
    public static function roll(int $sides = 20): int
    {
        return rand(1, $sides);
    }
}
