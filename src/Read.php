<?php

namespace App;

use App\File;

class Read {
    private $directory;
    private $file;
    private $path;

    public function getDirectory(): string
    {
        return $this->directory;
    }

    public function getFile(): string
    {
        return $this->file;
    }

    public function setDirectory(string $directory)
    {
        $this->directory = $directory;
    }

    public function setFile(string $file)
    {
        $this->file = $file;
    }

    public function readFile(): array
    {
        $this->path = $this->getDirectory() . '/' . $this->getFile();
        $file = new File();
        return $file->getData($this->path);
    }
}