<?php

namespace BrainGames;

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
    $name = getName();
    line('What is the result of the expression?');
    for ($i = 0; $i < 3; $i++) {
        [$expression, $correctAnswer] = explode('=', getRandomExpression());

        if (!getCorrectAnswer($expression, $correctAnswer)) {
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
