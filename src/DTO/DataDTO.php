<?php

namespace App\DTO;

class DataDTO {
    private function __construct(
        private readonly string $nome,
        private readonly string $cfp,
        private readonly string $email,
    )
    {}

    public static function create(
        string $nome,
        string $cpf,
        string $email
    ): DataDTO
    {
        return new self($nome, $cpf, $email);
    }

    public function getValues(): array
    {
        return get_object_vars($this);
    }

}