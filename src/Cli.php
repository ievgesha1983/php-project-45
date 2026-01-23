<?php

namespace BrainGames;

use function cli\line;
use function cli\prompt;

function launchWelcomeForm(): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
