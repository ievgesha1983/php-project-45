<?php

namespace BrainGames;

use function cli\line;
use function cli\prompt;

function getName(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function getCorrectAnswer(string $question, string $correctAnswer): bool
{
    $answer = prompt("Question: {$question}\nYour answer");
    if ($correctAnswer === $answer) {
        line("Correct!");
        return true;
    }

    line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
    return false;
}
function getRandomNumbers(int $num, int $min = 1, int $max = 100): array
{
    $result = [];
    for ($i = 0; $i < $num; $i++) {
        $result[] = random_int($min, $max);
    }
    return $result;
}
