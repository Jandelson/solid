<?php

namespace App\Extract;

use Generator;

class ReadTxt {
    public function readFile(string $path): Generator
    {
        $handle = fopen($path, 'r');
        
        while(!feof($handle)) {
            $line = fgets($handle);
            yield [
                substr($line, 11, 25),
                substr($line, 0, 11),
                trim(substr($line, 26)),
            ];
        }

        fclose($handle);
    }
}