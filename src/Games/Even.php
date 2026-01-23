<?php

namespace BrainGames\Games;

use function cli\line;
use function BrainGames\getName;
use function BrainGames\getCorrectAnswer;

use const BrainGames\ROUND_NUMBER;

function isEval(int $number): bool
{
    return $number % 2 === 0;
}
function launchGameEven(): void
{
    $roundNumbers = ROUND_NUMBER;
    $namePlayer = getName();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < $roundNumbers; $i++) {
        $randomNumber = random_int(1, 100);
        $correctAnswer = isEval($randomNumber) ? 'yes' : 'no';

        if (!getCorrectAnswer($randomNumber, $correctAnswer)) {
            line("Let's try again, {$namePlayer}!");
            return;
        }
    }
    line("Congratulations, {$namePlayer}!");
}
