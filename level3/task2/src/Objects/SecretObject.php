<?php 

namespace MezencevEQschool\Level3\Task2\Objects;
abstract class SecretObject
{
    abstract protected function agentLevelHasAccess(int $agentAccessLevel): bool; 
    abstract protected function getSecretInformation(): string; 
    public function getSecretInformationForAgent(int $agentAccessLevel): string
    {
        if ($this->agentLevelHasAccess($agentAccessLevel)) {
            return $this->getSecretInformation();
        }
        return 'Доступ запрещен';
    }
}