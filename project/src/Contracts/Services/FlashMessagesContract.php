<?php

namespace ProjectApp\Contracts\Services;

interface FlashMessagesContract
{
    public function error(array|string $messages): void;

    public function success(array|string $messages): void;

    public function getErrors(): array;

    public function getSuccess(): array;
}