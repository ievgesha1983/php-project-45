<?php

namespace BrainGames;

use function cli\line;
use function cli\prompt;

const ROUND_NUMBER = 3;

function getName(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function getCorrectAnswer(int | string $question, int | string $correctAnswer): bool
{
    $answer = prompt("Question: {$question}\nYour answer");
    if ((string) $correctAnswer === $answer) {
        line("Correct!");
        return true;
    }

    line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
    return false;
}
