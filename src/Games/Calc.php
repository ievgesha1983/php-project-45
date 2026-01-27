<?php

namespace BrainGames\Games\Calc;

function getDataForQuestion(array $questionSettings): array
{
    $num1 = random_int($questionSettings['nums']['min'], $questionSettings['nums']['max']);
    $num2 = random_int($questionSettings['nums']['min'], $questionSettings['nums']['max']);
    $sing = getRandomSing($questionSettings['sings']);
    $expression = "{$num1} {$sing} {$num2}";
    $correctAnswer = (string) (calculate($num1, $num2, $sing) ?? 'Errors');

    return [$expression, $correctAnswer];
}

function getRandomSing(array $sings): string
{
    return $sings[array_rand($sings)];
}

function calculate(int $arg1, int $arg2, string $sing): ?int
{
    switch ($sing) {
        case '+':
            $answer = $arg1 + $arg2;
            break;
        case '-':
            $answer = $arg1 - $arg2;
            break;
        case '*':
            $answer = $arg1 * $arg2;
            break;
        default:
            exit;
    }

    return $answer;
}
