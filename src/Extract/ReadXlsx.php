<?php

namespace App\Extract;

use Generator;

class ReadXlsx {
    public function readFile(string $path): Generator
    {
        $handle = \PhpOffice\PhpSpreadsheet\IOFactory::identify($path);
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($handle);
        $spreadsheet = $reader->load($path);
        $schdeules = $spreadsheet->getActiveSheet()->toArray();
        unset($schdeules[0]);
        foreach($schdeules as $value) {
            yield $value;
        }
    }
}