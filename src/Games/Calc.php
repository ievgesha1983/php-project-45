<?php

namespace BrainGames\Games;

use function cli\line;
use function BrainGames\getName;
use function BrainGames\getCorrectAnswer;

function getRandomExpression(): string
{
    $sings = ['+', '-', '*'];
    $arg1 = rand(1, 100);
    $arg2 = rand(1, 100);
    $sing = $sings[array_rand($sings)];
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
    }

    return "{$arg1} {$sing} {$arg2}={$answer}";
}
function launchGameCalc(): void
{
    $roundNumbers = 3;
    $namePlayer = getName();
    line('What is the result of the expression?');
    for ($i = 0; $i < $roundNumbers; $i++) {
        [$expression, $correctAnswer] = explode('=', getRandomExpression());

        if (!getCorrectAnswer($expression, $correctAnswer)) {
            line("Let's try again, {$namePlayer}!");
            return;
        }
    }
    line("Congratulations, {$namePlayer}!");
}
