<?php

namespace App\Domains\Base;

use App\SharedKernels\Exceptions\Exception;

abstract class Validator
{
    protected Entity $entity;

    /**
     * @return void
     * @throws Exception
     */
    abstract public function validate(): void;
}
