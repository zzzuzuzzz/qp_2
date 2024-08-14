<?php

namespace MezencevEQschool\Task2;

use Exception;

class UserFormValidator
{
    /**
     * Summary of validate
     * @param array $data
     * @throws \Exception
     * @return bool
     */
    public function validate(array $data): bool
    {
        if (empty($data['name'])) {
            throw new Exception('Имя не должно быть пустым.');
        }

        if (empty($data['age']) || (int)$data['age'] < 18) {
            throw new Exception('Возраст должен быть не менее 18 лет.');
        }

        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Email должен быть заполнен и соответствовать формату email.');
        }

        return true;
    }
}
