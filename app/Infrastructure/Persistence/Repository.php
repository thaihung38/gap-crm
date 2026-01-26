<?php

namespace App\Infrastructure\Persistence;

use App\Domains\Base\Entity;
use App\Domains\Base\RepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class Repository implements RepositoryInterface
{
    abstract protected function getModel(): Model|Builder;

    public function getById(int $id): ?Entity
    {
        return $this->getModel()->find($id);
    }

    public function getByIdOrFail(int $id): Entity
    {
        return $this->getModel()->findOrFail($id);
    }

    public function save(Entity $entity): Entity
    {
        $entity->validate();

        $entity->save();

        foreach ($entity->savingEntities as $subEntity) {
            $subEntity->save();
            $subEntity->refresh();
        }

        foreach ($entity->deletingEntities as $subEntity) {
            $subEntity->delete();
        }

        return $entity;
    }

    public function delete(Entity $entity): void
    {
        $entity->delete();
    }
}
