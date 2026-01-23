<?php

namespace BrainGames\Games\Even;

function isEval(int $number): bool
{
    return $number % 2 === 0;
}
function getDataForQuestion(array $questionSettings): array
{
    $min = $questionSettings["num"]["min"];
    $max = $questionSettings["num"]["max"];
    $randomNumber = (string) random_int($min, $max);
    $correctAnswer = isEval($randomNumber) ? 'yes' : 'no';
    return [$randomNumber, $correctAnswer];
}
