<?php
use MezencevEQschool\Level3\Task3\ArrayReader;
use MezencevEQschool\Level3\Task3\Convert;
use MezencevEQschool\Level3\Task3\ArrayWriter;

require(__DIR__ . "/vendor/autoload.php");

use MezencevEQschool\Level3\Task3\Import;

$import = new Import();
$import->from(new ArrayReader())
->to(new ArrayWriter())
->with(new Convert())
->execute();