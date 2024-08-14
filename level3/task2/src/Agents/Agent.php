<?php

namespace MezencevEQschool\Level3\Task2\Agents;

use MezencevEQschool\Level3\Task2\Objects\SecretObject;

abstract class Agent
{
    abstract public function getAccessLevel(): int;

    public function getSecretInformation(SecretObject $secretObject): string
    {
        return $secretObject->getSecretInformationForAgent($this->getAccessLevel());
    }
}
