<?php

namespace BrainGames\Games;

use function cli\line;
use function BrainGames\getName;
use function BrainGames\getCorrectAnswer;

use const BrainGames\ROUND_NUMBER;

function getGcd(int $num1, int $num2): int
{
    while ($num2 !== 0) {
        $remainder = $num1 % $num2;
        $num1 = $num2;
        $num2 = $remainder;
    }

    return $num1;
}
function launchGameGcd(): void
{
    $roundNumbers = ROUND_NUMBER;
    $namePlayer = getName();
    line('Find the greatest common divisor of given numbers.');
    for ($i = 0; $i < $roundNumbers; $i++) {
        $num1 = random_int(1, 100);
        $num2 = random_int(1, 100);
        $gcd = getGcd($num1, $num2);

        if (!getCorrectAnswer("{$num1} {$num2}", $gcd)) {
            line("Let's try again, {$namePlayer}!");
            return;
        }
    }
    line("Congratulations, {$namePlayer}!");
}
