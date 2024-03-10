<?php

namespace App;

use App\DTO\DataDTO;

class File {
    private $data = [];
    
    public function getData($path): array
    {
        $extension = explode('.', $path)[1];
        $class = 'App\Extract\Read' . ucfirst($extension);
        $handleFile = (new $class())->readFile($path);
        foreach ($handleFile as $line) {
            if ($line) {
                $dataDTO = DataDTO::create($line[0], $line[1], $line[2]);
                array_push($this->data, $dataDTO->getValues());
            }
        }

        return $this->data;
    }
}