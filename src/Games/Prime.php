<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\launchGame;

const GAME_OPTIONS = [
    "question" => '"Answer "yes" if given number is prime. Otherwise answer "no"."',
    "roundsNumber" => 3,
    "questionSettings" => [
        "num" => ["min" => 1, "max" => 100]
    ]
];

function run(): void
{
    define('SETTINGS', GAME_OPTIONS["questionSettings"]);
    $getDataForQuestion = function (): array {
        $randomNumber = random_int(SETTINGS['num']['min'], SETTINGS['num']['max']);
        $correctAnswer = isPrime($randomNumber) ? 'yes' : 'no';
        $randomNumber = (string) $randomNumber;

        return [$randomNumber, $correctAnswer];
    };
    launchGame(GAME_OPTIONS["question"], GAME_OPTIONS["roundsNumber"], $getDataForQuestion);
}

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }

    if ($num === 2) {
        return true;
    }

    if ($num % 2 === 0) {
        return false;
    }

    for ($divider = 3, $max = sqrt($num); $divider <= $max; $divider += 2) {
        if ($num % $divider === 0) {
            return false;
        }
    }

    return true;
}
