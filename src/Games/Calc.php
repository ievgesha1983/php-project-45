<?php

namespace BrainGames\Games\Calc;

function getRandomSing(array $sings): string
{
    return $sings[array_rand($sings)];
}

function getResultOfExpression(int $arg1, int $arg2, string $sing): ?int
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
            $answer = null;
            break;
    }

    return $answer;
}
function getDataForQuestion(array $questionSettings): array
{
    $num1 = random_int($questionSettings['nums']['min'], $questionSettings['nums']['max']);
    $num2 = random_int($questionSettings['nums']['min'], $questionSettings['nums']['max']);
    $sing = getRandomSing($questionSettings['sings']);
    $expression = "{$num1} {$sing} {$num2}";
    $correctAnswer = (string) (getResultOfExpression($num1, $num2, $sing) ?? 'Errors');

    return [$expression, $correctAnswer];
}
