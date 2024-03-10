<?php

namespace App;

class File {
    private $data = [];
    
    private function readFileCsv(string $path)
    {
        $handle = fopen($path, 'r');
        
        while(!feof($handle)) {
            yield fgetcsv($handle, 10000, ';');
        }
    }

    public function getData($path): array
    {
        foreach ($this->readFileCsv($path) as $line) {
            array_push($this->data, $line);
        }

        return $this->data;
    }
}