<?php

namespace BrainGames\Games;

use function cli\line;
use function BrainGames\getName;
use function BrainGames\getCorrectAnswer;

function isPrime(int $num): bool
{
    $result = true;
    if ($num < 2) {
        $result = false;
    }

    if ($num % 2 === 0) {
        $result = false;
    }

    for ($divider = 3, $max = sqrt($num); $divider <= $max; $divider += 2) {
        if ($num % $divider === 0) {
            $result = false;
        }
    }

    return $result;
}

function launchGamePrime(): void
{
    $roundNumbers = 3;
    $namePlayer = getName();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    for ($i = 0; $i < $roundNumbers; $i++) {
        $randomNumber = random_int(1, 100);
        $correctAnswer = isPrime($randomNumber) ? 'yes' : 'no';

        if (!getCorrectAnswer($randomNumber, $correctAnswer)) {
            line("Let's try again, {$namePlayer}!");
            return;
        }
    }
    line("Congratulations, {$namePlayer}!");
}
