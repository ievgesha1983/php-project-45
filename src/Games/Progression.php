<?php

namespace BrainGames\Games;

use function cli\line;
use function BrainGames\getName;
use function BrainGames\getCorrectAnswer;

use const BrainGames\ROUND_NUMBER;

function getProgression(int $step, int $length = 10, int $start = 1): array
{
    $progression = [];
    for ($i = $start, $max = $start + $length * $step; $i < $max; $i += $step) {
        $progression[] = $i;
    }
    return $progression;
}
function launchGameProgression(): void
{
    $roundNumbers = ROUND_NUMBER;
    $namePlayer = getName();
    line('What number is missing in the progression?');
    for ($i = 0; $i < $roundNumbers; $i++) {
        $lengthProgression = random_int(7, 13);
        $stepProgression = random_int(1, 10);
        $startProgression = random_int(1, 100);
        $progression = getProgression($stepProgression, $lengthProgression, $startProgression);
        $randomElement = random_int(1, $lengthProgression);
        $correctAnswer = $progression[$randomElement - 1];
        $progression[$randomElement - 1] = '..';

        if (!getCorrectAnswer(join(' ', $progression), $correctAnswer)) {
            line("Let's try again, {$namePlayer}!");
            return;
        }
    }
    line("Congratulations, {$namePlayer}!");
}
