<?php

namespace ProjectApp\Contracts\Services;

interface ConfigContract
{
    public function load(): static;

    public function get(string $key, mixed $default = null): mixed;
}