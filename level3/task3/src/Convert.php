<?php 

namespace MezencevEQschool\Level3\Task3;

use MezencevEQschool\Level3\Task3\Interfaces\ConverterInterface;

class Convert implements ConverterInterface
{
    public function convert(string $item): string
    {
        return strtoupper($item);
    }
}