<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\launchGame;

const GAME_OPTIONS = [
    "question" => "What number is missing in the progression?",
    "roundsNumber" => 3,
    "questionSettings" => [
        "start" => ["min" => 1, "max" => 100],
        "step" => ["min" => 1, "max" => 10],
        "length" => ["min" => 7, "max" => 13]
    ]
];

function run(): void
{
    define('SETTINGS', GAME_OPTIONS["questionSettings"]);
    $getDataForQuestion = function (): array {
        $lengthProgression = random_int(SETTINGS['length']['min'], SETTINGS['length']['max']);
        $stepProgression = random_int(SETTINGS['step']['min'], SETTINGS['step']['max']);
        $startProgression = random_int(SETTINGS['start']['min'], SETTINGS['start']['max']);
        $progression = [];
        $max = $startProgression + $lengthProgression * $stepProgression;
        for ($i = $startProgression; $i < $max; $i += $stepProgression) {
            $progression[] = $i;
        }
        $randomElement = random_int(1, $lengthProgression);
        $correctAnswer = (string) $progression[$randomElement - 1];
        $progression[$randomElement - 1] = '..';

        return [join(' ', $progression), $correctAnswer];
    };
    launchGame(GAME_OPTIONS["question"], GAME_OPTIONS["roundsNumber"], $getDataForQuestion);
}
