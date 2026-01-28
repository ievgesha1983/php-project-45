<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\launchGame;

const QUESTION = 'What is the result of the expression?';
const ROUNDS_NUMBER = 3;
const RANDOM_NUMBER = ['min' => 1, 'max' => 100];
const SINGS = ['+', '-', '*'];

function run(): void
{
    $getDataForQuestion = function (): array {
        $num1 = random_int(RANDOM_NUMBER['min'], RANDOM_NUMBER['max']);
        $num2 = random_int(RANDOM_NUMBER['min'], RANDOM_NUMBER['max']);
        $sing = getRandomSing(SINGS);
        $expression = "{$num1} {$sing} {$num2}";
        $correctAnswer = (string) (calculate($num1, $num2, $sing));

        return [$expression, $correctAnswer];
    };
    launchGame(QUESTION, ROUNDS_NUMBER, $getDataForQuestion);
}

function getRandomSing(array $sings): string
{
    return $sings[array_rand($sings)];
}

function calculate(int $arg1, int $arg2, string $sing): int
{
    return match ($sing) {
        '+' => $arg1 + $arg2,
        '-' => $arg1 - $arg2,
        '*' => $arg1 * $arg2,
        default => throw new \InvalidArgumentException('Invalid sing: ' . $sing)
    };
}
