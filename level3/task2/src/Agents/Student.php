<?php 

namespace MezencevEQschool\Level3\Task2\Agents;

use MezencevEQschool\Level3\Task2\Agents\Agent;

class Student extends Agent
{
    public function getAccessLevel(): int
    {
        return 1;
    } 
}