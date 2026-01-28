<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\launchGame;

const QUESTION = 'Find the greatest common divisor of given numbers.';
const ROUNDS_NUMBER = 3;
const RANDOM_NUMBER = ['min' => 1, 'max' => 100];

function run(): void
{
    $getDataForQuestion = function (): array {
        $num1 = random_int(RANDOM_NUMBER['min'], RANDOM_NUMBER['max']);
        $num2 = random_int(RANDOM_NUMBER['min'], RANDOM_NUMBER['max']);
        $gcd = (string) getGcd($num1, $num2);
        return ["{$num1} {$num2}", $gcd];
    };
    launchGame(QUESTION, ROUNDS_NUMBER, $getDataForQuestion);
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
