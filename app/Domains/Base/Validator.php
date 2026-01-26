<?php

namespace App\Domains\Base;

abstract class Validator
{
    protected Entity $entity;

    /**
     * @return void
     * @throws \Exception
     */
    abstract public function validate(): void;
}
