<?php

namespace ProjectApp;

use ProjectApp\Contracts\Services\FlashMessagesContract;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class FlashMessages implements FlashMessagesContract
{
    public function __construct(private readonly Session $session)
    {
    }

    public function success(array|string $messages): void
    {
        $this->storage()->set('success_message', $messages);
    }

    public function error(array|string $messages): void
    {
        $this->storage()->set('errors_message', $messages);
    }

    public function getErrors(): array
    {
        return $this->storage()->get('errors_message', []);
    }

    public function getSuccess(): array
    {
        return $this->storage()->get('success_message', []);
    }

    private function storage(): FlashBagInterface
    {
        return $this->session->getFlashBag();
    }
}