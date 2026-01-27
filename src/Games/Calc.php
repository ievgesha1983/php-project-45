<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\launchGame;

const GAME_OPTIONS = [
    "function" => "BrainGames\Games\Calc\getDataForQuestion",
    "question" => "What is the result of the expression?",
    "roundsNumbers" => 3,
    "questionSettings" => [
        "nums" => ["min" => 1, "max" => 100],
        "sings" => ["+", "-", "*"]
    ]
];

function run(): void
{
    launchGame(GAME_OPTIONS);
}

function getDataForQuestion(array $questionSettings): array
{
    $num1 = random_int($questionSettings['nums']['min'], $questionSettings['nums']['max']);
    $num2 = random_int($questionSettings['nums']['min'], $questionSettings['nums']['max']);
    $sing = getRandomSing($questionSettings['sings']);
    $expression = "{$num1} {$sing} {$num2}";
    $correctAnswer = (string) (calculate($num1, $num2, $sing));

    return [$expression, $correctAnswer];
}

function getRandomSing(array $sings): string
{
    return $sings[array_rand($sings)];
}

function calculate(int $arg1, int $arg2, string $sing): int
{
    switch ($sing) {
        case '+':
            $answer = $arg1 + $arg2;
            break;
        case '-':
            $answer = $arg1 - $arg2;
            break;
        case '*':
            $answer = $arg1 * $arg2;
            break;
        default:
            throw new \InvalidArgumentException('Invalid sing: ' . $sing);
    }

    return $answer;
}
