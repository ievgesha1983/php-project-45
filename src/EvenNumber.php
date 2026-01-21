<?php

namespace BrainGames;

use function cli\line;
use function cli\prompt;

function isEval(int $number): bool
{
    return $number % 2 === 0;
}
function launchEvenNumberGame(): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        $randomNumber = rand(1, 100);
        $answer = prompt("Question: {$randomNumber}\nYour answer");
        $correctAnswer = isEval($randomNumber) ? 'yes' : 'no';

        if ($correctAnswer === $answer) {
            line("Correct!");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
