<?php

namespace BrainGames\Games\Progression;

function getProgression(int $step, int $length = 10, int $start = 1): array
{
    $progression = [];
    for ($i = $start, $max = $start + $length * $step; $i < $max; $i += $step) {
        $progression[] = $i;
    }
    return $progression;
}
function getDataForQuestion(array $questionSettings): array
{
        $lengthProgression = random_int($questionSettings['length']['min'], $questionSettings['length']['max']);
        $stepProgression = random_int($questionSettings['step']['min'], $questionSettings['step']['max']);
        $startProgression = random_int($questionSettings['start']['min'], $questionSettings['start']['max']);
        $progression = getProgression($stepProgression, $lengthProgression, $startProgression);
        $randomElement = random_int(1, $lengthProgression);
        $correctAnswer = (string) $progression[$randomElement - 1];
        $progression[$randomElement - 1] = '..';

        return [join(' ', $progression), $correctAnswer];
}
