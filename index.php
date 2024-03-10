<?php

require __DIR__ . "/vendor/autoload.php";

use App\Read;

$read = new Read;

$read->setDirectory(__DIR__ . '/arquivos');

$data = [];

foreach (['txt', 'csv', 'xlsx'] as $extension) {
    echo 'read: ' . $extension . '...' . PHP_EOL;
    $read->setFile('dados.' . $extension);
    foreach($read->readFile() as $value) {
        array_push($data,$value);
    }
}

print "<pre>";
print_r($data);