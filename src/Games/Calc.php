<?php

namespace BrainGames\Games;

use function cli\line;
use function BrainGames\getName;
use function BrainGames\getCorrectAnswer;
use function BrainGames\getRandomNumbers;

use const BrainGames\ROUND_NUMBER;

function getRandomSing(array $sings): string
{
    return $sings[array_rand($sings)];
}

function getResultOfExpression(array $numbers, string $sing): int
{
    $arg1 = $numbers[0];
    $arg2 = $numbers[1];
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
            break;
    }

    return $answer;
}
function launchGameCalc(): void
{
    $roundNumbers = ROUND_NUMBER;
    $namePlayer = getName();
    line('What is the result of the expression?');
    for ($i = 0; $i < $roundNumbers; $i++) {
        $numbers = getRandomNumbers(2);
        $sing = getRandomSing(['+', '-', '*']);
        $expression = "{$numbers[0]} {$sing} {$numbers[1]}";
        $correctAnswer = getResultOfExpression($numbers, $sing);

        if (!getCorrectAnswer($expression, $correctAnswer)) {
            line("Let's try again, {$namePlayer}!");
            return;
        }
    }
    line("Congratulations, {$namePlayer}!");
}
