<?php

namespace MezencevEQschool\Level3\Task3;

use MezencevEQschool\Level3\Task3\ArrayReader;
use MezencevEQschool\Level3\Task3\ArrayWriter;
use MezencevEQschool\Level3\Task3\Convert;

class Import
{
    private ArrayReader $reader;
    private ArrayWriter $writer;
    private array $converters = [];


    public function from(ArrayReader $reader): Import
    {
        $this->reader = $reader;
        return $this;
    }

    public function to(ArrayWriter $writer): Import
    {
        $this->writer = $writer;
        return $this;
    }

    public function with(Convert $converter): Import
    {
        $this->converters[] = $converter;
        return $this;
    }

    public function execute(): void
    {
        $data = $this->reader->read();

        foreach ($data as $item) {
            foreach ($this->converters as $converter) {
                $item = $converter->convert($item);
            }
            $convertedData[] = $item;
        }

        $this->writer->write($convertedData);
    }
}