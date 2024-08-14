<?php

class Fork
{
    public function __construct(
        public readonly int $numberOfTeeth
    ) {
    }
}
class Cup
{
    public function __construct(
        public readonly int $volume
    ) {
    }
}
class Table
{
    public function __construct(
        public readonly string $color
    ) {
    }
}

$cup_1 = new Cup(250);
$cup_2 = new Cup(300);
$cup_3 = new Cup(500);

$table = new Table('gray');

$fork_1 = new Fork(4);
$fork_2 = new Fork(5);
