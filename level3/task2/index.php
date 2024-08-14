<?php

require(__DIR__ . "/vendor/autoload.php");

use MezencevEQschool\Level3\Task2\Objects\Area51;
use MezencevEQschool\Level3\Task2\Objects\Library;
use MezencevEQschool\Level3\Task2\Agents\Student;
use MezencevEQschool\Level3\Task2\Agents\SecretAgent;
use MezencevEQschool\Level3\Task2\Agents\UnluckySpy;

$library = new Library();
$area51 = new Area51();

$student = new Student();
$secretAgent = new SecretAgent();
$unluckySpy = new UnluckySpy();

echo "При попытке получить секретную информацию из библиотеки, студент получил: " . $library->getSecretInformationForAgent($student->getAccessLevel()) . '<br>';
echo "При попытке получить секретную информацию из зоны 51, студент получил: " . $area51->getSecretInformationForAgent($student->getAccessLevel()) . '<br>';

echo "При попытке получить секретную информацию из библиотеки, секретный агент получил: " . $library->getSecretInformationForAgent($secretAgent->getAccessLevel()) . '<br>';
echo "При попытке получить секретную информацию из зоны 51, секретный агент получил: " . $area51->getSecretInformationForAgent($secretAgent->getAccessLevel()) . '<br>';

echo "При попытке получить секретную информацию из библиотеки, невезучий шпион получил: " . $library->getSecretInformationForAgent($unluckySpy->getAccessLevel()) . '<br>';
echo "При попытке получить секретную информацию из зоны 51, невезучий шпион получил: " . $area51->getSecretInformationForAgent($unluckySpy->getAccessLevel()) . '<br>';

echo 'Невезучий шпион пробует получить информацию снова <br>';
for ($i = 10; $i != 0; $i--) {
    echo "При попытке получить секретную информацию из зоны 51, невезучий шпион получил: " . $area51->getSecretInformationForAgent($unluckySpy->getAccessLevel()) . '<br>';
}
