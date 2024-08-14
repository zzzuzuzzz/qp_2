<?php 

namespace MezencevEQschool\Level3\Task2\Objects;

use MezencevEQschool\Level3\Task2\Objects\SecretObject;

class Area51 extends SecretObject
{
    public function __construct(
        private string $info = 'Инопланетян нет',
    ) {
    }

    protected function agentLevelHasAccess(int $agentAccessLevel): bool
    {
        return $agentAccessLevel == 6 ?? true;
    }

    protected function getSecretInformation(): string
    {
        return $this->info;
    } 
}