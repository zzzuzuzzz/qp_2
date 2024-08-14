<?php 

namespace MezencevEQschool\Level3\Task3;

use MezencevEQschool\Level3\Task3\Interfaces\WriteInteface;

class ArrayWriter implements WriteInteface
{
    public function write(array $data): void
    {
        foreach ($data as $item) {
           echo 'Запись: ' . $item . '<br>';
        }
    }
}