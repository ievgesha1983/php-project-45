<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\launchGame;

const GAME_OPTIONS = [
    "question" => 'Answer "yes" if the number is even, otherwise answer "no".',
    "roundsNumber" => 3,
    "questionSettings" => [
        "num" => ["min" => 1, "max" => 100]
    ]
];

function run(): void
{
    define('SETTINGS', GAME_OPTIONS["questionSettings"]);
    $getDataForQuestion = function (): array {
        $min = SETTINGS["num"]["min"];
        $max = SETTINGS["num"]["max"];
        $randomNumber = random_int($min, $max);
        $correctAnswer = isEval($randomNumber) ? 'yes' : 'no';
        $randomNumber = (string) $randomNumber;
        return [$randomNumber, $correctAnswer];
    };
    launchGame(GAME_OPTIONS["question"], GAME_OPTIONS["roundsNumber"], $getDataForQuestion);
}

function isEval(int $number): bool
{
    return $number % 2 === 0;
}
