<?php 

namespace MezencevEQschool\Level3\Task2\Objects;

use MezencevEQschool\Level3\Task2\Objects\SecretObject;

class Library extends SecretObject
{
    public function __construct(
        private string $info = 'Инопланетяне есть',
    ) {
    }

    protected function agentLevelHasAccess(int $agentAccessLevel): bool
    {
        return true;
    }

    protected function getSecretInformation(): string
    {
        return $this->info;
    } 
}