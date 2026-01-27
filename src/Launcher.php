<?php

namespace BrainGames\Launcher;

use function BrainGames\Engine\launchGame;

const GAMES_OPTIONS = [
    "calc" => [
        "function" => "BrainGames\Games\Calc\getDataForQuestion",
        "question" => "What is the result of the expression?",
        "roundsNumbers" => 3,
        "questionSettings" => [
            "nums" => ["min" => 1, "max" => 100],
            "sings" => ["+", "-", "*"]
        ]
    ],
    "even" => [
        "function" => "BrainGames\Games\Even\getDataForQuestion",
        "question" => 'Answer "yes" if the number is even, otherwise answer "no".',
        "roundsNumbers" => 3,
        "questionSettings" => [
            "num" => ["min" => 1, "max" => 100]
        ]
    ],
    "gcd" => [
        "function" => "BrainGames\Games\Gcd\getDataForQuestion",
        "question" => "Find the greatest common divisor of given numbers.",
        "roundsNumbers" => 3,
        "questionSettings" => [
            "nums" => ["min" => 1, "max" => 100]
        ]
    ],
    "prime" => [
        "function" => "BrainGames\Games\Prime\getDataForQuestion",
        "question" => '"Answer "yes" if given number is prime. Otherwise answer "no"."',
        "roundsNumbers" => 3,
        "questionSettings" => [
            "num" => ["min" => 1, "max" => 100]
        ]
    ],
    "progression" => [
        "function" => "BrainGames\Games\Progression\getDataForQuestion",
        "question" => "What number is missing in the progression?",
        "roundsNumbers" => 3,
        "questionSettings" => [
            "start" => ["min" => 1, "max" => 100],
            "step" => ["min" => 1, "max" => 10],
            "length" => ["min" => 7, "max" => 13]
        ]
    ]
];

function play(string $gameName): void
{
    try {
        launchGame(GAMES_OPTIONS[$gameName]);
    } catch (\InvalidArgumentException $e) {
        echo "Sorry! We have error: '{$e->getMessage()}'" . PHP_EOL;
    }
}
