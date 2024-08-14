<?php

namespace MezencevEQschool\Level3\Task2\Agents;

use MezencevEQschool\Level3\Task2\Agents\Agent;

class UnluckySpy extends Agent
{
    public function getAccessLevel(): int
    {
        return rand(1, 6);
    }
}
