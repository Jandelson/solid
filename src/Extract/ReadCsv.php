<?php

namespace App\Extract;

use Generator;

class ReadCsv {
    public function readFile(string $path): Generator
    {
        $handle = fopen($path, 'r');
        
        while(!feof($handle)) {
            yield fgetcsv($handle, null, ';');
        }

        fclose($handle);
    }
}