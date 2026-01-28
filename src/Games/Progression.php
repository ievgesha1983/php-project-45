<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\launchGame;

const QUESTION = 'What number is missing in the progression?';
const ROUNDS_NUMBER = 3;
const PROGRESSION_LENGTH = ['min' => 7, 'max' => 13];
const PROGRESSION_START = ['min' => 1, 'max' => 100];
const PROGRESSION_STEP = ['min' => 1, 'max' => 10];

function run(): void
{
    $getDataForQuestion = function (): array {
        $lengthProgression = random_int(PROGRESSION_LENGTH['min'], PROGRESSION_LENGTH['max']);
        $stepProgression = random_int(PROGRESSION_STEP['min'], PROGRESSION_STEP['max']);
        $startProgression = random_int(PROGRESSION_START['min'], PROGRESSION_START['max']);
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
    launchGame(QUESTION, ROUNDS_NUMBER, $getDataForQuestion);
}
