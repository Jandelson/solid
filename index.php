<?php

require __DIR__ . "/vendor/autoload.php";

use App\Read;

$read = new Read;

$read->setDirectory(__DIR__ . '/arquivos');
$read->setFile('dados.csv');

print "<pre>";
print_r($read->readFile());