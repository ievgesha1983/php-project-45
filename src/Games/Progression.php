<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\launchGame;

const GAME_OPTIONS = [
    "function" => "BrainGames\Games\Progression\getDataForQuestion",
    "question" => "What number is missing in the progression?",
    "roundsNumbers" => 3,
    "questionSettings" => [
        "start" => ["min" => 1, "max" => 100],
        "step" => ["min" => 1, "max" => 10],
        "length" => ["min" => 7, "max" => 13]
    ]
];

function run(): void
{
    launchGame(GAME_OPTIONS);
}

function getDataForQuestion(array $questionSettings): array
{
    $lengthProgression = random_int($questionSettings['length']['min'], $questionSettings['length']['max']);
    $stepProgression = random_int($questionSettings['step']['min'], $questionSettings['step']['max']);
    $startProgression = random_int($questionSettings['start']['min'], $questionSettings['start']['max']);
    $progression = [];
    $max = $startProgression + $lengthProgression * $stepProgression;
    for ($i = $startProgression; $i < $max; $i += $stepProgression) {
        $progression[] = $i;
    }
    $randomElement = random_int(1, $lengthProgression);
    $correctAnswer = (string) $progression[$randomElement - 1];
    $progression[$randomElement - 1] = '..';

    return [join(' ', $progression), $correctAnswer];
}
