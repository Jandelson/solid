<?php

namespace App;

use App\DTO\DataDTO;
use Generator;

class File {
    private $data = [];
    
    private function readFileCsv(string $path): Generator
    {
        $handle = fopen($path, 'r');
        
        while(!feof($handle)) {
            yield fgetcsv($handle, null, ';');
        }

        fclose($handle);
    }

    private function readFileTxt(string $path): Generator
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

    public function getData($path): array
    {
        $extension = explode('.', $path)[1];
        if ($extension === 'csv') {
            $handleFile = $this->readFileCsv($path);
        } else {
            $handleFile = $this->readFileTxt($path);
        }

        foreach ($handleFile as $line) {
            if ($line) {
                $dataDTO = DataDTO::create($line[0], $line[1], $line[2]);
                array_push($this->data, $dataDTO->getValues());
            }
        }

        return $this->data;
    }
}