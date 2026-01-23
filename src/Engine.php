<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function launchGame(array $options): void
{
    $roundNumbers = $options["roundsNumbers"];
    line('Welcome to the Brain Games!');
    $namePlayer = prompt('May I have your name?');
    line("Hello, %s!", $namePlayer);
    line($options["question"]);

    for ($i = 0; $i < $roundNumbers; $i++) {
        [$expression,  $correctAnswer] = $options["function"]($options["questionSettings"]);

        if (!getCorrectAnswer($expression, $correctAnswer)) {
            line("Let's try again, {$namePlayer}!");
            return;
        }
    }
    line("Congratulations, {$namePlayer}!");
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
