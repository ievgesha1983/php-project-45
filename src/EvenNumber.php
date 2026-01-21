<?php

namespace BrainGames;

use function cli\line;
use function cli\prompt;

function launchEvenNumberGame(): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        $randomNumber = rand(1, 100);
        $answers = ["yes", "no"];
        $isEval = $randomNumber % 2;
        $answer = prompt("Question: {$randomNumber}\nYour answer");

        if (!in_array($answer, $answers) || $answers[$isEval] !== $answer) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$answers[$isEval]}'.");
            line("Let's try again, {$name}!");
            return;
        }

        line("Correct!");
    }
    line("Congratulations, {$name}!");
}
