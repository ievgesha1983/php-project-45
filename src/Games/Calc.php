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

function getResultOfExpression(int $arg1, int $arg2, string $sing): ?int
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
            $answer = null;
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
        $num1 = random_int(1, 100);
        $num2 = random_int(1, 100);
        $sing = getRandomSing(['+', '-', '*']);
        $expression = "{$num1} {$sing} {$num2}";
        $correctAnswer = getResultOfExpression($num1, $num2, $sing) ?? 'Errors';

        if (!getCorrectAnswer($expression, $correctAnswer)) {
            line("Let's try again, {$namePlayer}!");
            return;
        }
    }
    line("Congratulations, {$namePlayer}!");
}
