<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function useShell(array $options): void
{
    $roundNumbers = $options["roundsNumbers"];
    line('Welcome to the Brain Games!');
    $namePlayer = prompt('May I have your name?');
    line("Hello, %s!", $namePlayer);
    line($options["question"]);

    for ($i = 0; $i < $roundNumbers; $i++) {
        [$question,  $correctAnswer] = $options["function"]($options["questionSettings"]);
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
