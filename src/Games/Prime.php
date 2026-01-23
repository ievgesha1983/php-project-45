<?php

namespace BrainGames\Games;

use function cli\line;
use function BrainGames\getName;
use function BrainGames\getCorrectAnswer;
use function BrainGames\getRandomNumbers;

use const BrainGames\ROUND_NUMBER;

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

function launchGamePrime(): void
{
    $roundNumbers = ROUND_NUMBER;
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
