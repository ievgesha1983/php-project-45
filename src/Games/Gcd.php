<?php

namespace BrainGames\Games\Gcd;

function getDataForQuestion(array $questionSettings): array
{
        $num1 = random_int($questionSettings['nums']['min'], $questionSettings['nums']['max']);
        $num2 = random_int($questionSettings['nums']['min'], $questionSettings['nums']['max']);
        $gcd = (string) getGcd($num1, $num2);
        return ["{$num1} {$num2}", $gcd];
}

function getGcd(int $num1, int $num2): int
{
    while ($num2 !== 0) {
        $remainder = $num1 % $num2;
        $num1 = $num2;
        $num2 = $remainder;
    }

    return $num1;
}
