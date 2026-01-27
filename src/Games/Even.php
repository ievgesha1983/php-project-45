<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\useShell;

const GAME_OPTIONS = [
    "function" => "BrainGames\Games\Even\getDataForQuestion",
    "question" => 'Answer "yes" if the number is even, otherwise answer "no".',
    "roundsNumbers" => 3,
    "questionSettings" => [
        "num" => ["min" => 1, "max" => 100]
    ]
];

function run(): void
{
    useShell(GAME_OPTIONS);
}

function getDataForQuestion(array $questionSettings): array
{
    $min = $questionSettings["num"]["min"];
    $max = $questionSettings["num"]["max"];
    $randomNumber = random_int($min, $max);
    $correctAnswer = isEval($randomNumber) ? 'yes' : 'no';
    $randomNumber = (string) $randomNumber;
    return [$randomNumber, $correctAnswer];
}

function isEval(int $number): bool
{
    return $number % 2 === 0;
}
