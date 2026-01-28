<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function launchGame(string $questionForGame, int $roundsNumber, callable $getDataForQuestion): void
{
    line('Welcome to the Brain Games!');
    $namePlayer = prompt('May I have your name?');
    line("Hello, %s!", $namePlayer);
    line($questionForGame);

    for ($i = 0; $i < $roundsNumber; $i++) {
        [$question,  $correctAnswer] = $getDataForQuestion();
        $answer = prompt("Question: {$question}\nYour answer");

        if ($correctAnswer !== $answer) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$namePlayer}!");
            return;
        }

        line("Correct!");
    }
    line("Congratulations, {$namePlayer}!");
}
