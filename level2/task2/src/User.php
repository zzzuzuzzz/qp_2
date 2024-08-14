<?php

namespace MezencevEQschool\Task2;

use Exception;

class User
{
    private $database = [
        1 => ['name' => '123', 'age' => 20, 'email' => '123@mail.ru'],
        2 => ['name' => '123123', 'age' => 30, 'email' => '123123@mail.ru']
    ];

    public function load(int $id): void
    {
        if (!array_key_exists($id, $this->database)) {
            throw new Exception('Пользователь с таким ID не найден.');
        }
    }

    public function save(array $data): bool
    {
        return (bool) rand(0, 1);
    }
}
