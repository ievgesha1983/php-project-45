<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\launchGame;

const QUESTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const ROUNDS_NUMBER = 3;
const RANDOM_NUMBER = ['min' => 1, 'max' => 100];

function run(): void
{
    $getDataForQuestion = function (): array {
        $min = RANDOM_NUMBER['min'];
        $max = RANDOM_NUMBER['max'];
        $randomNumber = random_int($min, $max);
        $correctAnswer = isEval($randomNumber) ? 'yes' : 'no';
        $randomNumber = (string) $randomNumber;
        return [$randomNumber, $correctAnswer];
    };
    launchGame(QUESTION, ROUNDS_NUMBER, $getDataForQuestion);
}

function isEval(int $number): bool
{
    return $number % 2 === 0;
}
