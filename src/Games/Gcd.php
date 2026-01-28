<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\launchGame;

const GAME_OPTIONS = [
    "question" => "Find the greatest common divisor of given numbers.",
    "roundsNumber" => 3,
    "questionSettings" => [
        "nums" => ["min" => 1, "max" => 100]
    ]
];

function run(): void
{
    define('SETTINGS', GAME_OPTIONS["questionSettings"]);
    $getDataForQuestion = function (): array {
        $num1 = random_int(SETTINGS['nums']['min'], SETTINGS['nums']['max']);
        $num2 = random_int(SETTINGS['nums']['min'], SETTINGS['nums']['max']);
        $gcd = (string) getGcd($num1, $num2);
        return ["{$num1} {$num2}", $gcd];
    };
    launchGame(GAME_OPTIONS["question"], GAME_OPTIONS["roundsNumber"], $getDataForQuestion);
}

function getGcd(int $num1, int $num2): int
{
    while ($num2 !== 0) {
        $remainder = $num1 % $num2;
        $num1 = $num2;
        $num2 = $remainder;
    }

    return $num1;
}
