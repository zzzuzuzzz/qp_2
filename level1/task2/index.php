<?php

class PowerfulComputer
{
    public function __construct(
        private int $memory,
        private float $cpu,
        private string $favoriteProgram,
    ) {
    }

    public function executeProgram(string $program): void
    {
        $result = 'Устройство ' . $this->memory . 'Gb и ' . $this->cpu . 'GHz выполнил программу: "' . $program . '"';
        if ($program == $this->favoriteProgram) {
            $result .= ' и завис на долгое время...';
        }
        echo $result . '<br>';
    }
}

$computer_1 = new PowerfulComputer(512, 3.5, 'PhpStorm');
$computer_2 = new PowerfulComputer(1024, 4.1, 'VSCode');

$computer_1->executeProgram('Setting');
$computer_1->executeProgram('Google Chrome');
$computer_1->executeProgram('AnyDesk');
$computer_1->executeProgram('Docker Desktop');
$computer_1->executeProgram('PhpStorm');

$computer_2->executeProgram('Safari');
$computer_2->executeProgram('Telegramm');
$computer_2->executeProgram('MAMP');
$computer_2->executeProgram('Github Desktop');
$computer_2->executeProgram('VSCode');
