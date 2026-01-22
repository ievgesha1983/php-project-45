<?php

namespace BrainGames\Games;

use function cli\line;
use function BrainGames\getName;
use function BrainGames\getCorrectAnswer;
use function BrainGames\getRandomNumbers;

function getGcd(array $numbers): int
{
    $num1 = $numbers[0];
    $num2 = $numbers[1];
    while ($num2 !== 0) {
        $remainder = $num1 % $num2;
        $num1 = $num2;
        $num2 = $remainder;
    }

    return abs($num1);
}
function launchGameGcd(): void
{
    $roundNumbers = 3;
    $namePlayer = getName();
    line('Find the greatest common divisor of given numbers.');
    for ($i = 0; $i < $roundNumbers; $i++) {
        $numbers = getRandomNumbers(2);
        $gcd = getGcd($numbers);

        if (!getCorrectAnswer(join(', ', $numbers), $gcd)) {
            line("Let's try again, {$namePlayer}!");
            return;
        }
    }
    line("Congratulations, {$namePlayer}!");
}
