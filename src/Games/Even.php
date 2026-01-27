<?php

namespace BrainGames\Games\Even;

function getDataForQuestion(array $questionSettings): array
{
    $min = $questionSettings["num"]["min"];
    $max = $questionSettings["num"]["max"];
    $randomNumber = random_int($min, $max);
    $correctAnswer = isEval($randomNumber) ? 'yes' : 'no';
    $randomNumber = (string) $randomNumber;
    return [$randomNumber, $correctAnswer];
}

function isEval(int $number): bool
{
    return $number % 2 === 0;
}
