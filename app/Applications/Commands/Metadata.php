<?php

namespace App\Applications\Commands;

class Metadata
{
    public function __construct(
        public ?int $id = null,
        public array $data = []
    ){}
}
