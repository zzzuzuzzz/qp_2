<?php

namespace ProjectApp;

use ProjectApp\Exceptions\AuthException;
use ProjectApp\Models\User;
use Symfony\Component\HttpFoundation\Session\Session;

class Auth
{
    public function __construct(private readonly Session $storage)
    {
    }

    /**
     * @throws AuthException
     */
    public function attempt(string $email, string $password): User
    {
        if ($email === 'admin@example.com' && $password === '123456') {
            return new User(['name' => 'Администратор', 'email' => 'admin@example.com', 'role' => 'admin']);
        }
        if ($email === '123@mail.ru' && $password === '123123') {
            return new User(['name' => 'Пользователь', 'email' => '123@mail.ru', 'role' => 'user']);
        }
        throw new AuthException();
    }

    public function login(User $user): void
    {
        $this->storage->set('user', $user);

    }

    public function logout(): void
    {
        $this->storage->remove('user');
    }

    public function isAuthorized(): bool
    {
        return $this->storage->has('user');
    }

    public function isNotAdmin(): bool
    {
        $user = $this->storage->get('user');
        if (isset($user) && $user->role !== 'admin') {
            return true;
        }
        return false;
    }

    public function user(): ?User
    {
        return $this->storage->get('user');
    }
}