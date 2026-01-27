<?php

namespace BrainGames\Games\Prime;

const GAME_OPTIONS = [
    "function" => "BrainGames\Games\Prime\getDataForQuestion",
    "question" => '"Answer "yes" if given number is prime. Otherwise answer "no"."',
    "roundsNumbers" => 3,
    "questionSettings" => [
        "num" => ["min" => 1, "max" => 100]
    ]
];

function getDataForQuestion(array $questionSettings): array
{
    $randomNumber = random_int($questionSettings['num']['min'], $questionSettings['num']['max']);
    $correctAnswer = isPrime($randomNumber) ? 'yes' : 'no';
    $randomNumber = (string) $randomNumber;

    return [$randomNumber, $correctAnswer];
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
