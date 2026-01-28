<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\launchGame;

const QUESTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const ROUNDS_NUMBER = 3;
const RANDOM_NUMBER = ["min" => 1, "max" => 100];

function run(): void
{
    $getDataForQuestion = function (): array {
        $randomNumber = random_int(RANDOM_NUMBER['min'], RANDOM_NUMBER['max']);
        $correctAnswer = isPrime($randomNumber) ? 'yes' : 'no';
        $randomNumber = (string) $randomNumber;

        return [$randomNumber, $correctAnswer];
    };
    launchGame(QUESTION, ROUNDS_NUMBER, $getDataForQuestion);
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
