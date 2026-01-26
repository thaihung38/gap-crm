<?php

namespace App\Domains\Base;

use Illuminate\Database\Eloquent\ModelNotFoundException;

interface RepositoryInterface
{
    public function getById(int $id): ?Entity;

    /**
     * @param int $id
     * @return Entity
     * @throws ModelNotFoundException
     */
    public function getByIdOrFail(int $id): Entity;

    public function save(Entity $entity): Entity;

    public function delete(Entity $entity): void;
}
