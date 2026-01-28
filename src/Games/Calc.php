<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\launchGame;

const GAME_OPTIONS = [
    "question" => "What is the result of the expression?",
    "roundsNumber" => 3,
    "questionSettings" => [
        "nums" => ["min" => 1, "max" => 100],
        "sings" => ["+", "-", "*"]
    ]
];

function run(): void
{
    define('SETTINGS', GAME_OPTIONS["questionSettings"]);
    $getDataForQuestion = function (): array {
        $num1 = random_int(SETTINGS['nums']['min'], SETTINGS['nums']['max']);
        $num2 = random_int(SETTINGS['nums']['min'], SETTINGS['nums']['max']);
        $sing = getRandomSing(SETTINGS['sings']);
        $expression = "{$num1} {$sing} {$num2}";
        $correctAnswer = (string) (calculate($num1, $num2, $sing));

        return [$expression, $correctAnswer];
    };
    launchGame(GAME_OPTIONS["question"], GAME_OPTIONS["roundsNumber"], $getDataForQuestion);
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
