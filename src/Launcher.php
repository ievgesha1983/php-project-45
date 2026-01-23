<?php

namespace BrainGames\Launcher;

use function BrainGames\Engine\launchGame;

const GAMES_OPTIONS = [
    "calc" => [
        "question" => "What is the result of the expression?",
        "roundsNumbers" => 3,
        "questionSettings" => [
            "nums" => ["min" => 1, "max" => 100],
            "sings" => ["+", "-", "*"]
        ]
    ],
    "even" => [
        "question" => "Answer 'yes' if the number is even, otherwise answer 'no'.",
        "roundsNumbers" => 3,
        "questionSettings" => [
            "num" => ["min" => 1, "max" => 100]
        ]
    ],
    "gcd" => [
        "question" => "Find the greatest common divisor of given numbers.",
        "roundsNumbers" => 3,
        "questionSettings" => [
            "nums" => ["min" => 1, "max" => 100]
        ]
    ],
    "prime" => [
        "question" => "Answer 'yes' if given number is prime. Otherwise answer 'no'.",
        "roundsNumbers" => 3,
        "questionSettings" => [
            "num" => ["min" => 1, "max" => 100]
        ]
    ],
    "progression" => [
        "question" => "Find the greatest common divisor of given numbers.",
        "roundsNumbers" => 3,
        "questionSettings" => [
            "start" => ["min" => 1, "max" => 100],
            "step" => ["min" => 1, "max" => 10],
            "length" => ["min" => 7, "max" => 13]
        ]
    ]
];

function play(string $game): void
{
    $gameOptions = GAMES_OPTIONS[$game];
    $game = ucfirst($game);
    $gameOptions["function"] = "BrainGames\\Games\\{$game}\\getDataForQuestion";
    launchGame($gameOptions);
}
