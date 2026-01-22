<?php

namespace BrainGames\Games;

use function cli\line;
use function BrainGames\getName;
use function BrainGames\getCorrectAnswer;

function isEval(int $number): bool
{
    return $number % 2 === 0;
}
function launchGameEven(): void
{
    $name = getName();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        $randomNumber = rand(1, 100);
        $correctAnswer = isEval($randomNumber) ? 'yes' : 'no';

        if (!getCorrectAnswer($randomNumber, $correctAnswer)) {
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
