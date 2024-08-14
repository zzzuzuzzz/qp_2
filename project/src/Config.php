<?php

namespace ProjectApp;

use ProjectApp\Contracts\Services\ConfigContract;

class Config implements ConfigContract
{
    private array $config = [];
    private readonly string $configDir;

    public function __construct(string $configDir)
    {
        $this->configDir = $configDir;
    }

    public function load(): static
    {
        $files = scandir($this->configDir);
        foreach ($files as $file) {
            $filePath = $this->configDir . DIRECTORY_SEPARATOR . $file;
            if (!is_file($filePath)) {
                continue;
            }
            $fileInfo = pathinfo($filePath);
            if ($fileInfo['extension'] !== 'php') {
                continue;
            }
            $this->config[$fileInfo['filename']] = include($filePath);
        }
        return $this;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        $data = $this->config;
        foreach (explode('.', $key) as $keyPart) {
            if (!isset($data[$keyPart])) {
                return $default;
            }
            $data = $data[$keyPart];
        }
        return $data;
    }
}
