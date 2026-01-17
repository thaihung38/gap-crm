<?php

namespace App\Domains\Base;

use App\SharedKernels\Exceptions\Exception;

interface RepositoryInterface
{
    public function getById(int $id): ?Entity;

    /**
     * @param int $id
     * @return Entity
     * @throws Exception
     */
    public function getByIdOrFail(int $id): Entity;

    public function save(Entity $entity): Entity;

    public function delete(Entity $entity): void;
}
