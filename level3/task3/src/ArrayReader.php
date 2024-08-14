<?php 

namespace MezencevEQschool\Level3\Task3;
use MezencevEQschool\Level3\Task3\Interfaces\ReaderInterface;


class ArrayReader implements ReaderInterface
{
    public function read(): array
    {
        return ['data1', 'data2', 'data3'];
    }
}